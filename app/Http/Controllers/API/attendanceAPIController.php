<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateattendanceAPIRequest;
use App\Http\Requests\API\UpdateattendanceAPIRequest;
use App\Models\attendance;
use App\Repositories\attendanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class attendanceController
 * @package App\Http\Controllers\API
 */

class attendanceAPIController extends AppBaseController
{
    /** @var  attendanceRepository */
    private $attendanceRepository;

    public function __construct(attendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the attendance.
     * GET|HEAD /attendances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $attendances = $this->attendanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($attendances->toArray(), 'Attendances retrieved successfully');
    }

    /**
     * Store a newly created attendance in storage.
     * POST /attendances
     *
     * @param CreateattendanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateattendanceAPIRequest $request)
    {
        $input = $request->all();

        $attendance = $this->attendanceRepository->create($input);

        return $this->sendResponse($attendance->toArray(), 'Attendance saved successfully');
    }

    /**
     * Display the specified attendance.
     * GET|HEAD /attendances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var attendance $attendance */
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        return $this->sendResponse($attendance->toArray(), 'Attendance retrieved successfully');
    }

    /**
     * Update the specified attendance in storage.
     * PUT/PATCH /attendances/{id}
     *
     * @param int $id
     * @param UpdateattendanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateattendanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var attendance $attendance */
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        $attendance = $this->attendanceRepository->update($input, $id);

        return $this->sendResponse($attendance->toArray(), 'attendance updated successfully');
    }

    /**
     * Remove the specified attendance from storage.
     * DELETE /attendances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var attendance $attendance */
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        $attendance->delete();

        return $this->sendSuccess('Attendance deleted successfully');
    }
}
