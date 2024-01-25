<?php

namespace App\Http\Controllers;

use App\Http\Requests\Creatediferential_ratesRequest;
use App\Http\Requests\Updatediferential_ratesRequest;
use App\Repositories\diferential_ratesRepository;
use App\Http\Controllers\AppBaseController;
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
        $diferentialRates = $this->diferentialRatesRepository->all();

        return view('diferential_rates.index')
            ->with('diferentialRates', $diferentialRates);
    }

    /**
     * Show the form for creating a new diferential_rates.
     *
     * @return Response
     */
    public function create()
    {
        $procedures = Procedures::orderby('description')->pluck('description', 'id');
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
        $input = $request->all();

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
            $import = new CalendarsImport(); // Reemplaza con tu clase de importación
            Excel::import($import, $file);

            // Resto de tu lógica después de la importación

            return redirect()->back()->with('success', '¡Archivo importado correctamente!');
        } catch (\Exception $e) {
            // Manejar el error
            return redirect()->back()->with('error', 'Error al importar el archivo: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Importación completada');
    }
}
