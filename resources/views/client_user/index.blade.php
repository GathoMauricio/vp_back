@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Usuarios {{ $client->razon_social }}
                <a href="{{ route('create/client_user', $client->id) }}" class="btn btn-primary float-right">Nuevo</a>
            </h4>
            <table class="table table-stripped" id="user_table">
                <thead>
                    <tr style="background-color:#60b22f">
                        <th style="color:white;">
                            NOMBRE
                        </th>
                        <th style="color:white;">
                            EMAIL
                        </th>
                        <th style="color:white;">
                            TELÉFONO
                        </th>
                        <th style="color:white;">
                            DIRECCIÓN
                        </th>
                        <th style="color:white;">
                            ÁREA
                        </th>
                        <th style="color:white;">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }} {{ $user->apellido }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>
                                {{ $user->sepomex->cp }} {{ $user->sepomex->estado }} {{ $user->sepomex->municipio }}
                                {{ $user->sepomex->ciudad }} {{ $user->sepomex->asentamiento }} {{ $user->num_ext }}
                                {{ $user->num_int }}
                            </td>
                            <td>{{ $user->area }}</td>
                            <td>
                                <a href="{{ route('edit/client_user', $user->id) }}" class="btn btn-warning"><span
                                        class="icon icon-pencil"></span></a>
                                <a href="javascript:void(0);" onclick="deleteClientUser({{ $user->id }});"
                                    class="btn btn-danger"><span class="icon icon-bin"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
