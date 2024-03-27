<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createmsurgery_procedureRequest;
use App\Http\Requests\Updatemsurgery_procedureRequest;
use App\Repositories\msurgery_procedureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\msurgery_procedure;

class msurgery_procedureController extends AppBaseController
{
    /** @var msurgery_procedureRepository $msurgeryProcedureRepository*/
    private $msurgeryProcedureRepository;

    public function __construct(msurgery_procedureRepository $msurgeryProcedureRepo)
    {
        $this->msurgeryProcedureRepository = $msurgeryProcedureRepo;
    }

    /**
     * Display a listing of the msurgery_procedure.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_surgeries');
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $msurgeryProceduresQuery = msurgery_procedure::query();

        if (!empty($search)) {
            $msurgeryProceduresQuery->where('cod_surgical_act', 'LIKE', '%' . $search . '%')
                    ->orWhere('code_procedure', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('procedures', function ($query) use ($search) {
                        $query->where('manual_type', 'LIKE', '%' . $search . '%');
                    });
        }

        $msurgeryProcedures = $msurgeryProceduresQuery->orderBy('cod_surgical_act')->paginate($perPage);

        return view('msurgery_procedures.index', compact('msurgeryProcedures'));
    }

    /**
     * Show the form for creating a new msurgery_procedure.
     *
     * @return Response
     */
    public function create()
    {
        return view('msurgery_procedures.create');
    }

    /**
     * Store a newly created msurgery_procedure in storage.
     *
     * @param Createmsurgery_procedureRequest $request
     *
     * @return Response
     */
    public function store(Createmsurgery_procedureRequest $request)
    {
        $input = $request->all();

        $msurgeryProcedure = $this->msurgeryProcedureRepository->create($input);

        Flash::success('Msurgery Procedure saved successfully.');

        return redirect(route('msurgeryProcedures.index'));
    }

    /**
     * Display the specified msurgery_procedure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            Flash::error('Msurgery Procedure not found');

            return redirect(route('msurgeryProcedures.index'));
        }

        return view('msurgery_procedures.show')->with('msurgeryProcedure', $msurgeryProcedure);
    }

    /**
     * Show the form for editing the specified msurgery_procedure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            Flash::error('Msurgery Procedure not found');

            return redirect(route('msurgeryProcedures.index'));
        }

        return view('msurgery_procedures.edit')->with('msurgeryProcedure', $msurgeryProcedure);
    }

    /**
     * Update the specified msurgery_procedure in storage.
     *
     * @param int $id
     * @param Updatemsurgery_procedureRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemsurgery_procedureRequest $request)
    {
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            Flash::error('Msurgery Procedure not found');

            return redirect(route('msurgeryProcedures.index'));
        }

        $msurgeryProcedure = $this->msurgeryProcedureRepository->update($request->all(), $id);

        Flash::success('Msurgery Procedure updated successfully.');

        return redirect(route('msurgeryProcedures.index'));
    }

    /**
     * Remove the specified msurgery_procedure from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            Flash::error('Msurgery Procedure not found');

            return redirect(route('msurgeryProcedures.index'));
        }

        $this->msurgeryProcedureRepository->delete($id);

        Flash::success('Msurgery Procedure deleted successfully.');

        return redirect(route('msurgeryProcedures.index'));
    }

}
