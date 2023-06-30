@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="row justify-content-center">
        <h4>
            TICKET FOLIO [{{ $ticket->folio }}]
            &nbsp;<a href="{{ route('edit/ticket', $ticket->folio) }}" data-toggle="tooltip" title="Editar ticket..."><span
                    class="icon icon-pencil"></span></a>
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
        </h4>

        @include('ticket.show-tabs.tabs')
        <div class="tab-content" id="myTabContent">
            @include('ticket.show-tabs.datos-cliente-tab')
            @include('ticket.show-tabs.tipo-mantenimiento-tab')
            @include('ticket.show-tabs.datos-equipo-tab')
            @include('ticket.show-tabs.caso-aplique-tab')
            @include('ticket.show-tabs.valoracion-tecnica-tab')
            @include('ticket.show-tabs.vale-gastos-tab')
            @include('ticket.show-tabs.otro-tab')
        </div>
        <br><br>
    </div>
@endsection
@section('ready_scripts')
    loadUsersByClientOnEdit($("#client_id").val(),{{ $ticket->usuario_id }});
@endsection
