<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateendowmentRequest;
use App\Http\Requests\UpdateendowmentRequest;
use App\Repositories\endowmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;
use PDF;
use App\Models\Employe;
use App\Models\Contracts;
use App\Models\Endowment;
use Carbon\Carbon;

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
        $this->authorize('view_endowments');
        //$endowments = $this->endowmentRepository->all();
        $threeMonthsAgo = now()->subMonths(3);
        $contracts = Contracts::where('disable', '!=', '3')
        ->where('salary', '<', 2320000)
        ->where('start_date_contract', '<=', $threeMonthsAgo)
        ->get();

        return view('endowments.index')
            ->with('contracts', $contracts);
    }

    /**
     * Show the form for creating a new endowment.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_endowments');
        // Obtener los empleados que cumplen con los requisitos
        $contracts = Contracts::whereHas('employe', function ($query) {
            // Validar antigüedad mínima de 3 meses
            $threeMonthsAgo = now()->subMonths(3);
            $query->where('start_date_contract', '<=', $threeMonthsAgo);
            
            // Validar salario mínimo
            $minSalary =  2320000;
            $query->where('salary', '<', $minSalary);
            
            // Validar contrato habilitado
            $query->where('disable', '!=', '3');
        })
        ->join('employes', 'contracts.employe_id', '=', 'employes.id')
        ->where('unit', '!=', 'Pendiente')
        ->where('unit', '!=', 'Deshabilitado')
        ->orderBy('employes.name')
        ->pluck('employes.name', 'contracts.id');
        
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
        $this->authorize('create_endowments');
        $input = $request->all();
        $contracts = Contracts::find($request->contract_id);

        // Verificar selección de checkboxes
        if (empty($request->input('checkboxInput'))) {
            $validator->errors()->add('checkboxInput', 'Debe seleccionar al menos un elemento del checkbox.');
            return redirect()->back()->withErrors($validator)->withInput($request->except('checkboxInput'));
        }

        $input = $request->except('checkboxInput');
        $input['item'] = json_encode($request->input('checkboxInput'));
        $period = $input['period'];
        $existingItems = $this->validationRules2($input['period'], $input['contract_id'], $input['deliver_date'], $input['item']);
        if ($existingItems) {
            $existingItemsString = implode(', ', $existingItems);
            Flash::error("La entrega de '$existingItemsString' correspondiente al periodo de '{$input['period']}' ya existe");
            return redirect()->route('endowments.index');
        }else {
            $endowments = $this->endowmentRepository->create($input);
            Flash::success('¡¡Dotación registrada con exito!!.');
    
            $pdfUrl = route('generar.acta.entrega', ['id' => $endowments->id]);
    
            return redirect()->route('endowments.index')
            ->with('pdfUrl', $pdfUrl);
        }
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
        $this->authorize('show_endowments');
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Dotacion no encontrada');

            return redirect(route('endowments.index'));
        }
        
        $pdfUrl = route('generar.acta.entrega', ['id' => $endowment->id]);
        return view('endowments.show', compact('pdfUrl', 'endowment'));
    }

    public function showEmploye($id)
    {
        $this->authorize('view_endowments');
        $employee = Employe::findOrFail($id);
        $endowments = collect();
        foreach ($employee->contracts as $contract) {
            $endowments = $endowments->merge($contract->endowment);
        }

        return view('endowments.endowment_show')
            ->with('employee', $employee)
            ->with('endowments', $endowments);
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
        $this->authorize('update_endowments');
        $endowment = $this->endowmentRepository->find($id);

        $contracts = Contracts::whereHas('employe', function ($query) {
            // Validar antigüedad mínima de 3 meses
            $threeMonthsAgo = now()->subMonths(3);
            $query->where('start_date_contract', '<=', $threeMonthsAgo);
            
            // Validar salario mínimo
            $minSalary =  2320000;
            $query->where('salary', '<', $minSalary);
            
            // Validar contrato habilitado
            $query->where('disable', '!=', '3');
        })
        ->join('employes', 'contracts.employe_id', '=', 'employes.id')
        ->where('unit', '!=', 'Pendiente')
        ->where('unit', '!=', 'Deshabilitado')
        ->orderBy('employes.name')
        ->pluck('employes.name', 'contracts.id');
        // Obtener los valores seleccionados almacenados en la base de datos
        $selectedItems = json_decode($endowment->item);
        $signature = $endowment->employe_signature;
        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        return view('endowments.edit', compact('contracts', 'selectedItems', 'signature'))->with('endowment', $endowment);
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
        $this->authorize('update_endowments');
        $endowment = $this->endowmentRepository->find($id);
        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $input = $request->all();
        $input['item'] = json_encode($request->input('checkboxInput'));

        $period = $input['period'];
        $count = $this->validationRules($input['period'], $input['contract_id'], $input['deliver_date'], $input['item']);
        if ($count >= 3) {
            Flash::error("Ya se ha realizado el máximo de entregas permitidas en el periodo de '$period'");
            return redirect()->route('endowments.index');
        }else {
            $this->endowmentRepository->update($input, $id);
            Flash::success('¡¡Entrega modificada con exito!!');

            $pdfUrl = route('generar.acta.entrega', ['id' => $endowment->id]);

            return redirect()->route('endowments.index')
            ->with('pdfUrl', $pdfUrl);
        }
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
        $this->authorize('destroy_endowments');
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $this->endowmentRepository->delete($id);

        Flash::success('Endowment deleted successfully.');

        return redirect(route('endowments.index'));
    }

    public function generarActaEntrega($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');
            return redirect(route('endowments.index'));
        }

        // Obtener los datos necesarios del endowment
        $id = $endowment->id;
        $contractId = $endowment->contract_id;
        $deliverDate = $endowment->deliver_date;
        $item = $endowment->item;
        $period = $endowment->period;
        $signature = $endowment->employe_signature;
        // Obtener el contrato y el empleado asociado
        $contract = Contracts::with('employe')->find($contractId);
        $employeeName = $contract->employe->name;
        $employeeDni = $contract->employe->dni;
        $employeeWork = $contract->employe->work_position;


        // Cargar la vista PDF y pasar los datos necesarios
        $pdf = PDF::loadView('endowments.acta_entrega', compact('id','deliverDate','contractId',
        'item', 'period', 'signature', 'employeeName', 'employeeDni', 'employeeWork'));

        // Retornar el PDF para su visualización en el navegador
        return response($pdf->output())
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="acta_entrega.pdf"');
    }

    public static function validationRules($period, $id, $deliver_date, $item)
    {
        $carbonDate = Carbon::parse($deliver_date);
        $year = $carbonDate->format('Y');
        $items = json_decode($item, true);
        $itemBD = Endowment::select('item')
        ->where('period', $period)
        ->whereYear('deliver_date', $year)
        ->where('contract_id', $id)
        ->pluck('item')
        ->toArray();

        $itemBDArray = [];

        foreach ($itemBD as $item2) {
            $decodedItem = json_decode($item2, true);
            $itemBDArray = array_merge($itemBDArray, $decodedItem);
        }

        $existingItems = array_intersect($items, $itemBDArray);
        
        return $existingItems;
    }

    public static function validationRules2($period, $id, $deliver_date, $item)
    {
        $carbonDate = Carbon::parse($deliver_date);
        $year = $carbonDate->format('Y');
        $items = json_decode($item, true);

        $itemBD = Endowment::select('item')
        ->where('period', $period)
        ->whereYear('deliver_date', $year)
        ->where('contract_id', $id)
        ->pluck('item')
        ->toArray();

        $itemBDArray = [];

        foreach ($itemBD as $item2) {
            $decodedItem = json_decode($item2, true);
            $itemBDArray = array_merge($itemBDArray, $decodedItem);
        }

        $existingItems = array_intersect($items, $itemBDArray);
        
        return $existingItems;
    }
}