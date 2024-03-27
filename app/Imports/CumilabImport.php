<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\cumiLab_rate;
use App\Models\procedures;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CumilabImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        
        $validateArray = array_map(function ($value) {
            return ($value === "") ? null : $value;
        }, $row);
        //dd($row);
        //Log::info($row);
        //Procedimiento correspondiente
        $procedures = Procedures::where('code', (string) $row['cups'])->first();
        if (!$procedures) {
            $procedures = Procedures::where('cups', (string) $row['cups'])->first();
            if (!$procedures) {
                $procedures = Procedures::where('cups', '0')->first();
            }
        }
        //dd($procedures);
        $existing_rate = CumiLab_rate::where('cups', (string) $row['cups'])->first();

        if ($existing_rate) {
            $existing_rate->update([
                'period' => $row['periodo'],
                'january' => $row['enero'],
                'february' => $row['febrero'],
                'march' => $row['marzo'],
                'april' => $row['abril'],
                'may' => $row['mayo'],
                'june' => $row['junio'],
                'july' => $row['julio'],
                'august' => $row['agosto'],
                'september' => $row['septiembre'],
                'october' => $row['octubre'],
                'november' => $row['noviembre'],
                'december' => $row['diciembre'],
                'cumilab_rate' => $row['tarifa_cumilab'],
                'mutual_rate' => $row['tarifa_mutual'],
                'cups' => $procedures->code
            ]);
            
            return $existing_rate;
        }else {
            //Log::info("Registrado");
            return new CumiLab_rate([
                'period' => $row['periodo'],
                'january' => $row['enero'],
                'february' => $row['febrero'],
                'march' => $row['marzo'],
                'april' => $row['abril'],
                'may' => $row['mayo'],
                'june' => $row['junio'],
                'july' => $row['julio'],
                'august' => $row['agosto'],
                'september' => $row['septiembre'],
                'october' => $row['octubre'],
                'november' => $row['noviembre'],
                'december' => $row['diciembre'],
                'cumilab_rate' => $row['tarifa_cumilab'],
                'mutual_rate' => $row['tarifa_mutual'],
                'cups' => $procedures->code
            ]);
        }
    }
}

