<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecalendarRequest;
use App\Http\Requests\UpdatecalendarRequest;
use App\Repositories\calendarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\employe;

class calendarController extends AppBaseController
{
    /** @var calendarRepository $calendarRepository*/
    private $calendarRepository;

    public function __construct(calendarRepository $calendarRepo)
    {
        $this->calendarRepository = $calendarRepo;
    }

    /**
     * Display a listing of the calendar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $calendars = $this->calendarRepository->all();

        return view('calendars.index')
            ->with('calendars', $calendars);
    }

    /**
     * Show the form for creating a new calendar.
     *
     * @return Response
     */
    public function create()
    {
        $employes = Employe::pluck('name', 'id');
        return view('calendars.create', compact('employes'));
    }

    /**
     * Store a newly created calendar in storage.
     *
     * @param CreatecalendarRequest $request
     *
     * @return Response
     */
    public function store(CreatecalendarRequest $request)
    {
        $input = $request->all();

        $calendar = $this->calendarRepository->create($input);

        Flash::success('Calendar saved successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Display the specified calendar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $calendar = $this->calendarRepository->find($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.show')->with('calendar', $calendar);
    }

    /**
     * Show the form for editing the specified calendar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $calendar = $this->calendarRepository->find($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.edit')->with('calendar', $calendar);
    }

    /**
     * Update the specified calendar in storage.
     *
     * @param int $id
     * @param UpdatecalendarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecalendarRequest $request)
    {
        $calendar = $this->calendarRepository->find($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $calendar = $this->calendarRepository->update($request->all(), $id);

        Flash::success('Calendar updated successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Remove the specified calendar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $calendar = $this->calendarRepository->find($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $this->calendarRepository->delete($id);

        Flash::success('Calendar deleted successfully.');

        return redirect(route('calendars.index'));
    }
}
