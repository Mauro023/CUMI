<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatecalendarRequest;
use App\Http\Requests\UpdatecalendarRequest;
use App\Repositories\calendarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\employe;
use App\Models\calendar;

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
        $this->authorize('view_calendars');
        $calendars = calendar::orderBy('created_at', 'DESC')->paginate(50);

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
        $this->authorize('create_calendars');
        $employes = Employe::orderby('name')->pluck('name', 'id');
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
        $this->authorize('create_calendars');
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
        $this->authorize('show_calendars');
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
        $this->authorize('update_calendars');
        $calendar = $this->calendarRepository->find($id);
        $employes = Employe::pluck('name', 'id');

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.edit', compact('employes'))->with('calendar', $calendar);
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
        $this->authorize('update_calendars');
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
        $this->authorize('destroy_employes');
        $calendar = $this->calendarRepository->find($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $this->calendarRepository->delete($id);

        Flash::success('Calendar deleted successfully.');

        return redirect(route('calendars.index'));
    }

    public function filter(Request $request)
    {
        $query = Calendar::query();
        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));
        // Búsqueda por nombre de empleado
        if ($request->filled('name')) {
            $query->join('employes', 'calendars.employe_id', '=', 'employes.id')
                ->where('employes.name', 'LIKE', '%'.$request->input('name').'%');
        }

        // Búsqueda por fecha
        $query->whereDate('start_date', [$start_date->startOfDay(), $end_date->endOfDay()]);
        
        $calendars = $query->orderBy('start_date', 'desc')->paginate(100);

        return view('calendars.index')->with('calendars', $calendars);
    }
}
