<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Employe;
use App\Models\Calendar;
use App\Models\Attendance;
use Illuminate\Http\Request;


class controlController extends AppBaseController
{
    public function index()
    {
        $employes = Employe::all();
        
        $resultados = Calendar::join('attendances', 'calendars.id_employe', '=', 'attendances.id_employe')
            ->select('calendars.*', 'attendances.entry_time')
            ->get();
            
        return view('control.index', compact('employes'))->with('resultados', $resultados);
    }
}
