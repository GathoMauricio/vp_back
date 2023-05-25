<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();

        Client::create([
            'razon_social' => 'DYC (SERVICIOS LOGISTICOS DYC)',
            'telefono' => '4578451265',
            'direccion' => 'lOREM JDFHF DJDHYGS, FFUYED',
        ]);
        Client::create([
            'razon_social' => 'RCI (RECUPERACION DE CARTERA INMEDIATA)',
            'telefono' => '7845451265',
            'direccion' => 'FGDF DFG DFG GS, FFUYED',
        ]);
        Client::create([
            'razon_social' => 'SQL (SQUA LOGISTICS)',
            'telefono' => '656451265',
            'direccion' => 'ETERRET YGHGJHGJ RETYRET',
        ]);
        Client::create([
            'razon_social' => 'TABAMEX',
            'telefono' => '4353451265',
            'direccion' => 'TRYRTY FDG DFG, FFUYED',
        ]);
        Client::create([
            'razon_social' => 'ABOGADOS CALLEJA',
            'telefono' => '45345451265',
            'direccion' => 'WEW SDF SDF  RWE RWER',
        ]);
    }
}
