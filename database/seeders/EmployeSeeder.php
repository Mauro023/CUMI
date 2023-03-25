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
            'dni' => 13213164,
            'name' => 'Pedro Leon',
            'work_position' => 'Coordinador de sistemas',
            'unit' => 'Administrativo',
            'cost_center' => 'Piso 2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 2,
            'dni' => 654567,
            'name' => 'Julio Alvarez',
            'work_position' => 'Auxiliar de sistemas',
            'unit' => 'Administrativo',
            'cost_center' => 'Piso 2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 3,
            'dni' => 647321,
            'name' => 'Mauricio Camargo',
            'work_position' => 'Ingeniero de soporte',
            'unit' => 'Administrativo',
            'cost_center' => 'Piso 2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 4,
            'dni' => 789789,
            'name' => 'Sandra Padilla',
            'work_position' => 'Contadora',
            'unit' => 'Administrativo',
            'cost_center' => 'Piso 2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        employe::factory()->create([
            'id' => 5,
            'dni' => 6547889,
            'name' => 'Marisol Garcia',
            'work_position' => 'Abogada',
            'unit' => 'Administrativo',
            'cost_center' => 'Piso 2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
