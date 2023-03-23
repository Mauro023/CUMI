<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use App\Models\Calendar;
use App\Models\Attendance;
use Illuminate\Http\Request;


class controlController extends AppBaseController
{
    public function index()
    {
        $employes = Employe::all();
        $calendars = Calendar::all();
        $attendances = Attendance::all();

        $resultados = DB::table('calendars')
            ->join('attendances', 'calendars.employe_id', '=', 'attendances.employe_id')
            ->join('employes', 'employes.id', '=', 'attendances.employe_id')
            ->select('*')
            ->whereRaw('attendances.workday BETWEEN calendars.start_date AND calendars.end_date')
            ->get();

        return view('control.index', compact('resultados'));
    }
}
