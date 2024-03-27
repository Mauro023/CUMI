<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemployeRequest;
use App\Http\Requests\UpdateemployeRequest;
use App\Repositories\employeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Employe;
use App\Models\Sisma_Nomina\empleado;
use App\Models\Sisma_Nomina\contratos;
use Flash;
use Response;

class employeController extends AppBaseController
{
    /** @var employeRepository $employeRepository*/
    private $employeRepository;

    public function __construct(employeRepository $employeRepo)
    {
        $this->employeRepository = $employeRepo;
    }

    /**
     * Display a listing of the employe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_employes');
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $employesQuery = Employe::query();

        if (!empty($search)) {
            $employesQuery->where('dni', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('work_position', 'LIKE', '%' . $search . '%')
                        ->orWhere('unit', 'LIKE', '%' . $search . '%')
                        ->orWhere('cost_center', 'LIKE', '%' . $search . '%')
                        ->orWhere('service', 'LIKE', '%' . $search . '%');
        }

        $employes = $employesQuery->paginate($perPage);

        return view('employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new employe.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_employes');
        return view('employes.create');
    }

    /**
     * Store a newly created employe in storage.
     *
     * @param CreateemployeRequest $request
     *
     * @return Response
     */
    public function store(CreateemployeRequest $request)
    {
        $this->authorize('create_employes');
        $input = $request->all();

        $existingEmploye = Employe::where('dni', $input['dni'])->first();
    
        if ($existingEmploye) {
            session()->flash('error', "¡¡Empleado ya existe!!");
            return redirect(route('employes.index'));
        }


        $employe = $this->employeRepository->create($input);

        session()->flash('success', "¡¡Empleado registrado con éxito!!");

        return redirect(route('employes.index'));
    }

