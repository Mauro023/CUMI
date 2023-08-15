<?php

namespace App\Exports;
use App\Models\Employe;
use App\Models\Contracts;
use App\Exports\EmployeExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $threeMonthsAgo = now()->subMonths(3);
        return Employe::select('dni', 'name', 'work_position', 'cost_center')
                ->join('contracts', 'contracts.employe_id', '=', 'employes.id')
                ->where('unit', '!=', 'Deshabilitado')
                ->where('salary', '<', 2320000)
                ->where('start_date_contract', '<=', $threeMonthsAgo)
                ->orderBy('employes.name')
            ->get();
    }

    public function headings(): array
    {
        return [
            'DNI',
            'NOMBRE',
            'PUESTO DE TRABAJO',
            'CENTRO DE COSTO'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'italic' => true]],
        ];
    }
}
