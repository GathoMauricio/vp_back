@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="row justify-content-center">
        <h4>
            EDITAR TICKET FOLIO [{{ $ticket->folio }}]
            <br>
            @switch($ticket->status->id)
                @case(1)
                    <span class="float-left">Clase: <b>N|A</b></span>
                @break

                @case(2)
                    <span class="float-left">Clase: <b>N|A</b></span>
                @break

                @case(3)
                    <span class="float-left">Clase: <b>{{ $ticket->clase->tipo }}</b></span>
                @break

                @case(4)
                    <span class="float-left">Clase: <b>{{ $ticket->clase->tipo }}</b></span>
                @break

                @case(5)
                    <span class="float-left">Clase: <b>{{ $ticket->clase->tipo }}</b></span>
                @break

                @case(6)
                    <span class="float-left">Clase: <b>N|A</b></span>
                @break
            @endswitch
            @switch($ticket->status->id)
                @case(1)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                        <br>
                        <small><a onclick="changeTicketStatus({{ $ticket->id }},2);" href="javascript:void(0)">Marcar
                                como
                                aprobado</a></small>
                    </span>
                @break

                @case(2)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                        <br>
                        <small><a onclick="changeTicketStatus({{ $ticket->id }},3);" href="javascript:void(0)">Marcar
                                como en
                                proceso</a></small>
                    </span>
                @break

                @case(3)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                        <br>
                        <small><a onclick="changeTicketStatus({{ $ticket->id }},4);" href="javascript:void(0)">Marcar
                                como
                                terminado</a></small>
                    </span>
                @break

                @case(4)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                        <br>
                        <small><a onclick="changeTicketStatus({{ $ticket->id }},5);" href="javascript:void(0)">Marcar
                                como
                                finalizado</a></small>
                    </span>
                @break

                @case(5)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                    </span>
                @break

                @case(6)
                    <span class="float-right">Estatus: <b>{{ $ticket->status->nombre }}</b>
                    </span>
                @break
            @endswitch
        </h4>
        @include('ticket.edit-tabs.tabs')
        <form action="{{ route('update/ticket', $ticket->folio) }}" class="container" method="POST">
            @csrf
            @method('PUT')
            <div class="tab-content" id="myTabContent">
                @include('ticket.edit-tabs.datos-cliente-tab')
                @include('ticket.edit-tabs.tipo-mantenimiento-tab')
                @include('ticket.edit-tabs.datos-equipo-tab')
                @include('ticket.edit-tabs.caso-aplique-tab')
                @include('ticket.edit-tabs.valoracion-tecnica-tab')
                @include('ticket.edit-tabs.vale-gastos-tab')
                @include('ticket.edit-tabs.otro-tab')
                @if ($ticket->status->id != 6)
                    <input onclick="cancelTicket({{ $ticket->id }},'{{ $ticket->folio }}');" type="button"
                        class="btn btn-danger float-left" value="CANCELAR TICKET">
                    <input type="submit" class="btn btn-primary float-right" value="ACTUALIZAR">
                    <br><br>
                @endif
            </div>
        </form>
        <br><br>
    </div>
@endsection
@section('ready_scripts')
    loadUsersByClientOnEdit($("#client_id").val(),{{ $ticket->usuario_id }});
@endsection
