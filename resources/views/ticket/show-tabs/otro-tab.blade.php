<div class="tab-pane fade" id="otro" role="tabpanel" aria-labelledby="otro-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        OTRO
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id" class="vp-label-form">CATEGORÍA</label>
                <input value="{{ $ticket->categoria->categoria }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cotizar_producto" class="vp-label-form"> COTIZAR PRODUCTO</label>
                <input value="{{ $ticket->cotizar_producto }}" class="form-control" readonly>
                @if ($ticket->cotizar_producto == 'SI')
                    <br>
                    <input value="{{ $ticket->especifique_cotizar_producto }}" class="form-control" readonly>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                CALIFICACIÓN DE SERVICIO
            </h5>
            <table style="width: 100%;">
                <tr>
                    <td class="text-center">
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'MALO')
                            <input type="radio" name="calificacion" value="MALO" checked>
                        @else
                            <input type="radio" name="calificacion" value="MALO">
                        @endif
                        MALO
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'REGULAR')
                            <input type="radio" name="calificacion" value="REGULAR" checked>
                        @else
                            <input type="radio" name="calificacion" value="REGULAR">
                        @endif
                        REGULAR
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'BUENO')
                            <input type="radio" name="calificacion" value="BUENO" checked>
                        @else
                            <input type="radio" name="calificacion" value="BUENO">
                        @endif
                        BUENO
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <br>
                        @if ($ticket->calificacion == 'EXCELENTE')
                            <input type="radio" name="calificacion" value="EXCELENTE" checked>
                        @else
                            <input type="radio" name="calificacion" value="EXCELENTE">
                        @endif
                        EXCELENTE
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                ESTATUS PAGADO
            </h5>
            <select name="pagado" id="pagado" class="form-select">
                @switch($ticket->pagado)
                    @case('N|A')
                        <option value="N|A" selected>NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PPP')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP" selected>PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PAG')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG" selected>PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PPD')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD" selected>PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break
                @endswitch
            </select>
        </div>
    </div>
    <div class="row">
        <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
            TICKETS LIGADOS
        </h5>
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
                @foreach ($ticket->tickets as $ticket)
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
                            @if ($ticket->status->id != 6)
                                <a href="{{ route('edit/ticket', $ticket->folio) }}" class="btn btn-warning"
                                    data-toggle="tooltip" title="Editar registro...">
                                    <span class="icon icon-pencil"></span>
                                </a>
                            @endif
                            <a href="javascript:void(0);" onclick="deleteTicket({{ $ticket->id }});"
                                class="btn btn-danger"><span class="icon icon-bin"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="comentarios_cliente" class="vp-label-form">COMENTARIOS CLIENTE</label>
                <textarea name="comentarios_cliente" id="comentarios_cliente" class="form-control" readonly>{{ old('comentarios_cliente', $ticket->comentarios_cliente ?: '') }}</textarea>
                @error('comentarios_cliente')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    @if ($ticket->status->id == 6)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="motivo_cancelacion" class="vp-label-form">MOTIVO DE
                        CANCELACIÓN</label>
                    <textarea name="motivo_cancelacion" id="motivo_cancelacion" class="form-control" readonly>{{ old('motivo_cancelacion', $ticket->motivo_cancelacion ?: '') }}</textarea>
                    @error('comentarios_cliente')
                        <small style="color:red;">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            </div>
        </div>
    @endif
</div>
