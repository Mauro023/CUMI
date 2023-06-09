<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateendowmentRequest;
use App\Http\Requests\UpdateendowmentRequest;
use App\Repositories\endowmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Contracts;
use App\Models\Endowment;

class endowmentController extends AppBaseController
{
    /** @var endowmentRepository $endowmentRepository*/
    private $endowmentRepository;

    public function __construct(endowmentRepository $endowmentRepo)
    {
        $this->endowmentRepository = $endowmentRepo;
    }

    /**
     * Display a listing of the endowment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $endowments = $this->endowmentRepository->all();

        return view('endowments.index')
            ->with('endowments', $endowments);
    }

    /**
     * Show the form for creating a new endowment.
     *
     * @return Response
     */
    public function create()
    {
        $contracts = Contracts::with('employe')->get();
        
        return view('endowments.create', compact('contracts'));
    }

    /**
     * Store a newly created endowment in storage.
     *
     * @param CreateendowmentRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        if (empty($request->input('checkboxInput'))) {
            return redirect()->back()
                ->withInput($request->except('checkboxInput'))
                ->withErrors(['checkboxInput' => 'Debe seleccionar al menos un elemento del checkbox.']);
        }
    
        $input['item'] = json_encode($request->input('checkboxInput'));

        $endowment = $this->endowmentRepository->create($input);
        
        Flash::success('Endowment saved successfully.');

        return redirect(route('endowments.index'));
    }

    /**
     * Display the specified endowment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        return view('endowments.show')->with('endowment', $endowment);
    }

    /**
     * Show the form for editing the specified endowment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        $contracts = Contracts::with('employe')->get();
        // Obtener los valores seleccionados almacenados en la base de datos
        $selectedItems = json_decode($endowment->item);
        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        return view('endowments.edit', compact('contracts', 'selectedItems'))->with('endowment', $endowment);
    }

    /**
     * Update the specified endowment in storage.
     *
     * @param int $id
     * @param UpdateendowmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateendowmentRequest $request)
    {
        $endowment = $this->endowmentRepository->find($id);
        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $input = $request->all();
        $input['item'] = json_encode($request->input('checkboxInput'));
    
        $this->endowmentRepository->update($input, $id);

        Flash::success('Endowment updated successfully.');

        return redirect(route('endowments.index'));
    }

    /**
     * Remove the specified endowment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $this->endowmentRepository->delete($id);

        Flash::success('Endowment deleted successfully.');

        return redirect(route('endowments.index'));
    }
}
