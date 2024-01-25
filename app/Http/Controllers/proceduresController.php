<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproceduresRequest;
use App\Http\Requests\UpdateproceduresRequest;
use App\Repositories\proceduresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Procedures;
use Flash;
use Response;

class proceduresController extends AppBaseController
{
    /** @var proceduresRepository $proceduresRepository*/
    private $proceduresRepository;

    public function __construct(proceduresRepository $proceduresRepo)
    {
        $this->proceduresRepository = $proceduresRepo;
    }

    /**
     * Display a listing of the procedures.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $proceduresQuery = Procedures::query();

        if (!empty($search)) {
            $proceduresQuery->where('code', 'LIKE', '%' . $search . '%')
                    ->orWhere('manual_type', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('cups', 'LIKE', '%' . $search . '%')
                    ->orWhere('rips', 'LIKE', '%' . $search . '%')
                    ->orWhere('uvr', 'LIKE', '%' . $search . '%')
                    ->orWhere('uvt', 'LIKE', '%' . $search . '%');
        }

        $procedures = $proceduresQuery->paginate($perPage);

        return view('procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new procedures.
     *
     * @return Response
     */
    public function create()
    {
        return view('procedures.create');
    }

    /**
     * Store a newly created procedures in storage.
     *
     * @param CreateproceduresRequest $request
     *
     * @return Response
     */
    public function store(CreateproceduresRequest $request)
    {
        $input = $request->all();

        $procedures = $this->proceduresRepository->create($input);

        Flash::success('Procedures saved successfully.');

        return redirect(route('procedures.index'));
    }

    /**
     * Display the specified procedures.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $procedures = $this->proceduresRepository->find($id);

        if (empty($procedures)) {
            Flash::error('Procedures not found');

            return redirect(route('procedures.index'));
        }

        return view('procedures.show')->with('procedures', $procedures);
    }

    /**
     * Show the form for editing the specified procedures.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $procedures = $this->proceduresRepository->find($id);

        if (empty($procedures)) {
            Flash::error('Procedures not found');

            return redirect(route('procedures.index'));
        }

        return view('procedures.edit')->with('procedures', $procedures);
    }

    /**
     * Update the specified procedures in storage.
     *
     * @param int $id
     * @param UpdateproceduresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproceduresRequest $request)
    {
        $procedures = $this->proceduresRepository->find($id);

        if (empty($procedures)) {
            Flash::error('Procedures not found');

            return redirect(route('procedures.index'));
        }

        $procedures = $this->proceduresRepository->update($request->all(), $id);

        Flash::success('Procedures updated successfully.');

        return redirect(route('procedures.index'));
    }

    /**
     * Remove the specified procedures from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $procedures = $this->proceduresRepository->find($id);

        if (empty($procedures)) {
            Flash::error('Procedures not found');

            return redirect(route('procedures.index'));
        }

        $this->proceduresRepository->delete($id);

        Flash::success('Procedures deleted successfully.');

        return redirect(route('procedures.index'));
    }

    public function getProcedures()
    {

        // Establecer un límite de tiempo de ejecución más largo (por ejemplo, 300 segundos)
        ini_set('max_execution_time', 300);
        $results = DB::connection('SismaSalud')->select("SELECT codigo, tipo, cups, nombreve, rips, uvr, factoruvt 
            FROM sis_proc 
            WHERE Activo = 1 
            AND tipo != '312' 
            AND tipo != 'INTS'");
        //dd($results);
        $totalProcedures = count($results);
        foreach ($results as $index => $result) {
            //Se valida que el procedimiento esté registrado
            $existingProcedures = Procedures::where('code', $result->codigo)
            ->where('manual_type', $result->tipo)->first();
            $uvr = $result->uvr;
            $uvt = $result->factoruvt;
            if ($uvr === NULL) {$uvr = 0;}
            if ($uvt === NULL) {$uvt = 0;}
            if ($existingProcedures) {              
                // Actualiza los datos del procedimiento         
                $existingProcedures->code = $result->codigo;
                $existingProcedures->manual_type = $result->tipo;
                $existingProcedures->description = $result->nombreve;
                $existingProcedures->cups = $result->cups;
                $existingProcedures->rips = $result->rips;
                $existingProcedures->uvr = $uvr;
                $existingProcedures->uvt = $uvt;
                    
                $existingProcedures->save();
            }else {
                $newProcedures = new Procedures();
                $newProcedures->code = $result->codigo;
                $newProcedures->manual_type = $result->tipo;
                $newProcedures->description = $result->nombreve;
                $newProcedures->cups = $result->cups;
                $newProcedures->rips = $result->rips;
                $newProcedures->uvr = $uvr;
                $newProcedures->uvt = $uvt;
                $newProcedures->save();
            }
            $progress = ($index + 1) / $totalProcedures * 100;
            session(['progress' => $progress]);
        }
        // Restaurar el límite de tiempo de ejecución predeterminado (opcional)
        ini_set('max_execution_time', 60);
        session()->flash('success', "¡¡Procedimientos actualizados correctamente!!");

        return redirect(route('procedures.index'));
    }
}
