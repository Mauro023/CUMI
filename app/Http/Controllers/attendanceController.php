<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateattendanceRequest;
use App\Http\Requests\UpdateattendanceRequest;
use App\Repositories\attendanceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\employe;
use App\Models\calendar;

class attendanceController extends AppBaseController
{
    /** @var attendanceRepository $attendanceRepository*/
    private $attendanceRepository;

    public function __construct(attendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the attendance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $attendances = $this->attendanceRepository->all();

        return view('attendances.index')
            ->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new attendance.
     *
     * @return Response
     */
    public function create()
    {
        return view('attendances.create');
    }

    /**
     * Store a newly created attendance in storage.
     *
     * @param CreateattendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateattendanceRequest $request)
    {
        $input = $request->all();

        $attendance = $this->attendanceRepository->create($input);

        Flash::success('Attendance saved successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Display the specified attendance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified attendance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified attendance in storage.
     *
     * @param int $id
     * @param UpdateattendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateattendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $attendance = $this->attendanceRepository->update($request->all(), $id);

        Flash::success('Attendance updated successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified attendance from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $this->attendanceRepository->delete($id);

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }
}
