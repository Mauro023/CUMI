<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\employe;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        employe::factory()->create([
            'id' => 1,
            'employe_id' => 13213164,
            'name' => 'Pedro Leon',
            'work_position' => 'Coordinador de sistemas',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 2,
            'employe_id' => 654567,
            'name' => 'Julio Alvarez',
            'work_position' => 'Auxiliar de sistemas',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 3,
            'employe_id' => 647321,
            'name' => 'Mauricio Camargo',
            'work_position' => 'Ingeniero de soporte',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 4,
            'employe_id' => 789789,
            'name' => 'Sandra Padilla',
            'work_position' => 'Contadora',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 5,
            'employe_id' => 6547889,
            'name' => 'Marisol Garcia',
            'work_position' => 'Abogada',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
