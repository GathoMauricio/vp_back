@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <table class="table" id="dashboard_table">
        <thead>
            <tr style="background-color:#60b22f">
                <th style="color:white;">
                    FOLIO
                </th>
                <th style="color:white;">
                    ASUNTO
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
                        [Servicios]
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
                    <td class="font-weight-bold">
                        @switch($ticket->status_id)
                            @case(1)
                                <span style="background-color:gray;color:white;" data-toggle="tooltip"
                                    title="{{ $ticket->status->descripcion }}"
                                    class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                @break

                                @case(2)
                                    <span style="background-color:rgb(74, 126, 204);color:rgb(251, 250, 253);" data-toggle="tooltip"
                                        title="{{ $ticket->status->descripcion }}"
                                        class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                    @break

                                    @case(3)
                                        <span style="background-color:rgb(212, 243, 102);color:rgb(60, 49, 83);"
                                            data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                        @break

                                        @case(4)
                                            <span style="background-color:rgb(235, 175, 65);color:rgb(245, 244, 247);"
                                                data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                                class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                            @break

                                            @case(5)
                                                <span style="background-color:rgb(60, 230, 18);color:rgb(249, 246, 255);"
                                                    data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                                    class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                @break

                                                @case(6)
                                                    <span style="background-color:rgb(255, 74, 19);color:rgb(249, 248, 253);"
                                                        data-toggle="tooltip" title="{{ $ticket->status->descripcion }}"
                                                        class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                    @break
                                                @endswitch
                                                {{ $ticket->status->nombre }}
                                            </span>
                    </td>
                    <td class="font-weight-bold">
                        @switch(str_split($ticket->clase->tipo, 1)[0])
                            @case('A')
                                <span style="background-color:rgb(60, 230, 18);color:rgb(249, 246, 255);" data-toggle="tooltip"
                                    title="De {{ $ticket->clase->tiempo_de }} En adelante"
                                    class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                @break

                                @case('B')
                                    <span style="background-color:rgb(212, 243, 102);color:rgb(60, 49, 83);" data-toggle="tooltip"
                                        title="De {{ $ticket->clase->tiempo_de }} A {{ $ticket->clase->tiempo_hasta }} mins"
                                        class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                    @break

                                    @case('C')
                                        <span style="background-color:rgb(255, 74, 19);color:rgb(249, 248, 253);"
                                            data-toggle="tooltip"
                                            title="De {{ $ticket->clase->tiempo_de }} A {{ $ticket->clase->tiempo_hasta }} mins"
                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                        @break
                                    @endswitch
                                    {{ $ticket->clase->tipo }}
                                </span>
                    </td>
                    <td class="font-weight-bold">
                        {{ $ticket->pagado }}
                    </td>
                    <td class="font-weight-bold">
                        <button class="btn btn-primary" data-toggle="tooltip" title="Ticket de servicio...">
                            <span class="icon icon-ticket"></span>
                        </button>
                        <button class="btn btn-info" data-toggle="tooltip" title="Órden de servicio..">
                            <span class="icon icon-file-pdf"></span>
                        </button>
                        <button class="btn btn-warning" data-toggle="tooltip" title="Editar registro...">
                            <span class="icon icon-pencil"></span>
                        </button>
                        <button class="btn btn-danger" data-toggle="tooltip" title="Eliminar registro...">
                            <span class="icon icon-bin"></span>
                        </button>
                    </td>
                </tr>
            @endforeach
            @if (count($tickets) <= 0)
                <tr>
                    <td colspan="9" class="text-center">
                        No se encontraron registros
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
