<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedoctorsRequest;
use App\Http\Requests\UpdatedoctorsRequest;
use App\Repositories\doctorsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\medical_fees;
use App\Models\doctors;
use Flash;
use Response;

class doctorsController extends AppBaseController
{
    /** @var doctorsRepository $doctorsRepository*/
    private $doctorsRepository;

    public function __construct(doctorsRepository $doctorsRepo)
    {
        $this->doctorsRepository = $doctorsRepo;
    }

    /**
     * Display a listing of the doctors.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $doctorsQuery = doctors::query();

        if (!empty($search)) {
            $doctorsQuery->where('dni', 'LIKE', '%' . $search . '%')
                    ->orWhere('full_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('category_doctor', 'LIKE', '%' . $search . '%')
                    ->orWhere('specialty', 'LIKE', '%' . $search . '%')
                    ->orWhere('payment_type', 'LIKE', '%' . $search . '%')
                    ->orWhere('code', 'LIKE', '%' . $search . '%');
        }

        $doctors = $doctorsQuery->paginate($perPage);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctors.
     *
     * @return Response
     */
    public function create()
    {
        $rates = Medical_fees::orderby('payment_manual')->pluck('payment_manual', 'id');
        $fees = Diferential_rates::orderby('rate_description')->pluck('rate_description', 'id');
        return view('doctors.create', compact('rates', 'fees'));
    }

    /**
     * Store a newly created doctors in storage.
     *
     * @param CreatedoctorsRequest $request
     *
     * @return Response
     */
    public function store(CreatedoctorsRequest $request)
    {
        $input = $request->all();

        $doctors = $this->doctorsRepository->create($input);

        Flash::success('Doctors saved successfully.');

        return redirect(route('doctors.index'));
    }

    /**
     * Display the specified doctors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.show')->with('doctors', $doctors);
    }

    /**
     * Show the form for editing the specified doctors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.edit')->with('doctors', $doctors);
    }

    /**
     * Update the specified doctors in storage.
     *
     * @param int $id
     * @param UpdatedoctorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedoctorsRequest $request)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        $doctors = $this->doctorsRepository->update($request->all(), $id);

        Flash::success('Doctors updated successfully.');

        return redirect(route('doctors.index'));
    }

    /**
     * Remove the specified doctors from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        $this->doctorsRepository->delete($id);

        Flash::success('Doctors deleted successfully.');

        return redirect(route('doctors.index'));
    }

    public function getDoctors()
    {
        $results = DB::connection('SismaSalud')->select("SELECT sm.codigo, sm.cedula, sm.nombre,
        se.desplegable AS Categoria, esp.nombre AS especialidad,
        sm.tipo_pago, sm.cod_manual_pago, smn.nombre AS manual_pago, smn.tipo, 
        sm.cod_manual_pago2, smn2.nombre AS manual_pago2, smn2.tipo AS tipo2
        FROM sis_medi sm
        INNER JOIN sis_especialidades esp ON esp.codigo = sm.especialidad
        RIGHT JOIN sismaelm se ON se.valor = sm.tipo
        LEFT JOIN sis_manual smn ON smn.codigo = sm.cod_manual_pago
        LEFT JOIN sis_manual smn2 ON smn2.codigo = sm.cod_manual_pago2
        WHERE se.tipo = 'PERSO'
        AND se.nro NOT IN (003, 004, 005)
        AND esp.id != 1
        AND sm.codigo NOT IN (1535)
        AND sm.es_medico = 1
        AND sm.estado = 1
        ORDER BY sm.codigo");
        //dd($results);
        foreach ($results as $result) {

            $codMPago = $result->cod_manual_pago;
            $codMPago2 = $result->cod_manual_pago2;
            $codMPago = ($codMPago === "") ? NULL : $codMPago;
            $codMPago2 = ($codMPago2 === "") ? NULL : $codMPago2;
            //Se valida que el procedimiento esté registrado
            $existingDoctors = Doctors::where('dni', $result->cedula)->first();
            if ($existingDoctors) {              
                // Actualiza los datos del procedimiento    
                $existingDoctors->dni = $result->codigo;   
                $existingDoctors->dni = $result->cedula;
                $existingDoctors->full_name = $result->nombre;
                $existingDoctors->category_doctor = $result->Categoria;
                $existingDoctors->specialty = $result->especialidad;
                $existingDoctors->payment_type = $result->tipo_pago;
                $existingDoctors->id_fees = $codMPago;
                $existingDoctors->id_fees2 = $codMPago2;           
                $existingDoctors->save();
            }else {
                $newDoctors = new Doctors();
                $newDoctors->code = $result->codigo;
                $newDoctors->dni = $result->cedula;
                $newDoctors->full_name = $result->nombre;
                $newDoctors->category_doctor = $result->Categoria;
                $newDoctors->specialty = $result->especialidad;
                $newDoctors->payment_type = $result->tipo_pago;
                $newDoctors->id_fees = $codMPago;
                $newDoctors->id_fees2 = $codMPago2;
                $newDoctors->save();
            }
        }
        session()->flash('success', "Médicos actualizados correctamente!!");

        return redirect(route('doctors.index'));
    }
}
