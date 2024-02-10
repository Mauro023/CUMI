<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createlog_operation_costRequest;
use App\Http\Requests\Updatelog_operation_costRequest;
use App\Repositories\log_operation_costRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class log_operation_costController extends AppBaseController
{
    /** @var log_operation_costRepository $logOperationCostRepository*/
    private $logOperationCostRepository;

    public function __construct(log_operation_costRepository $logOperationCostRepo)
    {
        $this->logOperationCostRepository = $logOperationCostRepo;
    }

    /**
     * Display a listing of the log_operation_cost.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $logOperationCosts = $this->logOperationCostRepository->all();

        return view('log_operation_costs.index')
            ->with('logOperationCosts', $logOperationCosts);
    }

    /**
     * Show the form for creating a new log_operation_cost.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_operation_costs.create');
    }

    /**
     * Store a newly created log_operation_cost in storage.
     *
     * @param Createlog_operation_costRequest $request
     *
     * @return Response
     */
    public function store(Createlog_operation_costRequest $request)
    {
        $input = $request->all();

        $logOperationCost = $this->logOperationCostRepository->create($input);

        Flash::success('Log Operation Cost saved successfully.');

        return redirect(route('logOperationCosts.index'));
    }

    /**
     * Display the specified log_operation_cost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logOperationCost = $this->logOperationCostRepository->find($id);

        if (empty($logOperationCost)) {
            Flash::error('Log Operation Cost not found');

            return redirect(route('logOperationCosts.index'));
        }

        return view('log_operation_costs.show')->with('logOperationCost', $logOperationCost);
    }

    /**
     * Show the form for editing the specified log_operation_cost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logOperationCost = $this->logOperationCostRepository->find($id);

        if (empty($logOperationCost)) {
            Flash::error('Log Operation Cost not found');

            return redirect(route('logOperationCosts.index'));
        }

        return view('log_operation_costs.edit')->with('logOperationCost', $logOperationCost);
    }

    /**
     * Update the specified log_operation_cost in storage.
     *
     * @param int $id
     * @param Updatelog_operation_costRequest $request
     *
     * @return Response
     */
    public function update($id, Updatelog_operation_costRequest $request)
    {
        $logOperationCost = $this->logOperationCostRepository->find($id);

        if (empty($logOperationCost)) {
            Flash::error('Log Operation Cost not found');

            return redirect(route('logOperationCosts.index'));
        }

        $logOperationCost = $this->logOperationCostRepository->update($request->all(), $id);

        Flash::success('Log Operation Cost updated successfully.');

        return redirect(route('logOperationCosts.index'));
    }

    /**
     * Remove the specified log_operation_cost from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logOperationCost = $this->logOperationCostRepository->find($id);

        if (empty($logOperationCost)) {
            Flash::error('Log Operation Cost not found');

            return redirect(route('logOperationCosts.index'));
        }

        $this->logOperationCostRepository->delete($id);

        Flash::success('Log Operation Cost deleted successfully.');

        return redirect(route('logOperationCosts.index'));
    }
}
