@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')

    <table class="table">
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
                    <td>

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
