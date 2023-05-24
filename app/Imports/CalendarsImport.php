<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Calendar;
use Carbon\Carbon;

class CalendarsImport implements ToModel
{
    public function model(array $row)
    {
        // Formatear la fecha de inicio con la zona horaria
        $startDate = Carbon::createFromDate(1900, 1, 1)->addDays($row[0] - 2)->format('Y-m-d');

        // Formatear la fecha de fin con la zona horaria
        $endDate = Carbon::createFromDate(1900, 1, 1)->addDays($row[1] - 2)->format('Y-m-d');

        //Transformar hora de entrada
        $entry_horas = (int)($row[2] * 24);
        $entry_minutos = (int)(($row[2] * 24 * 60) % 60);
        $entry_segundos = (int)(($row[2] * 24 * 60 * 60) % 60);
        $entry_time = Carbon::createFromTime($entry_horas, $entry_minutos, $entry_segundos)->format('H:i:s');

        //Transformar hora de salida
        $depar_horas = (int)($row[3] * 24);
        $depar_minutos = (int)(($row[3] * 24 * 60) % 60);
        $depar_segundos = (int)(($row[3] * 24 * 60 * 60) % 60);
        $depar_time = Carbon::createFromTime($depar_horas, $depar_minutos, $depar_segundos)->format('H:i:s');

        return new Calendar([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'entry_time' => $entry_time,
            'departure_time' => $depar_time,
            'floor' => $row[4],
            'employe_id' => $row[5],
        ]);
    }
}

