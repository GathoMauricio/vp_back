@extends('layouts.app')

@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>INICIAR TICKET</h4>
            <form class="container">
                <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                    DATOS DEL CLIENTE
                </h5>
                <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_id" class="vp-label-form">RAZÓN
                                SOCIAL</label>
                            <select name="client_id" id="client_id" class="form-select">
                                <option value>Seleccione una opción</option>
                            </select>
                            @error('client_id')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario_id" class="vp-label-form">USUARIO</label>
                            <select name="usuario_id" id="usuario_id" class="form-select">
                                <option value>Seleccione una opción</option>
                            </select>
                            @error('usuario_id')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="area" class="vp-label-form">ÁREA</label>
                            <input type="text" name="area" id="area" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono" class="vp-label-form">TELÉFONO</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="vp-label-form">EMAIL</label>
                            <input type="text" name="email" id="email" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion" class="vp-label-form">DIRECCIÓN</label>
                            <textarea name="direccion" id="direccion" class="form-control" readonly></textarea>
                        </div>
                    </div>
                </div>
                <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                    TIPO DE MANTENIMIENTO
                </h5>
                <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prioridad" class="vp-label-form">PRIORIDAD</label>
                            <select name="prioridad" id="prioridad" class="form-select">
                                <option value>Seleccione una opción</option>
                            </select>
                            @error('prioridad')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clase_id" class="vp-label-form">CLASE</label>
                            <select name="clase_id" id="clase_id" class="form-select">
                                <option value>Seleccione una opción</option>
                            </select>
                            @error('clase_id')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="problematica" class="vp-label-form">PROBLEMÁTICA</label>
                            <textarea name="problematica" id="problematica" class="form-control"></textarea>
                            @error('problematica')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comentarios_usuario" class="vp-label-form">COMENTARIOS USUARIO</label>
                            <textarea name="comentarios_usuario" id="comentarios_usuario" class="form-control"></textarea>
                            @error('comentarios_usuario')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                    DATOS DEL EQUIPO
                </h5>
                <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo" class="vp-label-form">TIPO</label>
                            <input type="text" name="tipo_equipo" id="tipo_equipo" class="form-control">
                            @error('tipo_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marca" class="vp-label-form">MARCA</label>
                            <input type="text" name="marca_equipo" id="marca_equipo" class="form-control">
                            @error('marca_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modelo_equipo" class="vp-label-form">MODELO</label>
                            <input type="text" name="modelo_equipo" id="modelo_equipo" class="form-control">
                            @error('modelo_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="serie" class="vp-label-form">N° DE SERIE</label>
                            <input type="text" name="serie_equipo" id="serie_equipo" class="form-control">
                            @error('serie_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password_equipo" class="vp-label-form">PASSWORD</label>
                            <input type="text" name="password_equipo" id="password_equipo" class="form-control">
                            @error('password_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="disco_duro_equipo" class="vp-label-form">DISCO DURO</label>
                            <input type="text" name="disco_duro_equipo" id="disco_duro_equipo" class="form-control">
                            @error('disco_duro_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="capacidad_equipo" class="vp-label-form">CAPACIDAD</label>
                            <input type="text" name="capacidad_equipo" id="capacidad_equipo" class="form-control">
                            @error('capacidad_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                    LLENE EN CASO DE QUE APIQUE
                </h5>
                <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="procesador_equipo" class="vp-label-form">PROCESADOR</label>
                            <input type="text" name="procesador_equipo" id="procesador_equipo" class="form-control">
                            @error('procesador_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ram_equipo" class="vp-label-form">MEMORIA RAM</label>
                            <input type="text" name="ram_equipo" id="ram_equipo" class="form-control">
                            @error('ram_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="so_equipo" class="vp-label-form">S.O.</label>
                            <input type="text" name="so_equipo" id="so_equipo" class="form-control">
                            @error('so_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="office_equipo" class="vp-label-form">OFFICE</label>
                            <input type="text" name="office_equipo" id="office_equipo" class="form-control">
                            @error('office_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="antivirus_equipo" class="vp-label-form">ANTIVIRUS</label>
                            <input type="text" name="antivirus_equipo" id="antivirus_equipo" class="form-control">
                            @error('antivirus_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="office_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS RESTANTES</label>
                            <input type="number" name="office_caducidad_equipo" id="office_caducidad_equipo"
                                class="form-control">
                            @error('office_caducidad_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="antivirus_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS
                                RESTANTES</label>
                            <input type="number" name="antivirus_caducidad_equipo" id="antivirus_caducidad_equipo"
                                class="form-control">
                            @error('antivirus_caducidad_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="software_equipo" class="vp-label-form">SOFTWARE ESPECIAL</label>
                            <textarea name="software_equipo" id="software_equipo" class="form-control"></textarea>
                            @error('software_equipo')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comentarios_cliente" class="vp-label-form">COMENTARIOS CLIENTE</label>
                            <textarea name="comentarios_cliente" id="comentarios_cliente" class="form-control"></textarea>
                            @error('comentarios_cliente')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary float-right" value="GUARDAR">
                <br><br>
            </form>
        </div>

    </div>
@endsection
