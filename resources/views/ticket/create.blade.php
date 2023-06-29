@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="row justify-content-center">
        <h4>INICIAR TICKET</h4>
        @include('ticket.create-tabs.tabs')
        <form action="{{ route('store/ticket') }}" method="POST">
            @csrf
            <div class="tab-content" id="myTabContent">
                @include('ticket.create-tabs.datos-cliente-tab')
                @include('ticket.create-tabs.tipo-mantenimiento-tab')
                @include('ticket.create-tabs.datos-equipo-tab')
                @include('ticket.create-tabs.caso-aplique-tab')
                @include('ticket.create-tabs.valoracion-tecnica-tab')
                @include('ticket.create-tabs.otro-tab')
                <input type="submit" class="btn btn-primary float-right" value="GUARDAR">
            </div>
        </form>
        <br><br>
    </div>
@endsection
