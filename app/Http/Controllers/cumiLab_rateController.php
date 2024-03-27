<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecumiLab_rateRequest;
use App\Http\Requests\UpdatecumiLab_rateRequest;
use App\Repositories\cumiLab_rateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\CumiLab_rate;
use App\Models\general_costs;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CumilabImport;

class cumiLab_rateController extends AppBaseController
{
    /** @var cumiLab_rateRepository $cumiLabRateRepository*/
    private $cumiLabRateRepository;

    public function __construct(cumiLab_rateRepository $cumiLabRateRepo)
    {
        $this->cumiLabRateRepository = $cumiLabRateRepo;
    }

    /**
     * Display a listing of the cumiLab_rate.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $cumiLabRatesQuery = CumiLab_rate::query();

        if (!empty($search)) {
            $cumiLabRatesQuery->where('cups', 'LIKE', '%' . $search . '%');
        }

        $cumiLabRates = $cumiLabRatesQuery->paginate($perPage);
        $first = CumiLab_rate::select('period')->first();
        return view('cumi_lab_rates.index', compact('cumiLabRates', 'first'));
    }

    /**
     * Show the form for creating a new cumiLab_rate.
     *
     * @return Response
     */
    public function create()
    {
        return view('cumi_lab_rates.create');
    }

    /**
     * Store a newly created cumiLab_rate in storage.
     *
     * @param CreatecumiLab_rateRequest $request
     *
     * @return Response
     */
    public function store(CreatecumiLab_rateRequest $request)
    {
        $input = $request->all();

        $cumiLabRate = $this->cumiLabRateRepository->create($input);

        Flash::success('Cumi Lab Rate saved successfully.');

        return redirect(route('cumiLabRates.index'));
    }

    /**
     * Display the specified cumiLab_rate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rate = $this->cumiLabRateRepository->find($id);

        if (empty($rate)) {
            Flash::error('Cumi Lab Rate not found');

            return redirect(route('cumiLabRates.index'));
        }

        return $rate;
    }

    /**
     * Show the form for editing the specified cumiLab_rate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cumiLabRate = $this->cumiLabRateRepository->find($id);

        if (empty($cumiLabRate)) {
            Flash::error('Cumi Lab Rate not found');

            return redirect(route('cumiLabRates.index'));
        }

        return view('cumi_lab_rates.edit')->with('cumiLabRate', $cumiLabRate);
    }

    /**
     * Update the specified cumiLab_rate in storage.
     *
     * @param int $id
     * @param UpdatecumiLab_rateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecumiLab_rateRequest $request)
    {
        $cumiLabRate = $this->cumiLabRateRepository->find($id);

        if (empty($cumiLabRate)) {
            Flash::error('Cumi Lab Rate not found');

            return redirect(route('cumiLabRates.index'));
        }

        $cumiLabRate = $this->cumiLabRateRepository->update($request->all(), $id);

        Flash::success('Cumi Lab Rate updated successfully.');

        return redirect(route('cumiLabRates.index'));
    }

    /**
     * Remove the specified cumiLab_rate from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cumiLabRate = $this->cumiLabRateRepository->find($id);

        if (empty($cumiLabRate)) {
            Flash::error('Cumi Lab Rate not found');

            return redirect(route('cumiLabRates.index'));
        }

        $this->cumiLabRateRepository->delete($id);

        Flash::success('Cumi Lab Rate deleted successfully.');

        return redirect(route('cumiLabRates.index'));
    }

    public function importlab(Request $request)
    {
        $file = $request->file('file');
        try {
            $import = new CumilabImport();
            Excel::import($import, $file);

            return redirect()->back()->with('success', '¡Archivo importado correctamente!');
        } catch (\Exception $e) {
            // Manejar el error
            return redirect()->back()->with('error', 'Error al importar el archivo: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Importación completada');
    }

    public function calculateLab()
    {
        $rates = cumiLab_rate::all();
        foreach ($rates as $rate) {
            $meses = array_filter([
                'january' => $rate->january,
                'february' => $rate->february,
                'marzo' => $rate->march,
                'abril' => $rate->april,
                'mayo' => $rate->may,
                'junio' => $rate->june,
                'julio' => $rate->july,
                'agosto' => $rate->august,
                'septiembre' => $rate->september,
                'octubre' => $rate->october,
                'noviembre' => $rate->november,
                'diciembre' => $rate->december,
            ], function ($value) {
                return !is_null($value) && $value !== '';
            }, ARRAY_FILTER_USE_BOTH);
        
            // Contar los meses no nulos
            $quanty_month = count($meses);
            $total_month = array_sum($meses);
            $average_month = $total_month/$quanty_month;
            $pq = $average_month*$rate->mutual_rate;
            $rate->update([
                'total_months' => $total_month,
                'average_months' => $average_month,
                'pxq' => $pq
            ]);        
        }
        $this->calculateLabTotal();
        return redirect()->back()->with('success', 'Importación completada');
    }

    public function calculateLabTotal(){
        $rates = CumiLab_rate::all();
        $total_sum = CumiLab_rate::sum('pxq');
        $adminLog = General_costs::where('code', 11)->first();
        $cd = General_costs::where('code', 12)->first();
        foreach ($rates as $rate) {
            $partic = $rate->pxq/$total_sum;
            $adminlog_percentage = $partic * $adminLog->value;
            $cd_percentage = $partic * $cd->value;
            $dist = ($adminlog_percentage + $cd_percentage)/$rate->average_months;
            $total = $rate->cumilab_rate + $dist;
            $rate->update([
                'part_percentage' => $partic*100,
                'adminlog_percentage' => $adminlog_percentage,
                'cd_percentage' => $cd_percentage,
                'total' => $total
            ]);
        }
    }
}
