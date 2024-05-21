<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        \App\Models\Categories::factory(10)
        ->hasProductos(2)
        ->create();

        $role1= Role::create(['name' => 'admin']);
        $role2= Role::create(['name' => 'cliente']);

        Permission::create(['name' => 'dashboard'])->assignRole($role1);
        Permission::create(['name' => 'index'])->syncRoles([$role1, $role2]);

        \App\Models\User::factory()->create([
            'name' => 'prueba',
            'email' => 'i@app.com', // asegúrate de usar un email único
            'password' => Hash::make('password'), // hashear la contraseña
        ])->assignRole('admin');

        \App\Models\User::factory(9)->create();

    }
}
