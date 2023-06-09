<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Repositories\MedicineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MedicineController extends AppBaseController
{
    /** @var MedicineRepository $medicineRepository*/
    private $medicineRepository;

    public function __construct(MedicineRepository $medicineRepo)
    {
        $this->medicineRepository = $medicineRepo;
    }

    /**
     * Display a listing of the Medicine.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_medicines');
        $medicines = $this->medicineRepository->all();

        return view('medicines.index')
            ->with('medicines', $medicines);
    }

    /**
     * Show the form for creating a new Medicine.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_medicines');
        return view('medicines.create');
    }

    /**
     * Store a newly created Medicine in storage.
     *
     * @param CreateMedicineRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicineRequest $request)
    {
        $this->authorize('create_medicines');
        $input = $request->all();

        $medicine = $this->medicineRepository->create($input);

        Flash::success('Medicine saved successfully.');

        return redirect(route('medicines.index'));
    }

    /**
     * Display the specified Medicine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('show_medicines');
        $medicine = $this->medicineRepository->find($id);

        if (empty($medicine)) {
            Flash::error('Medicine not found');

            return redirect(route('medicines.index'));
        }

        return view('medicines.show')->with('medicine', $medicine);
    }

    /**
     * Show the form for editing the specified Medicine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update_medicines');
        $medicine = $this->medicineRepository->find($id);

        if (empty($medicine)) {
            Flash::error('Medicine not found');

            return redirect(route('medicines.index'));
        }

        return view('medicines.edit')->with('medicine', $medicine);
    }

    /**
     * Update the specified Medicine in storage.
     *
     * @param int $id
     * @param UpdateMedicineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicineRequest $request)
    {
        $this->authorize('update_medicines');
        $medicine = $this->medicineRepository->find($id);

        if (empty($medicine)) {
            Flash::error('Medicine not found');

            return redirect(route('medicines.index'));
        }

        $medicine = $this->medicineRepository->update($request->all(), $id);

        Flash::success('Medicine updated successfully.');

        return redirect(route('medicines.index'));
    }

    /**
     * Remove the specified Medicine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy_medicines');
        $medicine = $this->medicineRepository->find($id);

        if (empty($medicine)) {
            Flash::error('Medicine not found');

            return redirect(route('medicines.index'));
        }

        $this->medicineRepository->delete($id);

        Flash::success('Medicine deleted successfully.');

        return redirect(route('medicines.index'));
    }
}
