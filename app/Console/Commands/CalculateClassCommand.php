<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Clase;
use App\Models\Ticket;

class CalculateClassCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'class:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clacula la clase de un ticket a partir del tiempo de inicio y l tiempo de cierre del mismo.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // \Log::debug("Inicio command class:calcuate");
        // $clases = Clase::orderBy('id')->get();
        // foreach ($clases as $clase) {
        //\Log::debug("desde: " . $clase->tiempo_de . " hasta: " . $clase->tiempo_hasta);
        //}


        $tickets = Ticket::where('status_id', 3)->get();
        foreach ($tickets as $ticket) {
            $inicio = Carbon::createFromFormat('Y-m-d H:i:s', $ticket->inicio);
            $ahora = Carbon::now();
            $minutos = $inicio->diffInMinutes($ahora);
            \Log::debug($minutos);
            if ($minutos > 0 and $minutos <= 30) {
                $ticket->clase_id = 1;
                $ticket->precio = Clase::find(1)->precio;
            }
            if ($minutos >= 31 and $minutos <= 45) {
                $ticket->clase_id = 2;
                $ticket->precio = Clase::find(2)->precio;
            }
            if ($minutos >= 46 and $minutos <= 80) {
                $ticket->clase_id = 3;
                $ticket->precio = Clase::find(3)->precio;
            }
            if ($minutos >= 81 and $minutos <= 105) {
                $ticket->clase_id = 4;
                $ticket->precio = Clase::find(4)->precio;
            }
            if ($minutos >= 106 and $minutos <= 120) {
                $ticket->clase_id = 5;
                $ticket->precio = Clase::find(5)->precio;
            }
            if ($minutos >= 121 and $minutos <= 165) {
                $ticket->clase_id = 6;
                $ticket->precio = Clase::find(6)->precio;
            }
            if ($minutos >= 166 and $minutos <= 180) {
                $ticket->clase_id = 7;
                $ticket->precio = Clase::find(7)->precio;
            }
            if ($minutos >= 181 and $minutos <= 240) {
                $ticket->clase_id = 8;
                $ticket->precio = Clase::find(8)->precio;
            }
            if ($minutos >= 241) {
                $ticket->clase_id = 9;
                $ticket->precio = 0;
            }
            $ticket->save();
        }
    }
}
