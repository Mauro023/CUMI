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
        $employes = $this->employeRepository->paginate(50);

        return view('employes.index')
            ->with('employes', $employes);
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
            Flash::error('El empleado ya existe.');
            return redirect(route('employes.index'));
        }


        $employe = $this->employeRepository->create($input);

        Flash::success('¡¡Empleado guardado exitosamente!!.');

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

        Flash::success('¡¡Empleado modificado exitosamente!!.');

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

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        $this->employeRepository->delete($id);

        Flash::info('¡¡Usuario eliminado correctamente!!.');

        return redirect(route('employes.index'));
    }

    public function filter(Request $request)
    {
        $input = $request->input('dni');

        $employes = Employe::where(function($query) use ($input) {
            $query->where('dni', 'LIKE', '%'.$input.'%')
                ->orWhere('name', 'LIKE', '%'.$input.'%');
        })->paginate(10);

        return view('employes.index', ['employes' => $employes]);
    }

    public function getEmployees()
    {
        $results = DB::connection('sqlsrv')->select("SELECT e.identificacion, e.nombre_completo, c.codigo, c.fecha_inicio_contrato, c.sueldo_basico, c.deshabilitar
            FROM contratos c 
            JOIN empleado e ON c.codigo = e.identificacion OR c.codigo = CONCAT(e.identificacion, '-1')
            WHERE c.deshabilitar != 3");

        foreach ($results as $result) {
            //Se valida que el empleado esté registrado
            $existingEmploye = Employe::where('dni', $result->identificacion)->first();
            
            if (!$existingEmploye) {
                $newEmploye = new Employe();
                $newEmploye->dni = $result->identificacion;
                $newEmploye->name = $result->nombre_completo;
                $newEmploye->work_position = 'Pendiente';
                $newEmploye->unit = 'Pendiente';
                $newEmploye->cost_center = 'Piso 1';
                
                $newEmploye->save();
            }
        }

        Flash::success('¡Empleados guardados exitosamente!');
        return redirect(route('employes.index'));
    }

}
