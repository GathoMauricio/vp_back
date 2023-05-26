<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();

        Status::create([
            'nombre' => 'Cotización',
            'descripcion' => 'El ticket se inicia como cotización pendiente de aprobación del cliente.',
        ]);
        Status::create([
            'nombre' => 'Aprobado',
            'descripcion' => 'El ticket se marca como aprobado en espera de inicialización.',
        ]);
        Status::create([
            'nombre' => 'En proceso',
            'descripcion' => 'El servicio se ha iniciado y se encuentra en proceso.',
        ]);
        Status::create([
            'nombre' => 'Terminado',
            'descripcion' => 'El servicio se ha terminado y se encuentra en espera de aprobación por parte un administrador.',
        ]);
        Status::create([
            'nombre' => 'Finalizado',
            'descripcion' => 'El ticket ha concluido satisfactoriamente y de da por finalizado',
        ]);
        Status::create([
            'nombre' => 'Cancelado',
            'descripcion' => 'El ticket ha sido cancelado.',
        ]);
    }
}
