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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;

    private $period;

    public function __construct($period)
    {
        $this->period = $period;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $threeMonthsAgo = now()->subMonths(3);

        $endowment = DB::select("
            SELECT e.id, e.name, e.work_position, e.cost_center
            FROM employes e
            LEFT JOIN contracts c ON e.id = c.employe_id
            WHERE e.id NOT IN (
                SELECT e.id
                FROM employes e
                LEFT JOIN contracts c ON e.id = c.employe_id
                LEFT JOIN endowments en ON c.id = en.contract_id
                WHERE en.period = ?
            )
        ", [$this->period]);
        return new Collection($endowment);
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
