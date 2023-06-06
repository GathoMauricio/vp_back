<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();

        Ticket::create([
            'usuario_id' => 4,
            'author_id' => 1,
            'coordinador_id' => 3,
            'status_id' => 1,
            'clase_id' => 4,
            'folio' => 'T-000001',
            'inicio' => null,
            'cierre' => null,
            'prioridad' => 'Media',
            'problematica' => 'El perro del vecino se mirió y ahora no imprime a color si no enciendo primero la estufa',
            'comentarios_usuario' => 'El perro era pastor alemán',
            'comentarios_cliente' => 'La empresa no se hace responsable por lo acontecido',
            'tipo_equipo' => null,
            'marca_equipo' => null,
            'modelo_equipo' => null,
            'serie_equipo' => null,
            'password_equipo' => null,
            'disco_duro_equipo' => null,
            'capacidad_equipo' => null,
            'procesador_equipo' => null,
            'ram_equipo' => null,
            'so_equipo' => null,
            'office_equipo' => null,
            'antivirus_equipo' => null,
            'office_caducidad_equipo' => null,
            'antivirus_caducidad_equipo' => null,
            'software_equipo' => null,
            'danio' => null,
            'advertencia' => null,
            'solucion' => null,
            'calificacion' => null,
            'firma_usuario_final' => null,
            'firma_encargado' => null,
            'firma_ing_servicio' => null,
            'pagado' => 'N|A',
            'motivo_cancelacion' => null,
            'cotizar_producto' => 'NO',
        ]);
    }
}
