<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmsurgery_procedureAPIRequest;
use App\Http\Requests\API\Updatemsurgery_procedureAPIRequest;
use App\Models\msurgery_procedure;
use App\Repositories\msurgery_procedureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class msurgery_procedureController
 * @package App\Http\Controllers\API
 */

class msurgery_procedureAPIController extends AppBaseController
{
    /** @var  msurgery_procedureRepository */
    private $msurgeryProcedureRepository;

    public function __construct(msurgery_procedureRepository $msurgeryProcedureRepo)
    {
        $this->msurgeryProcedureRepository = $msurgeryProcedureRepo;
    }

    /**
     * Display a listing of the msurgery_procedure.
     * GET|HEAD /msurgeryProcedures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $msurgeryProcedures = $this->msurgeryProcedureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($msurgeryProcedures->toArray(), 'Msurgery Procedures retrieved successfully');
    }

    /**
     * Store a newly created msurgery_procedure in storage.
     * POST /msurgeryProcedures
     *
     * @param Createmsurgery_procedureAPIRequest $request
     *
     * @return Response
     */
    public function store(Createmsurgery_procedureAPIRequest $request)
    {
        $input = $request->all();

        $msurgeryProcedure = $this->msurgeryProcedureRepository->create($input);

        return $this->sendResponse($msurgeryProcedure->toArray(), 'Msurgery Procedure saved successfully');
    }

    /**
     * Display the specified msurgery_procedure.
     * GET|HEAD /msurgeryProcedures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var msurgery_procedure $msurgeryProcedure */
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            return $this->sendError('Msurgery Procedure not found');
        }

        return $this->sendResponse($msurgeryProcedure->toArray(), 'Msurgery Procedure retrieved successfully');
    }

    /**
     * Update the specified msurgery_procedure in storage.
     * PUT/PATCH /msurgeryProcedures/{id}
     *
     * @param int $id
     * @param Updatemsurgery_procedureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemsurgery_procedureAPIRequest $request)
    {
        $input = $request->all();

        /** @var msurgery_procedure $msurgeryProcedure */
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            return $this->sendError('Msurgery Procedure not found');
        }

        $msurgeryProcedure = $this->msurgeryProcedureRepository->update($input, $id);

        return $this->sendResponse($msurgeryProcedure->toArray(), 'msurgery_procedure updated successfully');
    }

    /**
     * Remove the specified msurgery_procedure from storage.
     * DELETE /msurgeryProcedures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var msurgery_procedure $msurgeryProcedure */
        $msurgeryProcedure = $this->msurgeryProcedureRepository->find($id);

        if (empty($msurgeryProcedure)) {
            return $this->sendError('Msurgery Procedure not found');
        }

        $msurgeryProcedure->delete();

        return $this->sendSuccess('Msurgery Procedure deleted successfully');
    }
}
