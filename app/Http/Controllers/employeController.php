<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemployeRequest;
use App\Http\Requests\UpdateemployeRequest;
use App\Repositories\employeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
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
                        ->orWhere('cost_center', 'LIKE', '%' . $search . '%');
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
        dd($employe);
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
        u.descripcion AS UFuncional, c.fecha_inicio_contrato, 
        c.sueldo_basico, c.deshabilitar 
        FROM contratos c
        JOIN empleado e ON c.id_empleado = e.id
        JOIN cargos ca ON ca.id = c.id_cargos
        JOIN unidades_funcionales u ON u.id = c.id_unidades_funcionales
        WHERE c.sueldo_basico > 900000 AND c.deshabilitar != 3 AND c.deshabilitar != 1");
        foreach ($results as $result) {
            //Se valida que el empleado esté registrado
            $existingEmploye = Employe::where('dni', $result->identificacion)->first();
            
            if (!$existingEmploye) {
                $newEmploye = new Employe();
                $newEmploye->dni = $result->identificacion;
                $newEmploye->name = $result->nombre_completo;
                $newEmploye->work_position = $result->cargo;
                $newEmploye->unit = 'Pendiente';
                $newEmploye->cost_center = $result->UFuncional;
                
                $newEmploye->save();
            }
        }

        $this->updateEmployees();
        session()->flash('success', "¡¡Empleados actualizados correctamente!!");
        return redirect(route('employes.index'));
    }

    public function updateEmployees()
    {
        $results = DB::connection('sqlsrv')->select("SELECT e.identificacion, e.nombre_completo, 
        c.codigo, ca.descripcion AS cargo, 
        u.descripcion AS UFuncional, c.fecha_inicio_contrato, 
        c.sueldo_basico, c.deshabilitar 
        FROM contratos c
        JOIN empleado e ON c.id_empleado = e.id
        JOIN cargos ca ON ca.id = c.id_cargos
        JOIN unidades_funcionales u ON u.id = c.id_unidades_funcionales
        WHERE c.sueldo_basico > 900000 AND c.deshabilitar != 3 AND c.deshabilitar != 1");

        foreach ($results as $result) {
            $empleadoId = $result->identificacion;
            $allDisable = true;

            foreach ($results as $contrato) {
                if ($contrato->identificacion === $empleadoId && $contrato->deshabilitar != 3) {
                    $allDisable = false;
                    break;
                }
            }

            if ($allDisable) {
                $employe = Employe::where('dni', $empleadoId)->first();

                    if ($employe) {
                        $employe->unit = 'Deshabilitado';
                        $employe->save();
        
                        $employe->contracts()
                            //->orderBy('start_date_contract', 'desc')
                            ->update(['disable' => 3]);
                    }
            }
        }
    }

}
