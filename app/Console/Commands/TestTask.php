<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use App\Models\Attendance;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update automatico de adeparture_time';

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
        $attendances = attendance::where('workday', '2023-03-27')
                ->whereNull('adeparture_time')
                ->where(function($query) {
                    $query->whereTime('aentry_time', '>=', '07:45:00');
                })
                ->get();

        foreach ($attendances as $attendance) {
            $horaEntrada = Carbon::parse($attendance->aentry_time);
            $horaActual = now();
            if ($horaActual->greaterThanOrEqualTo(Carbon::parse('10:45:00'))) {
                $attendance->update(['adeparture_time' => 'NA']);
                $attendance->save();
            }
        }
    }

}
