<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use App\Models\Calendar;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceReportController extends Controller
{
    public function attendanceToday() {
        $attendances = Attendance::whereDate('workday', now())
        ->where('aentry_time', '<>', '00:00:00')
        ->orderBy('workday', 'DESC')
        ->orderBy('aentry_time', 'DESC')
        ->get();

        return view('attendanceReports.table', compact('attendances'));
    }

    public function getWorkingAndFinished()
    {
        $working = Attendance::whereDate('workday', now())
            ->whereNotNull('aentry_time')
            ->whereNull('adeparture_time')
            ->orderBy('workday', 'DESC')
            ->orderBy('aentry_time', 'DESC')
            ->get();

        $finished = Attendance::whereDate('workday', now())
            ->where('aentry_time', '<>', '00:00:00')
            ->where('adeparture_time', '<>', '00:00:00')
            ->get();

            return view('attendanceReports.working', compact('working'))
            ->with('finished', $finished);
    }

    public function getFinished()
    {
        $attendances = Attendance::whereDate('workday', now())
            ->where('aentry_time', '<>', '00:00:00')
            ->where('adeparture_time', '<>', '00:00:00')
            ->orderBy('workday', 'DESC')
            ->orderBy('adeparture_time', 'DESC')
            ->get();

        return view('attendanceReports.finished', compact('attendances'));
    }
}
