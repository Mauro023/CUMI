<?php

namespace App\Http\Controllers;

use App\Http\Requests\Creatediferential_ratesRequest;
use App\Http\Requests\Updatediferential_ratesRequest;
use App\Repositories\diferential_ratesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Diferential_rates;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\doctors;
use App\Models\procedures;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CalendarsImport;

class diferential_ratesController extends AppBaseController
{
    /** @var diferential_ratesRepository $diferentialRatesRepository*/
    private $diferentialRatesRepository;

    public function __construct(diferential_ratesRepository $diferentialRatesRepo)
    {
        $this->diferentialRatesRepository = $diferentialRatesRepo;
    }

    /**
     * Display a listing of the diferential_rates.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_diferentialRates');
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $diferentialRatesQuery = Diferential_rates::query();

        if (!empty($search)) {
            $diferentialRatesQuery->where('value1', 'LIKE', '%' . $search . '%')
                        ->orWhere('value2', 'LIKE', '%' . $search . '%')
                        ->orWhere('id_doctor', 'LIKE', '%' . $search . '%');
        }

        $diferentialRates = $diferentialRatesQuery->paginate($perPage);

        return view('diferential_rates.index', compact('diferentialRates'));
    }

    /**
     * Show the form for creating a new diferential_rates.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_diferentialRates');
        $procedures = Procedures::orderBy('description')
        ->get()
        ->mapWithKeys(function ($proc) {
            return [$proc->id => $proc->description . ' - ' . $proc->manual_type];  
        });
        $doctors = Doctors::orderby('full_name')->pluck('full_name', 'id');
        return view('diferential_rates.create', compact('procedures', 'doctors'));
    }

    /**
     * Store a newly created diferential_rates in storage.
     *
     * @param Creatediferential_ratesRequest $request
     *
     * @return Response
     */
    public function store(Creatediferential_ratesRequest $request)
    {
        $this->authorize('create_diferentialRates');
        $input = $request->all();
        dd($input);
        $diferentialRates = $this->diferentialRatesRepository->create($input);

        Flash::success('Diferential Rates saved successfully.');

        return redirect(route('diferentialRates.index'));
    }

    /**
     * Display the specified diferential_rates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('show_diferentialRates');
        $diferentialRates = $this->diferentialRatesRepository->find($id);

        if (empty($diferentialRates)) {
            Flash::error('Diferential Rates not found');

            return redirect(route('diferentialRates.index'));
        }

        return view('diferential_rates.show')->with('diferentialRates', $diferentialRates);
    }

    /**
     * Show the form for editing the specified diferential_rates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update_diferentialRates');
        $diferentialRates = $this->diferentialRatesRepository->find($id);

        if (empty($diferentialRates)) {
            Flash::error('Diferential Rates not found');

            return redirect(route('diferentialRates.index'));
        }

        return view('diferential_rates.edit')->with('diferentialRates', $diferentialRates);
    }

    /**
     * Update the specified diferential_rates in storage.
     *
     * @param int $id
     * @param Updatediferential_ratesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatediferential_ratesRequest $request)
    {
        $this->authorize('update_diferentialRates');
        $diferentialRates = $this->diferentialRatesRepository->find($id);

        if (empty($diferentialRates)) {
            Flash::error('Diferential Rates not found');

            return redirect(route('diferentialRates.index'));
        }

        $diferentialRates = $this->diferentialRatesRepository->update($request->all(), $id);

        Flash::success('Diferential Rates updated successfully.');

        return redirect(route('diferentialRates.index'));
    }

    /**
     * Remove the specified diferential_rates from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy_diferentialRates');
        $diferentialRates = $this->diferentialRatesRepository->find($id);

        if (empty($diferentialRates)) {
            Flash::error('Diferential Rates not found');

            return redirect(route('diferentialRates.index'));
        }

        $this->diferentialRatesRepository->delete($id);

        Flash::success('Diferential Rates deleted successfully.');

        return redirect(route('diferentialRates.index'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        
        try {
            $import = new CalendarsImport();
            Excel::import($import, $file);

            return redirect()->back()->with('success', '¡Archivo importado correctamente!');
        } catch (\Exception $e) {
            // Manejar el error
            return redirect()->back()->with('error', 'Error al importar el archivo: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Importación completada');
    }
}
