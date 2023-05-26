<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'role_id' => 1, //Rol de Administrador
            'name' => 'Oscar Mauricio',
            'email' => 'mauricio2769@gmail.com',
            'telefono' => '5633943566',
            'password' => bcrypt('Hannibal2769'),
        ]);
        User::create([
            'role_id' => 2, //Rol de Mesa de ayuda
            'name' => 'Fulana Mesa',
            'email' => 'mesa@mail.com',
            'telefono' => '435345345',
            'password' => bcrypt('Mesa2769'),
        ]);
        User::create([
            'role_id' => 3, //Rol de Técnico
            'name' => 'Perengano tecnico',
            'email' => 'tecnico@mail.com',
            'telefono' => '3452323434',
            'password' => bcrypt('Tecnico2769'),
        ]);
        User::create([
            'role_id' => 4, //Rol de Cliente
            'client_id' => 1, //Se liga a la tabla de clientes
            'area' => 'Recursos Humanos', //Puede tener un área
            'name' => 'Juan Mecánico cliente',
            'email' => 'cliente@mail.com',
            'telefono' => 'ewrwerwerewr',
            'password' => bcrypt('Cliente2769'),
        ]);
    }
}
