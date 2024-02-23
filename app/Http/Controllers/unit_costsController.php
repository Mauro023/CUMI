<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createunit_costsRequest;
use App\Http\Requests\Updateunit_costsRequest;
use App\Repositories\unit_costsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Flash;
use Response;

use App\Models\consumable;
use App\Models\surgery;
use App\Models\general_costs;
use App\Models\labour;
use App\Models\articles;
use App\Models\basket;
use App\Models\Diferential_rates;
use App\Models\Medical_fees;
use App\Models\Procedures;
use App\Models\Doctors;
use App\Models\unit_costs;
use App\Models\Soat_group;
use App\Models\msurgery_procedure;
use App\Models\log_operation_cost;
use App\Models\SismaSalud\sis_deta;



class unit_costsController extends AppBaseController
{
    /** @var unit_costsRepository $unitCostsRepository*/
    private $unitCostsRepository;

    public function __construct(unit_costsRepository $unitCostsRepo)
    {
        $this->unitCostsRepository = $unitCostsRepo;
    }

    /**
     * Display a listing of the unit_costs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_unitCosts');
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $unitCostsQuery = unit_costs::query();

        if (!empty($search)) {
            $unitCostsQuery->where('cod_surgical_act', 'LIKE', '%' . $search . '%');
        }

        $unitCosts = $unitCostsQuery->orderBy('id', 'DESC')->paginate($perPage);

        return view('unit_costs.index', compact('unitCosts'));
    }

    /**
     * Show the form for creating a new unit_costs.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_unitCosts');
        $consumables = Consumable::orderby('id')->pluck('id');
        $surgical_acts = Surgery::orderby('cod_surgical_act')->pluck('cod_surgical_act');
        return view('unit_costs.create', compact('consumables', 'surgical_acts'));
    }

    /**
     * Store a newly created unit_costs in storage.
     *
     * @param Createunit_costsRequest $request
     *
     * @return Response
     */
    public function store(Createunit_costsRequest $request)
    {
        $this->authorize('create_unitCosts');
        $input = $request->all();

        $total = $request->input('room_cost') + $request->input('gas') +  $request->input('labour') +  $request->input('basket') +  $request->input('medical_fees') + $request->input('medical_fees2') + $request->input('anesthesiologist_fees') + $request->input('consumables');
        $input['total_value'] = $total;

        $unitCosts = $this->unitCostsRepository->create($input);

        Flash::success('Unit Costs saved successfully.');

        return redirect(route('unitCosts.index'));
    }

    /**
     * Display the specified unit_costs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('show_unitCosts');
        $unitCosts = $this->unitCostsRepository->find($id);

        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }

        return view('unit_costs.show')->with('unitCosts', $unitCosts);
    }

    /**
     * Show the form for editing the specified unit_costs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update_unitCosts');
        $unitCosts = $this->unitCostsRepository->find($id);
        $surgical_acts = Surgery::orderby('cod_surgical_act')->pluck('cod_surgical_act', 'cod_surgical_act');
        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }

        return view('unit_costs.edit')
        ->with('unitCosts', $unitCosts)
        ->with('surgical_acts', $surgical_acts);
    }

    /**
     * Update the specified unit_costs in storage.
     *
     * @param int $id
     * @param Updateunit_costsRequest $request
     *
     * @return Response
     */
    public function update($id, Updateunit_costsRequest $request)
    {
        $this->authorize('update_unitCosts');
        $unitCosts = $this->unitCostsRepository->find($id);
        //dd($unitCosts);
        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }
        $request['total_value'] = $unitCosts->room_cost + $unitCosts->gas + $unitCosts->labour + $unitCosts->basket + $unitCosts->medical_fees + $unitCosts->medical_fees2 + $unitCosts->anest_fees;
        //dd($unitCosts);
        $unitCosts = $this->unitCostsRepository->update($request->all(), $id);

        Flash::success('Unit Costs updated successfully.');

