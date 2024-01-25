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
        $unitCosts = $this->unitCostsRepository->find($id);

        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }

        return view('unit_costs.edit')->with('unitCosts', $unitCosts);
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
        $unitCosts = $this->unitCostsRepository->find($id);

        if (empty($unitCosts)) {
            Flash::error('Unit Costs not found');

            return redirect(route('unitCosts.index'));
        }

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
        //Surgery time
        $surgery = Surgery::find($id);
        //dd($surgery);
        $time = $surgery->surgeryTime;

        //Operating room
        $RoomTime = General_costs::where('description', $surgery->operating_room)->first();
        $valueRoomTime = $RoomTime->value * $time;

        //Gases
        $gases = General_costs::where('description', 'GASES')->first();
        $gasesValue = $gases->value * $time;

        //Labour
        $totalLaborCost = 0;
        if ($surgery->cod_helper !== NULL && $surgery->cod_helper != 0) {
            $value = Labour::where('position', 'MÉDICO AYUDANTE')->first();
            $totalLaborCost +=  $value->labor_value;
        }
        if ($surgery->cod_instrumentator !== NULL && $surgery->cod_instrumentator != 0) {
            $value = Labour::where('position', 'INSTRUMENTADOR QUIRURGICO')->first();
            $totalLaborCost += $value->labor_value;
        }
        if ($surgery->cod_rotator !== NULL && $surgery->cod_rotator != 0) {
            $value = Labour::where('position', 'AUXILIAR DE ENFERMERIA')->first();
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
            $basketCost = $basket->item_quantity * $value_article->last_cost;

            $totalBasketCost += $basketCost;
        }

        //Médical fees value
        $fees_value = 0;
        //Const procedure
        $procedure = Procedures::where('id', $surgery->id_procedures)->first();
        //doctor
        //diferential_rates
        $doctor = Diferential_rates::where('id_doctor', $surgery->id_doctor)
        ->where('id_procedure', $surgery->id_procedures)->first();
        if ($doctor) {
            $fees_value += $doctor->value1;
        }else {
            //Medical_fees
            $doctor = Doctors::where('code', $surgery->id_doctor)->first();
            $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
            if ($fees->honorary_code === 13) {
                $fees_value += ($procedure->uvr * 1270 * 1.1);
            }elseif ($fees->honorary_code === 52) {
                $fees_value += ($procedure->uvr * 1270 * 1.2);
            }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57) {
                $group = soat_group::where('group', $procedure->uvr)->first();
                $fees_value += $group->surgeon;
            }
        }
        
        //doctor2
        $fees_value2 = 0;
        //diferential_rates
        $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
        if ($doctor2 !== NULL) {
            $doctor2 = Diferential_rates::where('id_doctor', $surgery->id_doctor2)
            ->where('id_procedure', $surgery->id_procedures)->first();
            if ($doctor2) {
                $fees_value2 += $doctor2->value2;
            }else {
                //Medical_fees
                $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
                $fees = Medical_fees::where('honorary_code', $doctor2->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.1);
                }elseif ($fees->honorary_code === 52) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.2);
                }
            }
        }
        
        //anestesiolog
        $antest_value = 0;
        $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
        if ($anest !== NULL) {
            $anest = Diferential_rates::where('id_doctor', $surgery->id_anesthesiologist)
            ->where('id_procedure', $surgery->id_procedures)->first();
            if ($anest) {
                $antest_value += $anest->value1;
            }else {
                //Medical_fees
                $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
                $fees = Medical_fees::where('honorary_code', $anest->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $antest_value += ($procedure->uvr * 960 * 1.1);
                }elseif ($fees->honorary_code === 52) {
                    $antest_value += ($procedure->uvr * 960 * 1.2);
                }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57) {
                    $group = soat_group::where('group', $procedure->uvr)->first();
                    $fees_value += $group->anesthed;
                }
            }
        }
        
        $totalValue = $valueRoomTime + $gasesValue + $labour + $totalBasketCost + $fees_value + $fees_value2 + $antest_value;
        $existingCost = Unit_costs::where('cod_surgical_act', $surgical_acts)->first();
     
        if ($existingCost) {                
            $existingCost->room_cost = $valueRoomTime;
            $existingCost->gas = $gasesValue;
            $existingCost->total_value = $totalValue;
            $existingCost->labour = $labour;
            $existingCost->basket = $totalBasketCost;
            $existingCost->medical_fees = $fees_value;
            $existingCost->medical_fees2 = $fees_value2;
            $existingCost->anest_fees = $antest_value;
            $existingCost->cod_surgical_act = $surgical_acts;
            $existingCost->save();
        }else {
            $newCost = new Unit_costs();
            $newCost->room_cost = $valueRoomTime;
            $newCost->gas = $gasesValue;
            $newCost->total_value = $totalValue;
            $newCost->labour = $labour;
            $newCost->basket = $totalBasketCost;
            $newCost->medical_fees = $fees_value;
            $newCost->medical_fees2 = $fees_value2;
            $newCost->anest_fees = $antest_value;
            $newCost->cod_surgical_act = $surgical_acts;
            $newCost->save();
        }
        return redirect(route('unitCosts.index'));
    }
    
    public function costSurgeries(Request $request){
        $surgeries = Surgery::where('date_surgery', '>=', $request->start_date)
        ->where('date_surgery', '<=', $request->end_date)->get();

        foreach ($surgeries as $surgery) {
            $this->calculateAll($surgery->id);
        }
        return redirect(route('unitCosts.index'));
    }

    public function calculateAll($id) {
        //Surgery time
        $surgery = Surgery::find($id);
        //dd($surgery);
        $time = $surgery->surgeryTime;
        //Log::info($surgery->operating_room . " " . $surgery->id);
        //Operating room
        $RoomTime = General_costs::where('description', $surgery->operating_room)->first();
        $valueRoomTime = $RoomTime->value * $time;

        //Gases
        $gases = General_costs::where('description', 'GASES')->first();
        $gasesValue = $gases->value * $time;

        //Labour
        $totalLaborCost = 0;
        if ($surgery->cod_helper !== NULL && $surgery->cod_helper != 0) {
            $value = Labour::where('position', 'MÉDICO AYUDANTE')->first();
            $totalLaborCost +=  $value->labor_value;
        }
        if ($surgery->cod_instrumentator !== NULL && $surgery->cod_instrumentator != 0) {
            $value = Labour::where('position', 'INSTRUMENTADOR QUIRURGICO')->first();
            $totalLaborCost += $value->labor_value;
        }
        if ($surgery->cod_rotator !== NULL && $surgery->cod_rotator != 0) {
            $value = Labour::where('position', 'AUXILIAR DE ENFERMERIA')->first();
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
            $basketCost = $basket->item_quantity * $value_article->last_cost;

            $totalBasketCost += $basketCost;
        }

        //Médical fees value
        $fees_value = 0;
        //Const procedure
        $procedure = Procedures::where('id', $surgery->id_procedures)->first();
        //doctor
        //diferential_rates
        $doctor = Diferential_rates::where('id_doctor', $surgery->id_doctor)
        ->where('id_procedure', $surgery->id_procedures)->first();
        if ($doctor) {
            $fees_value += $doctor->value1;
        }else {
            //Medical_fees
            $doctor = Doctors::where('code', $surgery->id_doctor)->first();
            $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
            if ($fees->honorary_code === 13) {
                $fees_value += ($procedure->uvr * 1270 * 1.1);
            }elseif ($fees->honorary_code === 52) {
                $fees_value += ($procedure->uvr * 1270 * 1.2);
            }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57) {
                $group = soat_group::where('group', $procedure->uvr)->first();
                $fees_value += $group->surgeon;
            }
        }
        
        //doctor2
        $fees_value2 = 0;
        //diferential_rates
        $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
        if ($doctor2 !== NULL) {
            $doctor2 = Diferential_rates::where('id_doctor', $surgery->id_doctor2)
            ->where('id_procedure', $surgery->id_procedures)->first();
            if ($doctor2) {
                $fees_value2 += $doctor2->value2;
            }else {
                //Medical_fees
                $doctor2 = Doctors::where('code', $surgery->id_doctor2)->first();
                $fees = Medical_fees::where('honorary_code', $doctor2->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.1);
                }elseif ($fees->honorary_code === 52) {
                    $fees_value2 += ($procedure->uvr * 960 * 1.2);
                }
            }
        }
        
        //anestesiolog
        $antest_value = 0;
        $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
        if ($anest !== NULL) {
            $anest = Diferential_rates::where('id_doctor', $surgery->id_anesthesiologist)
            ->where('id_procedure', $surgery->id_procedures)->first();
            if ($anest) {
                $antest_value += $anest->value1;
            }else {
                //Medical_fees
                $anest = Doctors::where('code', $surgery->id_anesthesiologist)->first();
                $fees = Medical_fees::where('honorary_code', $anest->id_fees)->first();
                if ($fees->honorary_code === 13) {
                    $antest_value += ($procedure->uvr * 960 * 1.1);
                }elseif ($fees->honorary_code === 52) {
                    $antest_value += ($procedure->uvr * 960 * 1.2);
                }elseif ($fees->honorary_code === 56 || $fees->honorary_code === 57) {
                    $group = soat_group::where('group', $procedure->uvr)->first();
                    $fees_value += $group->anesthed;
                }
            }
        }
        
        $totalValue = $valueRoomTime + $gasesValue + $labour + $totalBasketCost + $fees_value + $fees_value2 + $antest_value;
        $existingCost = Unit_costs::where('cod_surgical_act', $surgical_acts)->first();
     
        if ($existingCost) {                
            $existingCost->room_cost = $valueRoomTime;
            $existingCost->gas = $gasesValue;
            $existingCost->total_value = $totalValue;
            $existingCost->labour = $labour;
            $existingCost->basket = $totalBasketCost;
            $existingCost->medical_fees = $fees_value;
            $existingCost->medical_fees2 = $fees_value2;
            $existingCost->anest_fees = $antest_value;
            $existingCost->cod_surgical_act = $surgical_acts;
            $existingCost->save();
        }else {
            $newCost = new Unit_costs();
            $newCost->room_cost = $valueRoomTime;
            $newCost->gas = $gasesValue;
            $newCost->total_value = $totalValue;
            $newCost->labour = $labour;
            $newCost->basket = $totalBasketCost;
            $newCost->medical_fees = $fees_value;
            $newCost->medical_fees2 = $fees_value2;
            $newCost->anest_fees = $antest_value;
            $newCost->cod_surgical_act = $surgical_acts;
            $newCost->save();
        }
    }
}
