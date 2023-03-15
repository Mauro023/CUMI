<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\employe;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $administrador = User::factory()->create([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@cumi.com',
            'password' => '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $persona = User::factory()->create([
            'id' => 2,
            'name' => 'Persona',
            'email' => 'persona@cumi.com',
            'password' => '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $usuario = User::factory(100)->create();
        $empleados = employe::factory(20)->create();

        $admin = Role::create([
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        $person = Role::create([
            'id' => 2,
            'name' => 'persona',
            'guard_name' => 'web',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        //CRUD

        $permissions = [
            'create',
            'read',
            'update',
        ];

        foreach (Role::all() as $rol) {
            foreach ($permissions as $p) {
                Permission::create(['name' => "{$rol->name} $p"]);
            }
        }

        $admin->syncPermissions(Permission::all());
        $administrador->assignRole('admin');
        
        $person->syncPermissions(Permission::where('name', 'like', "%persona%")->get());
        $persona->assignRole('persona');
    }
}
