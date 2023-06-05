<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecontractsRequest;
use App\Http\Requests\UpdatecontractsRequest;
use App\Repositories\contractsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\employe;

class contractsController extends AppBaseController
{
    /** @var contractsRepository $contractsRepository*/
    private $contractsRepository;

    public function __construct(contractsRepository $contractsRepo)
    {
        $this->contractsRepository = $contractsRepo;
    }

    /**
     * Display a listing of the contracts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contracts = $this->contractsRepository->all();

        return view('contracts.index')
            ->with('contracts', $contracts);
    }

    /**
     * Show the form for creating a new contracts.
     *
     * @return Response
     */
    public function create()
    {
        $employes = Employe::orderby('name')->pluck('name', 'id');
        return view('contracts.create', compact('employes'));
    }

    /**
     * Store a newly created contracts in storage.
     *
     * @param CreatecontractsRequest $request
     *
     * @return Response
     */
    public function store(CreatecontractsRequest $request)
    {
        $input = $request->all();

        $contracts = $this->contractsRepository->create($input);

        Flash::success('Contracts saved successfully.');

        return redirect(route('contracts.index'));
    }

    /**
     * Display the specified contracts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contracts = $this->contractsRepository->find($id);

        if (empty($contracts)) {
            Flash::error('Contracts not found');

            return redirect(route('contracts.index'));
        }

        return view('contracts.show')->with('contracts', $contracts);
    }

    /**
     * Show the form for editing the specified contracts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contracts = $this->contractsRepository->find($id);

        if (empty($contracts)) {
            Flash::error('Contracts not found');

            return redirect(route('contracts.index'));
        }

        return view('contracts.edit')->with('contracts', $contracts);
    }

    /**
     * Update the specified contracts in storage.
     *
     * @param int $id
     * @param UpdatecontractsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontractsRequest $request)
    {
        $contracts = $this->contractsRepository->find($id);

        if (empty($contracts)) {
            Flash::error('Contracts not found');

            return redirect(route('contracts.index'));
        }

        $contracts = $this->contractsRepository->update($request->all(), $id);

        Flash::success('Contracts updated successfully.');

        return redirect(route('contracts.index'));
    }

    /**
     * Remove the specified contracts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contracts = $this->contractsRepository->find($id);

        if (empty($contracts)) {
            Flash::error('Contracts not found');

            return redirect(route('contracts.index'));
        }

        $this->contractsRepository->delete($id);

        Flash::success('Contracts deleted successfully.');

        return redirect(route('contracts.index'));
    }
}
