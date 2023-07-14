<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TicketServiceType;
use App\Models\ServiceType;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Concept;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Clase;
use App\Models\User;

class TicketController extends Controller
{
    public function history()
    {
        \Artisan::call('class:calculate');
        $tickets = Ticket::where('status_id', '>', 4)->where('folio', 'NOT LIKE', '%|%')->orderBy('created_at', 'DESC')->get();
        $ticketsAll = Ticket::where('status_id', '>', 4)->get();
        $terminadoNum = $ticketsAll->where('status_id', 5)->count();
        $eliminadoNum = $ticketsAll->where('status_id', 6)->count();
        return view('ticket.history', compact('tickets', 'terminadoNum', 'eliminadoNum'));
    }
    public function show($folio)
    {
        $ticket = Ticket::where('folio', $folio)->first();
        $proveedores = Provider::all();
        $conceptos = Concept::all();
        $users = User::all();
        return view('ticket.show', compact('ticket', 'proveedores', 'conceptos', 'users'));
    }

    public function create()
    {
        $clients = Client::orderBy('razon_social')->get();
        $clases = Clase::orderBy('tipo', 'DESC')->get();
        $coordinadores = User::where('role_id', 3)->orderBy('name')->get();
        $servicios = Service::orderBy('clase', 'DESC')->get();
        $tipos_servicios = ServiceType::all();
        $tickets = Ticket::where('status_id', '<=', 4)->where('folio', 'not like', "%|%")->get(); //tickets que aún se encuentran en espera de ser finalizados
        $categories = Category::all();
        return view('ticket.create', compact('clients', 'clases', 'coordinadores', 'servicios', 'tipos_servicios', 'tickets', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'usuario_id' => 'required',
            'prioridad' => 'required',
            'problematica' => 'required',
            'category_id' => 'required',
        ], [
            'client_id.required' => 'No se ha seleccionad un cliente.',
            'usuario_id.required' => 'No se ha seleccionado un usuario.',
            'prioridad.required' => 'No se ha seleccionado una prioridad.',
            'problematica.required' => 'No se ha indicado una problemática.',
            'category_id.required' => 'Se debe indicar una categoría.',
        ]);
        $folio = '';
        if (!$request->ticket_id) { //si no require ticket padre se genera un nuevo folio
            $folio = $this->generaFolio($request->category_id);
        } else { //si trae ticket padre

            $ticket_padre = Ticket::find($request->ticket_id); //se busca el ticket padre
            $subticket = Ticket::where('folio', $ticket_padre->folio . '|1')->first(); //se busca si este padre ya tiene hijos
            if (!$subticket) { //si no tiene hijos se crea su primer hijo
                $folio = $ticket_padre->folio . '|1';
            } else { //si ya tiene hijos vemos cual es el último para sumarle uno más
                $partes = explode('-', $subticket->folio);
                $cont =  intval($partes[1]) + 1;
                $folio = $ticket_padre->folio . '|' . $cont;
            }
        }

        $ticket = Ticket::create([
            'ticket_id' => $request->ticket_id ? $request->ticket_id : null,
            'category_id' => $request->category_id,
            'usuario_id' => $request->usuario_id,
            'author_id' => \Auth::user()->id,
            'coordinador_id' => $request->coordinador_id,
            'status_id' => 1,
            'folio' => $folio,
            'inicio' => null,
            'cierre' => null,
            'prioridad' => $request->prioridad,
            'problematica' => $request->problematica,
            'comentarios_usuario' => $request->comentarios_usuario,
            'comentarios_cliente' => $request->comentarios_cliente,
            'tipo_equipo' => $request->tipo_equipo,
            'marca_equipo' => $request->marca_equipo,
            'modelo_equipo' => $request->modelo_equipo,
            'serie_equipo' => $request->serie_equipo,
            'password_equipo' => $request->password_equipo,
            'disco_duro_equipo' => $request->disco_duro_equipo,
            'capacidad_equipo' => $request->capacidad_equipo,
            'procesador_equipo' => $request->procesador_equipo,
            'ram_equipo' => $request->ram_equipo,
            'so_equipo' => $request->so_equipo,
            'office_equipo' => $request->office_equipo,
            'antivirus_equipo' => $request->antivirus_equipo,
            'office_caducidad_equipo' => $request->office_caducidad_equipo,
            'antivirus_caducidad_equipo' => $request->antivirus_caducidad_equipo,
            'software_equipo' => $request->software_equipo,
            'danio' => $request->danio,
            'advertencia' => $request->advertencia,
            'solucion' => $request->solucion,
            'calificacion' => null,
            'firma_usuario_final' => null,
            'firma_encargado' => null,
            'firma_ing_servicio' => null,
            'pagado' => 'N|A',
            'motivo_cancelacion' => null,
            'cotizar_producto' => $request->cotizar_producto,
            'especifique_cotizar_producto' => $request->especifique_cotizar_producto,
        ]);
        if ($request->tipo) {
            for ($i = 0; count($request->tipo) > $i; $i++) {
                TicketServiceType::create([
                    'ticket_id' => $ticket->id,
                    'tipo' => $request->tipo[$i],
                    'detalle' => $request->detalle[$i]
                ]);
            }
        }
        \Session::flash('success', 'El ticket con el folio ' . $ticket->folio . ' ha sido almacenado correctamente.');
        return redirect()->route('show/ticket', $ticket->folio);
    }

