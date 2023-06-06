<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::truncate();
        Service::create([
            'servicio' => 'Soluciones de uso común',
            'clase' => 'C',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Paquetería básica',
            'clase' => 'C',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Formateos simples',
            'clase' => 'B',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Respaldo de información',
            'clase' => 'B',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Personalización de equipos: empresas, corporativos, dominios',
            'clase' => 'B',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Paquetería especial',
            'clase' => 'A',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Soluciones nivel avanzado',
            'clase' => 'A',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Prevención de riesgos',
            'clase' => 'A',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Conservación de privacidad',
            'clase' => 'A',
            'abreviatura' => 'test',
            'description' => null
        ]);
        Service::create([
            'servicio' => 'Configuraciones/Conexiones',
            'clase' => 'A',
            'abreviatura' => 'Conf/Con',
            'description' => null
        ]);
    }
}
