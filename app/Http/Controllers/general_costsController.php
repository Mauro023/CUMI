<?php

namespace App\Http\Controllers;

use App\Http\Requests\Creategeneral_costsRequest;
use App\Http\Requests\Updategeneral_costsRequest;
use App\Repositories\general_costsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class general_costsController extends AppBaseController
{
    /** @var general_costsRepository $generalCostsRepository*/
    private $generalCostsRepository;

    public function __construct(general_costsRepository $generalCostsRepo)
    {
        $this->generalCostsRepository = $generalCostsRepo;
    }

    /**
     * Display a listing of the general_costs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generalCosts = $this->generalCostsRepository->all();

        return view('general_costs.index')
            ->with('generalCosts', $generalCosts);
    }

    /**
     * Show the form for creating a new general_costs.
     *
     * @return Response
     */
    public function create()
    {
        return view('general_costs.create');
    }

    /**
     * Store a newly created general_costs in storage.
     *
     * @param Creategeneral_costsRequest $request
     *
     * @return Response
     */
    public function store(Creategeneral_costsRequest $request)
    {
        $input = $request->all();

        $generalCosts = $this->generalCostsRepository->create($input);

        Flash::success('General Costs saved successfully.');

        return redirect(route('generalCosts.index'));
    }

    /**
     * Display the specified general_costs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $generalCosts = $this->generalCostsRepository->find($id);

        if (empty($generalCosts)) {
            Flash::error('General Costs not found');

            return redirect(route('generalCosts.index'));
        }

        return view('general_costs.show')->with('generalCosts', $generalCosts);
    }

    /**
     * Show the form for editing the specified general_costs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generalCosts = $this->generalCostsRepository->find($id);

        if (empty($generalCosts)) {
            Flash::error('General Costs not found');

            return redirect(route('generalCosts.index'));
        }

        return view('general_costs.edit')->with('generalCosts', $generalCosts);
    }

    /**
     * Update the specified general_costs in storage.
     *
     * @param int $id
     * @param Updategeneral_costsRequest $request
     *
     * @return Response
     */
    public function update($id, Updategeneral_costsRequest $request)
    {
        $generalCosts = $this->generalCostsRepository->find($id);

        if (empty($generalCosts)) {
            Flash::error('General Costs not found');

            return redirect(route('generalCosts.index'));
        }

        $generalCosts = $this->generalCostsRepository->update($request->all(), $id);

        Flash::success('General Costs updated successfully.');

        return redirect(route('generalCosts.index'));
    }

    /**
     * Remove the specified general_costs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generalCosts = $this->generalCostsRepository->find($id);

        if (empty($generalCosts)) {
            Flash::error('General Costs not found');

            return redirect(route('generalCosts.index'));
        }

        $this->generalCostsRepository->delete($id);

        Flash::success('General Costs deleted successfully.');

        return redirect(route('generalCosts.index'));
    }
}