    /**
     * Display the specified employe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('show_employes');
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        return view('employes.show')->with('employe', $employe);
    }

    /**
     * Show the form for editing the specified employe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update_employes');
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        return view('employes.edit')->with('employe', $employe);
    }

    /**
     * Update the specified employe in storage.
     *
     * @param int $id
     * @param UpdateemployeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemployeRequest $request)
    {
        $this->authorize('update_employes');
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        $employe = $this->employeRepository->update($request->all(), $id);

        session()->flash('success', "¡¡Empleado modificado con éxito!!");

        return redirect(route('employes.index'));
    }

    /**
     * Remove the specified employe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy_employes');
        $employe = $this->employeRepository->find($id);
        //dd($employe);
        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }
        $name = $employe->name;
        $this->employeRepository->delete($id);

        session()->flash('success', "¡¡$name ELIMINADO CORRECTAMENTE!!");

        return redirect(route('employes.index'));
    }

    public function getEmployees()
    {
        $results = DB::connection('sqlsrv')->select("SELECT e.identificacion, e.nombre_completo, 
            c.codigo, ca.descripcion AS cargo, 
            u.descripcion AS UFuncional,
            cc.descripcion AS Servicio,
            c.fecha_inicio_contrato, 
            c.sueldo_basico, c.deshabilitar 
            FROM contratos c
            JOIN empleado e ON c.id_empleado = e.id
            JOIN cargos ca ON ca.id = c.id_cargos
            JOIN unidades_funcionales u ON u.id = c.id_unidades_funcionales
            JOIN centros_de_costos cc ON cc.idccosto = c.id_centro_de_costo
            WHERE ca.descripcion NOT IN ('Estudiante en practica', 'Aprendiz sena') 
            AND c.deshabilitar NOT IN ('1', '3')
            ORDER BY e.nombre_completo");
        
        foreach ($results as $result) {
            //Se valida que el empleado esté registrado
            $existingEmploye = Employe::where('dni', $result->identificacion)->first();
            $cargo = trim($result->cargo);
            if ($existingEmploye) {
                // Actualiza los datos del empleado existente
                $existingEmploye->update([
                    'dni' => $result->identificacion,
                    'name' => $result->nombre_completo,
                    'work_position' => $result->cargo,
                    'unit' => $this->getUnit($cargo),
                    'cost_center' => $result->UFuncional,
                    'service' => $result->Servicio
                ]);
            }else {
                Employe::create([
                    'dni' => $result->identificacion,
                    'name' => $result->nombre_completo,
                    'work_position' => $result->cargo,
                    'unit' => $this->getUnit($cargo),
                    'cost_center' => $result->UFuncional,
                    'service' => $result->Servicio
                ]);
            }
        }
        //$this->updateEmployees();
        session()->flash('success', "¡¡Empleados actualizados correctamente!!");
        return redirect(route('employes.index'));
    }

    public function updateEmployees()
    {
        $results = Employe::where('unit', '!=', 'Deshabilitado')->get();
        foreach ($results as $result) {
            $empleado = Empleado::leftjoin('contratos', 'contratos.id_empleado', '=', 'empleado.id')
            ->where('empleado.identificacion', $result->dni)
            ->whereNotIn('contratos.deshabilitar', [1, 3])
            ->select('empleado.id', 'empleado.identificacion', 'empleado.nombre_completo')
            ->first();
            //dd($empleado);
            if (!$empleado) {
                $result->update([
                    'unit' => 'Deshabilitado'
                ]);
    
                $result->contracts()
                //->orderBy('start_date_contract', 'desc')
                ->update(['disable' => 3]);
            }
        }
        session()->flash('success', "¡¡Empleados actualizados correctamente!!");
        return redirect(route('employes.index'));
    }

    public function getUnit($cargo){
        // Array asociativo que relaciona los cargos con las categorías
        $categorias = [
            'ANALISTA DE DATOS' => 'Administrativo',
            'ASISTENTE CONTABLE' => 'Administrativo',
            'AUDITOR MEDICO' => 'Administrativo asistencial',
            'AUXILIAR ADMINISTRATIVO GENERAL' => 'Administrativo',
            'AUXILIAR BIOMEDICO' => 'Administrativo',
            'AUXILIAR CLINICO' => 'Asistencial',
            'AUXILIAR DE ADMISIONES' => 'Otros',
            'AUXILIAR DE AUTORIZACIONES' => 'Administrativo',
            'AUXILIAR DE COMPRAS' => 'Administrativo',
            'AUXILIAR DE CUENTAS MEDICAS' => 'Administrativo',
            'AUXILIAR DE ENFERMERIA' => 'Asistencial',
            'AUXILIAR DE FACTURACION' => 'Administrativo asistencial',
            'AUXILIAR DE FARMACIA' => 'Asistencial',
            'AUXILIAR DE GESTION DOCUMENTAL' => 'Administrativo',
            'AUXILIAR DE MANTENIMIENTO E INFRAESTRUCTURA - ELECTRICISTA' => 'Otros',
            'AUXILIAR DE PROGRAMACIÓN QUIRURGICA' => 'Otros',
            'AUXILIAR DE RADICACION' => 'Administrativo',
            'AUXILIAR DE SERVICIOS GENERALES' => 'Otros',
            'AUXILIAR DE SISTEMAS' => 'Administrativo',
            'AUXILIAR DE TALENTO HUMANO' => 'Administrativo',
            'AUXILIAR MANTENIMIENTO E INFRAESTRUCTURA' => 'Otros',
            'COMUNICADORA ORGANIZACIONAL' => 'Administrativo',
            'CONTADOR' => 'Administrativo',
            'COORDINADOR DE CALIDAD' => 'Administrativo',
            'COORDINADOR DE CONSULTA EXTERNA' => 'Administrativo asistencial',
            'COORDINADOR DE FACTURACION' => 'Administrativo',
            'COORDINADOR DE HOSPITALIZACION' => 'Administrativo asistencial',
            'COORDINADOR DE IMAGENOLOGIA' => 'Administrativo asistencial',
            'COORDINADOR DE INFRAESTRUCTURA Y MANTENIMIENTO' => 'Administrativo',
            'COORDINADOR DE SISTEMA' => 'Administrativo',
            'COORDINADOR DE URGENCIAS' => 'Administrativo asistencial',
            'COORDINADOR UCI' => 'Administrativo asistencial',
            'COORDINADORA SIAU' => 'Administrativo asistencial',
            'COORDINADORA DE CONTRATACION' => 'Administrativo',
            'COORDINADOR SERVICIOS FARMACEUTICOS/ DIRECTOR TECNICO' => 'Administrativo asistencial',
            'COORDINADORA DE ENFERMERIA' => 'Administrativo asistencial',
            'DIRECTOR SERVICIOS FARMACEUTICOS' => 'Administrativo asistencial',
            'DIRECTOR MEDICO' => 'Administrativo asistencial',
            'DIRECTORA ADMINISTRATIVA Y FINANCIERA' => 'Administrativo',
            'DIRECTORA DE GESTION HUMANA' => 'Administrativo',
            'ENFERMERA AUDITORA DE CUENTAS MEDICAS' => 'Administrativo',
            'ENFERMERA LÍDER DE HOSPITALIZACIÓN' => 'Administrativo asistencial',
            'ENFERMERO (A) JEFE' => 'Asistencial',
            'ENFERMERO LÍDER DE URGENCIAS' => 'Administrativo asistencial',
            'FISIOTERAPEUTA' => 'Asistencial',
            'FISIOTERAPEUTA LIDER' => 'Administrativo asistencial',
            'FISIOTERAPEUTA REHABILITADORA CARDIACA' => 'Asistencial',
            'GERENTE GENERAL' => 'Otros',
            'GESTOR QUIRURGICO' => 'Administrativo asistencial',
            'INGENIERA DE PROCESOS/CIRUGIA' => 'Administrativo asistencial',
            'INGENIERO BIOMEDICO' => 'Administrativo',
            'INGENIERO DE PROCESOS' => 'Administrativo',
            'INGENIERO DE SOPORTE' => 'Administrativo',
            'INSTRUMENTADOR QUIRURGICO' => 'Asistencial',
            'INSTRUMENTADOR QUIRURGICO LÍDER DE CENTRAL DE ESTERILIZACIÓN' => 'Administrativo asistencial',
            'LIDER DE CONVENIOS ESPECIALES' => 'Administrativo asistencial',
            'MEDICO EPIDEMIOLOGO' => 'Administrativo asistencial',
            'MEDICO ESPECIALISTA INTERNISTA - INFECTOLOGO' => 'Asistencial',
            'MEDICO GENERAL' => 'Asistencial',
            'MEDICO RURAL' => 'Asistencial',
            'NUTRICIONISTA' => 'Administrativo asistencial',
            'ORIENTADOR' => 'Otros',
            'PROFESIONAL DE CARTERA' => 'Administrativo',
            'PROFESIONAL DE COSTOS Y PRESUPUETOS' => 'Administrativo',
            'PROFESIONAL DE GESTIÓN  RIESGO Y CONTROL INTERNO' => 'Administrativo',
            'PROFESIONAL DE NOMINA' => 'Administrativo',
            'PROFESIONAL DE SALUD Y SEGURIDAD EN EL TRABAJO' => 'Administrativo asistencial',
            'PROFESIONAL EN COMPRAS Y SUMINISTROS' => 'Administrativo',
            'PROFESIONAL LOGISTICA' => 'Administrativo',
            'PSICÓLOGO CLINICO' => 'Administrativo asistencial',
            'PSICÓLOGO ORGANIZACIONAL' => 'Otros',
            'QUIMICO FARMACEUTICO' => 'Asistencial',
            'QUIMICO FARMACEUTICO - CLINICO' => 'Asistencial',
            'REFERENTE DE SEGURIDAD DEL PACIENTE' => 'Administrativo asistencial',
            'REGENTE DE FARMACIA' => 'Asistencial',
            'SECRETARIO GENERAL' => 'Otros',
            'SUPERVISOR TECNICO EN REFRIGERACION' => 'Otros',
            'TECNICO EN IMÁGENES DIAGNOSTICAS' => 'Asistencial',
            'TECNICO EN IMÁGENES DIAGNOSTICA' => 'Asistencial',
            'TECNICO EN REFRIGERACIÓN' => 'Otros',
            'TECNOLOGO DE IMAGENES DIAGNOSTICAS' => 'Asistencial',
            'TESORERO/CARTERA' => 'Administrativo',
            'TRABAJADORA SOCIAL' => 'Administrativo asistencial',
            'TRANSCRIPTORA' => 'Administrativo asistencial'
        ];        

        if (array_key_exists($cargo, $categorias)) {
            $categoria = $categorias[$cargo];
        } else {
            $categoria = 'Pendiente';
        }
        return $categoria;
    }

}
