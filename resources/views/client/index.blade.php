@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Clientes
                <a href="{{ route('create/client') }}" class="btn btn-primary float-right">Nuevo</a>
            </h4>
            <table class="table table-stripped" id="user_table">
                <thead>
                    <tr style="background-color:#60b22f">
                        <th style="color:white;">
                            RAZÓN SOCIAL
                        </th>
                        <th style="color:white;">
                            TELÉFONO
                        </th>
                        <th style="color:white;">
                            DIRECCIÓN
                        </th>
                        <th style="color:white;">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->razon_social }}</td>
                            <td>{{ $client->telefono }}</td>
                            <td>{{ $client->direccion }}</td>
                            <td>
                                <a href="{{ route('index/client_users', $client->id) }}" class="btn btn-info"><span
                                        class="icon icon-user-tie"></span></a>
                                <a href="{{ route('edit/client', $client->id) }}" class="btn btn-warning"><span
                                        class="icon icon-pencil"></span></a>
                                <a href="javascript:void(0);" onclick="deleteClient({{ $client->id }});"
                                    class="btn btn-danger"><span class="icon icon-bin"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
