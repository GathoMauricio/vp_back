@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')


    <div class="container" id="contenido_general">
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                        type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gastos-tab" data-bs-toggle="tab" data-bs-target="#gastos" type="button"
                        role="tab" aria-controls="gastos" aria-selected="false">Gastos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ticket-tab" data-bs-toggle="tab" data-bs-target="#ticket" type="button"
                        role="tab" aria-controls="ticket" aria-selected="false">Ticket</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="orden_servicio-tab" data-bs-toggle="tab" data-bs-target="#orden_servicio"
                        type="button" role="tab" aria-controls="orden_servicio" aria-selected="false">Órden de
                        servicio</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    @include('ticket.general_form_edit')
                </div>
                <div class="tab-pane fade" id="gastos" role="tabpanel" aria-labelledby="gastos-tab">
                    @include('ticket.expensives_edit')
                </div>
                <div class="tab-pane fade" id="ticket" role="tabpanel" aria-labelledby="ticket-tab">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo numquam est nobis delectus odio explicabo
                    aut atque? Fuga blanditiis molestias, maxime assumenda quaerat modi a eius iure error voluptas
                    voluptatibus?
                </div>
                <div class="tab-pane fade" id="orden_servicio" role="tabpanel" aria-labelledby="orden_servicio-tab">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptatem, autem tempore aut illum
                    nesciunt aliquid. Perferendis iusto culpa magnam, a quibusdam velit. Illo dicta labore beatae sed
                    laudantium debitis!
                </div>
            </div>
        </div>
    </div>
@endsection
@section('ready_scripts')
    loadUsersByClientOnEdit($("#client_id").val(),{{ $ticket->usuario_id }});
@endsection