    public function edit($folio)
    {
        $ticket = Ticket::where('folio', $folio)->first();
        $clients = Client::orderBy('razon_social')->get();
        $clases = Clase::orderBy('tipo', 'DESC')->get();
        $coordinadores = User::where('role_id', 3)->orderBy('name')->get();
        $tipos_servicios = ServiceType::all();
        $categories = Category::all();
        $proveedores = Provider::all();
        $conceptos = Concept::all();
        $users = User::all();
        return view('ticket.edit', compact('ticket', 'clients', 'clases', 'coordinadores', 'tipos_servicios', 'categories', 'proveedores', 'conceptos', 'users'));
    }

    public function update(Request $request, $folio)
    {

        $request->validate([
            'client_id' => 'required',
            'usuario_id' => 'required',
            'prioridad' => 'required',
            'problematica' => 'required',
            'category_id' => 'required',
        ], [
            'client_id.required' => 'No se ha seleccionad un cliente.',
            'usuario_id.required' => 'No se ha seleccionado un usuario.',
            'prioridad.required' => 'No se ha seleccionado una prioridad.',
            'problematica.required' => 'No se ha indicado una problemática.',
            'category_id.required' => 'Se debe indicar una categoría.',
        ]);
        $ticket = Ticket::where('folio', $folio)->first();
        $ticket->update($request->all());
        TicketServiceType::where('ticket_id', $ticket->id)->delete();
        if ($request->tipo) {
            for ($i = 0; count($request->tipo) > $i; $i++) {
                TicketServiceType::create([
                    'ticket_id' => $ticket->id,
                    'tipo' => $request->tipo[$i],
                    'detalle' => $request->detalle[$i]
                ]);
            }
        }
        \Session::flash('success', 'El ticket con el folio ' . $ticket->folio . ' ha sido actualizado correctamente.');
        return redirect()->route('edit/ticket', $ticket->folio);
    }

    private function generaFolio($category_id)
    {
        $category = Category::find($category_id);
        $last_ticket = Ticket::orderBy('folio', 'DESC')->first();
        if ($last_ticket) {
            $parts = explode('-', $last_ticket->folio);
            $newFolio = intval($parts[1]) + 1;
            $folioString = $category->sigla . '-';
            if ($newFolio <= 9) {
                $folioString .= '00000' . $newFolio;
            }
            if ($newFolio > 9 && $newFolio <= 99) {
                $folioString .= '0000' . $newFolio;
            }
            if ($newFolio > 99 && $newFolio <= 999) {
                $folioString .= '000' . $newFolio;
            }
            if ($newFolio > 999 && $newFolio <= 9999) {
                $folioString .= '00' . $newFolio;
            }
            if ($newFolio > 9999 && $newFolio <= 99999) {
                $folioString .= '0' . $newFolio;
            }
            if ($newFolio > 99999) {
                $folioString .=  $newFolio;
            }
            return $folioString;
        } else {
            return $category->sigla . '-000001';
        }
    }

    public function cancel(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->status_id = 6;
        $ticket->motivo_cancelacion = $request->motivo_cancelacion;
        if ($ticket->save()) {
            return "Ticket cancelado";
        } else {
            return "Error al eliminar";
        }
    }

    public function delete(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        if ($ticket->delete()) {
            return "Ticket eliminado";
        } else {
            return "Error al eliminar";
        }
    }

    public function changeStatus(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        switch ($request->status_id) {
            case 2: //Marcar como aprobado
                $ticket->status_id = $request->status_id;
                $ticket->aprobado_time = Carbon::now();
                break;
            case 3: //Marcar como en proceso
                $ticket->status_id = $request->status_id;
                $ticket->inicio = Carbon::now();
                $ticket->clase_id = 1;
                break;
            case 4: //Marcar como terminado
                $ticket->status_id = $request->status_id;
                $ticket->cierre = Carbon::now();
                $ticket->clase_id = $this->calculateClassId($ticket->inicio, $ticket->cierre);
                break;
            case 5: //Marcar como finalizado
                $ticket->status_id = $request->status_id;
                $ticket->finalizado_time = Carbon::now();
                break;
        }
        if ($ticket->save()) {
            return "Estatus del ticket actualizado";
        } else {
            return "Error al eliminar";
        }
    }

    public function calculateClassId($initTime, $currentTime)
    {
        $clases = Clase::orderBy('id');
        foreach ($clases as $clases) {
        }
    }
}
