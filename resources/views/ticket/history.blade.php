@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Historico
            </h4>
            @include('ticket.cards')
            <table style="width: 100%;">
                <thead>
                    <tr style="background-color:#60b22f">
                        <th style="color:white;">
                            FOLIO
                        </th>
                        <th style="color:white;">
                            ASUNTO
                        </th>
                        <th style="color:white;">
                            PROBLEMÁTICA
                        </th>
                        <th style="color:white;">
                            CTE
                        </th>
                        <th style="color:white;">
                            F. SOLICITUD
                        </th>
                        <th style="color:white;">
                            USUARIO
                        </th>
                        <th style="color:white;">
                            STATUS
                        </th>
                        <th style="color:white;">
                            CLASE
                        </th>
                        <th style="color:white;">
                            PAGADO
                        </th>
                        <th style="color:white;">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td class="font-weight-bold">
                                {{ $ticket->folio }}
                            </td>
                            <td class="font-weight-bold">
                                @foreach ($ticket->tipos_servicios as $tipos)
                                    {{ '|' . $tipos->tipo . '|' }}
                                @endforeach
                            </td>
                            <td class="font-weight-bold">
                                {{ $ticket->problematica }}
                            </td>
                            <td class="font-weight-bold">
                                {{ $ticket->usuario->cliente->razon_social }}
                            </td>
                            <td class="font-weight-bold">
                                {{ explode(' ', $ticket->created_at)[0] }}
                            </td>
                            <td class="font-weight-bold">
                                {{ $ticket->usuario->name }}
                            </td>
                            <td class="font-weight-bold text-center">
                                @switch($ticket->status_id)
                                    @case(1)
                                        <span style="background-color:gray;color:white;" data-toggle="tooltip"
                                            title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                        <br>
                                        <small><b>{{ dateToString($ticket->created_at) }}</b></small>
                                    @break

                                    @case(2)
                                        <span style="background-color:rgb(74, 126, 204);color:rgb(251, 250, 253);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                        <br>
                                        <small><b>{!! dateToString($ticket->aprobado_time) !!}</b></small>
                                    @break

                                    @case(3)
                                        <span style="background-color:rgb(212, 243, 102);color:rgb(60, 49, 83);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                        <br>
                                        <small><b>{!! dateToString($ticket->inicio) !!}</b></small>
                                    @break

                                    @case(4)
                                        <span style="background-color:rgb(235, 175, 65);color:rgb(245, 244, 247);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                        <br>
                                        <small><b>{!! dateToString($ticket->cierre) !!}</b></small>
                                    @break

                                    @case(5)
                                        <span style="background-color:rgb(60, 230, 18);color:rgb(249, 246, 255);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                        <br>
                                        <small><b>{!! dateToString($ticket->finalizado_time) !!}</b></small>
                                    @break

                                    @case(6)
                                        <span style="background-color:rgb(255, 74, 19);color:rgb(249, 248, 253);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            {{ $ticket->status->nombre }}
                                        </span>
                                    @break
                                @endswitch

                            </td>
                            <td class="font-weight-bold">
                                @switch($ticket->status->id)
                                    @case(1)
                                        <span class="float-left"><b>N|A</b></span>
                                    @break

                                    @case(2)
                                        <span class="float-left"><b>N|A</b></span>
                                    @break

                                    @case(3)
                                        <span class="float-left"><b>{{ $ticket->clase->tipo }}</b></span>
                                    @break

                                    @case(4)
                                        <span class="float-left"><b>{{ $ticket->clase->tipo }}</b></span>
                                    @break

                                    @case(5)
                                        <span class="float-left"><b>{{ $ticket->clase->tipo }}</b></span>
                                    @break

                                    @case(6)
                                        <span class="float-left"><b>N|A</b></span>
                                    @break
                                @endswitch
                            </td>
                            <td class="font-weight-bold">
                                {{ $ticket->pagado }}
                            </td>
                            <td class="font-weight-bold">
                                <a href="{{ route('show/ticket', $ticket->folio) }}" class="btn btn-primary"
                                    data-toggle="tooltip" title="Ver órden de servicio...">
                                    <span class="icon icon-eye"></span>
                                </a>
                                {{--  <a href="javascript:void(0);" onclick="deleteTicket({{ $ticket->id }});"
                            class="btn btn-danger"><span class="icon icon-bin"></span></a>  --}}
                            </td>
                        </tr>
                        @php
                            $subtickets = App\Models\Ticket::where('status_id', '>', 4)
                                ->where('folio', 'LIKE', '%' . $ticket->folio . '|%')
                                ->orderBy('created_at', 'DESC')
                                ->get();
                        @endphp
                        @if (count($subtickets) > 0)
                            <tr>
                                <td colspan="10" class="text-center">
                                    <a onclick="verMasMenos({{ $ticket->id }});" href="javascript:void(0)"
                                        id="ver_mas_{{ $ticket->id }}">Ver más</a>
                                </td>
                            </tr>
                        @endif
                        @foreach ($subtickets as $key => $subticket)
                            <tr id="subticket_{{ $ticket->id }}" style="display:none;">
                                <td class="font-weight-bold">
                                    {{ $subticket->folio }}
                                </td>
                                <td class="font-weight-bold">
                                    @foreach ($subticket->tipos_servicios as $tipos)
                                        {{ '|' . $tipos->tipo . '|' }}
                                    @endforeach
                                </td>
                                <td class="font-weight-bold">
                                    {{ $subticket->problematica }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $subticket->usuario->cliente->razon_social }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ explode(' ', $subticket->created_at)[0] }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $subticket->usuario->name }}
                                </td>
                                <td class="font-weight-bold text-center">
                                    @switch($subticket->status_id)
                                        @case(1)
                                            <span style="background-color:gray;color:white;" data-toggle="tooltip"
                                                title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                            <br>
                                            <small><b>{{ dateToString($subticket->created_at) }}</b></small>
                                        @break

                                        @case(2)
                                            <span style="background-color:rgb(74, 126, 204);color:rgb(251, 250, 253);"
                                                data-toggle="tooltip" title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                            <br>
                                            <small><b>{!! dateToString($subticket->aprobado_time) !!}</b></small>
                                        @break

                                        @case(3)
                                            <span style="background-color:rgb(212, 243, 102);color:rgb(60, 49, 83);"
                                                data-toggle="tooltip" title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                            <br>
                                            <small><b>{!! dateToString($subticket->inicio) !!}</b></small>
                                        @break

                                        @case(4)
                                            <span style="background-color:rgb(235, 175, 65);color:rgb(245, 244, 247);"
                                                data-toggle="tooltip" title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                            <br>
                                            <small><b>{!! dateToString($subticket->cierre) !!}</b></small>
                                        @break

                                        @case(5)
                                            <span style="background-color:rgb(60, 230, 18);color:rgb(249, 246, 255);"
                                                data-toggle="tooltip" title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                            <br>
                                            <small><b>{!! dateToString($subticket->finalizado_time) !!}</b></small>
                                        @break

                                        @case(6)
                                            <span style="background-color:rgb(255, 74, 19);color:rgb(249, 248, 253);"
                                                data-toggle="tooltip" title="{{ $subticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                {{ $subticket->status->nombre }}
                                            </span>
                                        @break
                                    @endswitch

                                </td>
                                <td class="font-weight-bold">
                                    @switch($subticket->status->id)
                                        @case(1)
                                            <span class="float-left"><b>N|A</b></span>
                                        @break

                                        @case(2)
                                            <span class="float-left"><b>N|A</b></span>
                                        @break

                                        @case(3)
                                            <span class="float-left"><b>{{ $subticket->clase->tipo }}</b></span>
                                        @break

                                        @case(4)
                                            <span class="float-left"><b>{{ $subticket->clase->tipo }}</b></span>
                                        @break

                                        @case(5)
                                            <span class="float-left"><b>{{ $subticket->clase->tipo }}</b></span>
                                        @break

                                        @case(6)
                                            <span class="float-left"><b>N|A</b></span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="font-weight-bold">
                                    {{ $subticket->pagado }}
                                </td>
                                <td class="font-weight-bold">
                                    <a href="{{ route('show/ticket', $subticket->folio) }}" class="btn btn-primary"
                                        data-toggle="tooltip" title="Ver órden de servicio...">
                                        <span class="icon icon-eye"></span>
                                    </a>
                                    {{--  <a href="javascript:void(0);" onclick="deleteTicket({{ $subticket->id }});"
                            class="btn btn-danger"><span class="icon icon-bin"></span></a>  --}}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    @if (count($tickets) <= 0)
                        <tr>
                            <td colspan="10" class="text-center">
                                No se encontraron registros
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endsection
