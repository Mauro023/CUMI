<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Calendar;
use App\Models\Diferential_rates;
use App\Models\Doctors;
use App\Models\Medical_fees;
use App\Models\Procedures;
use Carbon\Carbon;

class CalendarsImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $doctor = Doctors::where('full_name', $row['medico'])->first();
        $fixed_amount = ($row['monto_fijo'] === 'SI') ? 1 : 0;
        $payment_availability = ($row['pago_x_disponibilidad'] === 'SI') ? 1 : 0;

        // Validación del procedimiento
        //Datos del médico
        $doctor = Doctors::where('code', $doctor->code)->first();
        //dd($doctor->code);
        //Datos de los honorarios médicos
        $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
        if ($fees == null) {
            return null;
        }
        //Procedimiento correspondiente
        $procedures = Procedures::where('code', $row['cups'])
            ->where('manual_type', $fees->fees_type)->first();
    
        return new Diferential_rates([
            'fixed_amount' => $fixed_amount,
            'payment_availability' => $payment_availability,
            'value1' => (float) str_replace([' ', '.'], '', $row['valor_1esp']),
            'value2' => (float) str_replace([' ', '.'], '', $row['valor_2esp']),
            'observation_rates' => $row['observacion'],
            'id_procedure' => $procedures->id,
            'id_doctor' => $doctor->code
        ]);
    }
}

