<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clase;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clase::truncate();

        Clase::create([
            'tipo' => 'C1',
            'tiempo_de' => '00:00:00',
            'tiempo_hasta' => '00:30:00',
            'precio' => '185',
        ]);
        Clase::create([
            'tipo' => 'C2',
            'tiempo_de' => '00:31:00',
            'tiempo_hasta' => '00:45:00',
            'precio' => '270',
        ]);
        Clase::create([
            'tipo' => 'C3',
            'tiempo_de' => '00:46:00',
            'tiempo_hasta' => '01:20:00',
            'precio' => '320',
        ]);

        Clase::create([
            'tipo' => 'B1',
            'tiempo_de' => '01:21:00',
            'tiempo_hasta' => '01:45:00',
            'precio' => '380',
        ]);
        Clase::create([
            'tipo' => 'B2',
            'tiempo_de' => '01:46:00',
            'tiempo_hasta' => '02:00:00',
            'precio' => '450',
        ]);
        Clase::create([
            'tipo' => 'B3',
            'tiempo_de' => '02:01:00',
            'tiempo_hasta' => '02:45:00',
            'precio' => '530',
        ]);

        Clase::create([
            'tipo' => 'C1',
            'tiempo_de' => '02:46:00',
            'tiempo_hasta' => '03:00:00',
            'precio' => '590',
        ]);
        Clase::create([
            'tipo' => 'C2',
            'tiempo_de' => '03:01:00',
            'tiempo_hasta' => '04:00:00',
            'precio' => '750',
        ]);
        Clase::create([
            'tipo' => 'C3',
            'tiempo_de' => '04:01:00',
            'tiempo_hasta' => null,
            'precio' => null,
        ]);
    }
}
