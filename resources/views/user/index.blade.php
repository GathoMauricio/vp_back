@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Usuarios
                <a href="{{ route('create/user') }}" class="btn btn-primary float-right">Nuevo</a>
            </h4>
            <table class="table table-stripped" id="user_table">
                <thead>
                    <tr style="background-color:#60b22f">
                        <th style="color:white;">
                            ROL
                        </th>
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

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>
                                <a href="{{ route('edit/user', $user->id) }}" class="btn btn-warning"><span
                                        class="icon icon-pencil"></span></a>
                                <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }});"
                                    class="btn btn-danger"><span class="icon icon-bin"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