        return redirect(route('unitCosts.index'));
    }

    /**
     * Remove the specified unit_costs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy_unitCosts');
        $unitCosts = $this->unitCostsRepository->find($id);

        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }

        $this->unitCostsRepository->delete($id);

        Flash::success('Unit Costs deleted successfully.');

        return redirect(route('unitCosts.index'));
    }

    public function calculate($id) {
        $this->authorize('calculate_cost');
        //Surgery time
        $surgery = Surgery::find($id);
        if ($surgery->category == "1,1,1") {
            $this->oneProcedure($surgery);
        }elseif ($surgery->category == "1,1,*") {
            $this->moreProcedures($surgery);
        }
    }
    
    public function costSurgeries(Request $request){
        $this->authorize('calculate_cost');
        $surgeries = Surgery::where('date_surgery', '>=', $request->start_date)
        ->where('date_surgery', '<=', $request->end_date)->get();
        
        foreach ($surgeries as $surgery) {
            if ($surgery->category == "1,1,1") {
                $this->oneProcedure($surgery);
            }elseif ($surgery->category == "1,1,*") {
                $this->moreProcedures($surgery);
            }
        }
        return redirect(route('unitCosts.index'));
    }

    public function oneProcedure($surgery)
    {
        //dd($surgery);
        $time = $surgery->surgeryTime;

        //Operating room
        $RoomTime = General_costs::where('description', $surgery->operating_room)->first();
        $valueRoomTime = ($RoomTime->value/60) * $time;

        //Gases
        $gases = General_costs::where('description', 'GASES')->first();
        $gasesValue = $gases->value * $time;

        //Labour
        $totalLaborCost = 0;
        if ($surgery->cod_helper !== NULL && $surgery->cod_helper !== 0) {
            $value = Labour::where('code', 3)->first();
            $totalLaborCost +=  $value->labor_value;
        }
        if ($surgery->cod_instrumentator !== NULL && $surgery->cod_instrumentator !== 0) {
            $value = Labour::where('code', 1)->first();
            $totalLaborCost += $value->labor_value;
        }
        if ($surgery->cod_rotator !== NULL && $surgery->cod_rotator !== 0) {
            $value = Labour::where('code', 2)->first();
            $totalLaborCost += $value->labor_value;
        }
        $labour = $totalLaborCost * $time;
        //Basket
        $surgical_acts = $surgery->cod_surgical_act;
        $baskets = basket::where('surgical_act', $surgical_acts)->get();
        $totalBasketCost = 0;

        foreach ($baskets as $basket) {
            $basketId = $basket->id_article;
            $value_article = Articles::where('item_code', $basketId)->first();
            $basketCost = $basket->item_quantity * $value_article->average_cost;

            $totalBasketCost += $basketCost;
        }
        //Médical fees value
        $fees_value = 0;
        //Procedures
        $getProcedure = Msurgery_procedure::where('cod_surgical_act', $surgical_acts)->first();

        //Const procedure
        $procedure = Procedures::where('id', $getProcedure->code_procedure)->first();
        $details = sis_deta::where('num_servicio', $surgical_acts)  
            ->where('tipo_qx', 1)
            ->select('num_servicio', 'cod_servicio', 'descripcion', 'porcentaje', 'codigo_cirugia', 'tipo')   
            ->get();

        $doctor_perce = $details->firstWhere('tipo', 1);
        if (!$doctor_perce) {$doctor_perce = 0;}else {$doctor_perce = $doctor_perce->porcentaje/100;}
        //doctor
        //diferential_rates
        $doctor = Diferential_rates::where('id_doctor', $surgery->id_doctor)
        ->where('id_procedure', $getProcedure->code_procedure)->first();
        
        if ($doctor) {
            $fees_value += $doctor->value1 * $doctor_perce;
        }else {
            //Medical_fees
            $doctor = Doctors::where('code', $surgery->id_doctor)->first();
            $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
            
            if ($fees->honorary_code === 13) {
                $fees_value += ($procedure->uvr * 1270 * 1.1 * $doctor_perce);
            }elseif ($fees->honorary_code === 52) {
                $fees_value += ($procedure->uvr * 1270 * 1.2 * $doctor_perce);
            }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57 || $fees->honorary_code === 68) {
                $group = soat_group::where('group', $procedure->uvr)->first();
                $fees_value += $group->surgeon;
            }
        }
            
        //doctor2
        $doctor2_perce = $details->firstWhere('tipo', 3);
        if (!$doctor2_perce) {$doctor2_perce = 0;}else {$doctor2_perce = $doctor2_perce->porcentaje/100;}
        $fees_value2 = 0;
        //diferential_rates
        $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
        if ($doctor2 !== NULL) {
            $doctor2 = Diferential_rates::where('id_doctor', $surgery->id_doctor2)
            ->where('id_procedure', $getProcedure->code_procedure)->first();
            if ($doctor2) {
                $fees_value2 += $doctor2->value2 * $doctor2_perce;
            }else {
                //Medical_fees
                $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
                $fees = Medical_fees::where('honorary_code', $doctor2->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.1 * $doctor2_perce);
                }elseif ($fees->honorary_code === 52) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.2 * $doctor2_perce);
                }
            }
        }
        
        //anestesiolog
        $antest_value = 0;
        $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
        $anest_perce = $details->firstWhere('tipo', 2);
        if (!$anest_perce) { $anest_perce = 0;}else { $anest_perce = $anest_perce->porcentaje/100;}
        if ($anest !== NULL) {
            $anest = Diferential_rates::where('id_doctor', $surgery->id_anesthesiologist)
            ->where('id_procedure', $getProcedure->code_procedure)->first();
            if ($anest) {
                $antest_value += $anest->value1 * $anest_perce;
            }else {
                //Medical_fees
                $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
                $fees = Medical_fees::where('honorary_code', $anest->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $antest_value += ($procedure->uvr * 960 * 1.1 * $anest_perce);
                }elseif ($fees->honorary_code === 52) {
                    $antest_value += ($procedure->uvr * 960 * 1.2 * $anest_perce);
                }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57 || $fees->honorary_code === 68) {
                    $group = soat_group::where('group', $procedure->uvr)->first();
                    $antest_value += $group->anesthed;
                }
            }
        }
        
        $totalValue = $valueRoomTime + $gasesValue + $labour + $totalBasketCost + $fees_value + $fees_value2 + $antest_value;
        $existingCost = Unit_costs::where('cod_surgical_act', $surgical_acts)->first();
        Log::info("Surgery: " . $surgery->study_number);
        if ($existingCost) {    
            $existingCost->update(
            [
                'room_cost' => $valueRoomTime,
                'gas' => $gasesValue,
                'total_value' => $totalValue,
                'labour' => $labour,
                'basket' => $totalBasketCost,
                'medical_fees' => $fees_value,
                'medical_fees2' => $fees_value2,
                'anest_fees' => $antest_value,
                'cod_surgical_act' => $surgical_acts
            ]);
        }else {
            Unit_costs::create(
            [
                'room_cost' => $valueRoomTime,
                'gas' => $gasesValue,
                'total_value' => $totalValue,
                'labour' => $labour,
                'basket' => $totalBasketCost,
                'medical_fees' => $fees_value,
                'medical_fees2' => $fees_value2,
                'anest_fees' => $antest_value,
                'cod_surgical_act' => $surgical_acts
            ]);
        }
    }

    public function moreProcedures($surgery)
    {
        //dd($surgery);
        $time = $surgery->surgeryTime;
        $surgical_acts = $surgery->cod_surgical_act;

        $procedures = Msurgery_procedure::where('cod_surgical_act', $surgery->cod_surgical_act)
        ->join('procedures', 'procedures.id', '=', 'msurgery_procedures.code_procedure')
        ->orderBy('uvr', 'desc')
        ->get();

        $totalUvr = 0;
        foreach ($procedures as $quanty) {
            
            $details = sis_deta::where('num_servicio', $surgical_acts)  
            ->where('tipo_qx', 1)
            ->where('codigo_cirugia', $quanty->code)
            ->select('num_servicio', 'cod_servicio', 'descripcion', 'porcentaje', 'codigo_cirugia', 'tipo')   
            ->get();
            if (!$details->isEmpty()) {
                $totalUvr = $totalUvr + $quanty->uvr;
            }
        }
        //dd($procedures);
        $fees_value = 0; $fees_value2 = 0; $antest_value = 0; $valueRoomTime = 0; $gasesValue = 0; 
        $totalLaborCost = 0; $labour = 0; $totalBasketCost = 0;
        foreach ($procedures as $procedure) {   
            //dd($procedure);
            //Consulta realizada a la tabla sis_deta
            $details = sis_deta::where('num_servicio', $surgical_acts)  
            ->where('tipo_qx', 1)
            ->where('codigo_cirugia', $procedure->code)
            ->select('num_servicio', 'cod_servicio', 'descripcion', 'porcentaje', 'codigo_cirugia', 'tipo')   
            ->get();
            
            if ($details->isEmpty()) {
                Log::info("Surgery - package: " . $procedure);
            }else {
                $percentage = ($procedure->uvr * 100)/$totalUvr;
                $time = (($percentage)/100)*$surgery->surgeryTime;
                //Médical fees value
                //diferential_rates
                $doctor = Diferential_rates::where('id_doctor', $surgery->id_doctor)
                    ->where('id_procedure', $procedure->code_procedure)->first();
                $doctor_perce = $details->firstWhere('tipo', 1);
                if (!$doctor_perce) {$doctor_perce = 0;}else {$doctor_perce = $doctor_perce->porcentaje;}
                if ($doctor) {
                    $fees_value += ($doctor->value1 * ($doctor_perce/100));
                    $fees_log = ($doctor->value1 * ($doctor_perce/100));
                    Log::info("TD " . $surgery->id_doctor . " " . $procedure->code_procedure);
                }else {
                    //Medical_fees
                    $doctor = Doctors::where('code', $surgery->id_doctor)->first();
                    $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
                    if ($fees->honorary_code === 13) {
                        $fees_value += ($procedure->uvr * 1270 * 1.1 * ($doctor_perce/100));
                        $fees_log = ($procedure->uvr * 1270 * 1.1 * ($doctor_perce/100));
                    }elseif ($fees->honorary_code === 52) {
                        $fees_value += ($procedure->uvr * 1270 * 1.2 * ($doctor_perce/100));
                        $fees_log = ($procedure->uvr * 1270 * 1.2 * ($doctor_perce/100));
                    }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57 || $fees->honorary_code === 68) {
                        $group = soat_group::where('group', $procedure->uvr)->first();
                        $fees_value += $group->surgeon;
                    }
                }   
    
                //doctor2
                //diferential_rates
                $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
                $doctor2_perce = $details->firstWhere('tipo', 3);
                if (!$doctor2_perce) {$doctor2_perce = 0;}else {$doctor2_perce = $doctor2_perce->porcentaje;}
                if ($doctor2 !== NULL) {
                    $doctor2 = Diferential_rates::where('id_doctor', $surgery->id_doctor2)
                    ->where('id_procedure', $procedure->code_procedure)->first();
                    if ($doctor2) {
                        $fees_value2 += ($doctor2->value2 * ($doctor2_perce/100));
                        $fees_log2 = ($doctor2->value2 * ($doctor2_perce/100));
                        Log::info("TD " . $surgery->id_doctor2 . " " . $procedure->code_procedure);
                    }else {
                        //Medical_fees
                        $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
                        $fees = Medical_fees::where('honorary_code', $doctor2->id_fees)->first();
                        if ($fees->honorary_code === 13) {
                            $fees_value2 += ($procedure->uvr * 960 * 1.1 * ($doctor2_perce/100));
                            $fees_log2 = ($procedure->uvr * 960 * 1.1 * ($doctor2_perce/100));
                        }elseif ($fees->honorary_code === 52) {
                            $fees_value2 += ($procedure->uvr * 960 * 1.2 * ($doctor2_perce/100));
                            $fees_log2 = ($procedure->uvr * 960 * 1.2 * ($doctor2_perce/100));
                        }
                    }
                }
    
                //anestesiolog
                $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
                $anest_perce = $details->firstWhere('tipo', 2);
                if (!$anest_perce) { $anest_perce = 0;}else { $anest_perce = $anest_perce->porcentaje;}
                $antest_log = 0;
                if ($anest !== NULL) {
                    $anest = Diferential_rates::where('id_doctor', $surgery->id_anesthesiologist)
                    ->where('id_procedure', $procedure->code_procedure)->first();
                    
                    if ($anest) {
                        $antest_value += ($anest->value1 * ($anest_perce/100));
                        $antest_log = ($anest->value1 * ($anest_perce/100));
                        Log::info("TD " . $surgery->id_anesthesiologist . " " . $procedure->code_procedure);
                    }else {
                        //Medical_fees
                        $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
                        $fees = Medical_fees::where('honorary_code', $anest->id_fees)->first();
                        if ($fees->honorary_code === 13) {
                            $antest_value += ($procedure->uvr * 960 * 1.1 * ($anest_perce/100));
                            $antest_log = ($procedure->uvr * 960 * 1.1 * ($anest_perce/100));
                        }elseif ($fees->honorary_code === 52) {
                            $antest_value += ($procedure->uvr * 960 * 1.2 * ($anest_perce/100));
                            $antest_log = ($procedure->uvr * 960 * 1.2 * ($anest_perce/100));
                        }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57 || $fees->honorary_code === 68) {
                            $group = soat_group::where('group', $procedure->uvr)->first();
                            $antest_value += $group->anesthed;
                            $antest_log = $group->anesthed;
                        }
                        Log::info("Anest " . $anest . " " . $antest_log);
                        Log::info("Surgery: " . $surgery->study_number);
                        Log::info("Percentage: " . $anest_perce);
                    }
                }
    
                //Operating room
                $RoomTime = General_costs::where('description', $surgery->operating_room)->first();
                $valueRoomTime += ($RoomTime->value/60) * $time;
                $room_log = ($RoomTime->value/60) * $time;
    
                //Gases
                $gases = General_costs::where('description', 'GASES')->first();
                $gasesValue += $gases->value * $time;
                $gases_log = $gases->value * $time;
    
                //Labour
                $totalLaborCost = 0;
                if ($surgery->cod_helper !== NULL && $surgery->cod_helper !== 0) {
                    $value = Labour::where('code', 3)->first();
                    $totalLaborCost +=  $value->labor_value;
                }
                if ($surgery->cod_instrumentator !== NULL && $surgery->cod_instrumentator !== 0) {
                    $value = Labour::where('code', 1)->first();
                    $totalLaborCost += $value->labor_value;
                }
                if ($surgery->cod_rotator !== NULL && $surgery->cod_rotator !== 0) {
                    $value = Labour::where('code', 2)->first();
                    $totalLaborCost += $value->labor_value;
                }
                $labour += $totalLaborCost * $time;
                $labour_log = $totalLaborCost * $time;
                
                $existingLog = Log_operation_cost::where('cod_surgical_act', $surgical_acts)
                ->where('code_procedure', $procedure->code_procedure)->first();
                
                if ($existingLog) {        
                    $existingLog->update(
                    [
                        'percentage_uvr' => $percentage,
                        'time_procedure' => $time,
                        'doctor_percentage' => $doctor_perce,
                        'doctor_fees' => $fees_log,
                        'anest_percentage' => $anest_perce,
                        'anest_fees' => $antest_log,
                        'total_uvr' => $totalUvr,
                        'room_cost' => $room_log,
                        'gases' => $gases_log,
                        'labour' => $labour_log,
                        'cod_surgical_act' => $surgical_acts,
                        'code_procedure' => $procedure->code_procedure
                    ]);
                }else {
                    Log_operation_cost::create(
                    [
                        'percentage_uvr' => $percentage,
                        'time_procedure' => $time,
                        'doctor_percentage' => $doctor_perce,
                        'doctor_fees' => $fees_log,
                        'anest_percentage' => $anest_perce,
                        'anest_fees' => $antest_log,
                        'total_uvr' => $totalUvr,
                        'room_cost' => $room_log,
                        'gases' => $gases_log,
                        'labour' => $labour_log,
                        'cod_surgical_act' => $surgical_acts,
                        'code_procedure' => $procedure->code_procedure
                    ]);
                }     
            }
        }
        //Basket
        $baskets = basket::where('surgical_act', $surgical_acts)->get();
        $totalBasketCost = 0;

        foreach ($baskets as $basket) {
            $basketId = $basket->id_article;
            $value_article = Articles::where('item_code', $basketId)->first();
            $basketCost = $basket->item_quantity * $value_article->last_cost;

            $totalBasketCost += $basketCost;
        }

        $totalValue = $valueRoomTime + $gasesValue + $labour + $totalBasketCost + $fees_value + $fees_value2 + $antest_value;
        $existingCost = Unit_costs::where('cod_surgical_act', $surgical_acts)->first();
        
        if ($existingCost) {     
            $existingCost->update(
            [
                'room_cost' => $valueRoomTime,
                'gas' => $gasesValue,
                'total_value' => $totalValue,
                'labour' => $labour,
                'basket' => $totalBasketCost,
                'medical_fees' => $fees_value,
                'medical_fees2' => $fees_value2,
                'anest_fees' => $antest_value,
                'cod_surgical_act' => $surgical_acts
            ]);
        }else {
            Unit_costs::create(
            [
                'room_cost' => $valueRoomTime,
                'gas' => $gasesValue,
                'total_value' => $totalValue,
                'labour' => $labour,
                'basket' => $totalBasketCost,
                'medical_fees' => $fees_value,
                'medical_fees2' => $fees_value2,
                'anest_fees' => $antest_value,
                'cod_surgical_act' => $surgical_acts
            ]);
        }   
    }
}

