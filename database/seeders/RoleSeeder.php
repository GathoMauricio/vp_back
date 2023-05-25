<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'id' => 1,
            'name' => 'Administrador'
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Mesa de ayuda'
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Técnico'
        ]);
        Role::create([
            'id' => 4,
            'name' => 'Cliente'
        ]);
    }
}
