<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
    {   /* Roles */
        $administrador = User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@cumi.com',
            'password' => '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $persona = User::factory()->create([
            'id' => 2,
            'name' => 'persona',
            'email' => 'persona@cumi.com',
            'password' => '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $usuario = User::factory(5)->create();

        $admin = Role::create([
            'id' => 1,
            'name' => 'administrador',
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
        $administrador->assignRole('administrador');
        
        $person->syncPermissions(Permission::where('name', 'like', "%person%")->get());
        $persona->assignRole('persona');
    }
}
