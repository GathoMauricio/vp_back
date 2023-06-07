<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceType;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceType::create(
            [
                'tipo' => 'Producto',
                'abrev' => 'PROD.',
            ]
        );
        ServiceType::create(
            [
                'tipo' => 'Soporte Precencial',
                'abrev' => 'SOP. PRES..',
            ]
        );
        ServiceType::create(
            [
                'tipo' => 'Soporte Remoto',
                'abrev' => 'SOP. REM..',
            ]
        );
        ServiceType::create(
            [
                'tipo' => 'Proyecto',
                'abrev' => 'PROY.',
            ]
        );
        ServiceType::create(
            [
                'tipo' => 'Otro',
                'abrev' => 'OTRO.',
            ]
        );
    }
}
