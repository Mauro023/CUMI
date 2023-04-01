<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Calendar;

class TestTask2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verificacion de asistencia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $calendars = Calendar::whereDate('start_date', '<=', $today)
                                ->whereDate('end_date', '>=', $today)
                                ->get();

        foreach ($calendars as $calendar) {
            $attendances = Attendance::whereNull('workday')
                                        ->whereIn('employe_id', $calendar->employes->pluck('id'))
                                        ->get();

            $horaActual = Carbon::now();
            if ($horaActual->hour === 12 && $horaActual->minute === 22) {
                foreach ($attendances as $attendance) {
                    $attendance->update(['aentry_time' => 'NA', 'adeparture_time' => 'NA']);
                    Log::info('Attendance updated: ' . $attendance->id);
                }

                $absentEmployees = Employee::whereNotIn('id', $calendar->employes->pluck('id'))
                                            ->where('active', true)
                                            ->get();

                foreach ($absentEmployees as $absentEmployee) {
                    Attendance::create([
                        'employe_id' => $absentEmployee->id,
                        'workday' => $today,
                        'aentry_time' => 'NA',
                        'adeparture_time' => 'NA'
                    ]);
                    Log::info('Attendance created for absent employee: ' . $absentEmployee->id);
                }
            }
        }
    }
}
