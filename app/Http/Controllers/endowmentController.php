<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateendowmentRequest;
use App\Http\Requests\UpdateendowmentRequest;
use App\Repositories\endowmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Contracts;

class endowmentController extends AppBaseController
{
    /** @var endowmentRepository $endowmentRepository*/
    private $endowmentRepository;

    public function __construct(endowmentRepository $endowmentRepo)
    {
        $this->endowmentRepository = $endowmentRepo;
    }

    /**
     * Display a listing of the endowment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $endowments = $this->endowmentRepository->all();

        return view('endowments.index')
            ->with('endowments', $endowments);
    }

    /**
     * Show the form for creating a new endowment.
     *
     * @return Response
     */
    public function create()
    {
        $contracts = Contracts::with('employe')->get();
        
        return view('endowments.create', compact('contracts'));
    }

    /**
     * Store a newly created endowment in storage.
     *
     * @param CreateendowmentRequest $request
     *
     * @return Response
     */
    public function store(CreateendowmentRequest $request)
    {
        $input = $request->all();

        $endowment = $this->endowmentRepository->create($input);

        Flash::success('Endowment saved successfully.');

        return redirect(route('endowments.index'));
    }

    /**
     * Display the specified endowment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        return view('endowments.show')->with('endowment', $endowment);
    }

    /**
     * Show the form for editing the specified endowment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        return view('endowments.edit')->with('endowment', $endowment);
    }

    /**
     * Update the specified endowment in storage.
     *
     * @param int $id
     * @param UpdateendowmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateendowmentRequest $request)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $endowment = $this->endowmentRepository->update($request->all(), $id);

        Flash::success('Endowment updated successfully.');

        return redirect(route('endowments.index'));
    }

    /**
     * Remove the specified endowment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $endowment = $this->endowmentRepository->find($id);

        if (empty($endowment)) {
            Flash::error('Endowment not found');

            return redirect(route('endowments.index'));
        }

        $this->endowmentRepository->delete($id);

        Flash::success('Endowment deleted successfully.');

        return redirect(route('endowments.index'));
    }
}
