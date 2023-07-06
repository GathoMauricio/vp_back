<div style="width: 100%;text-align:right;padding:10px;">
    <a data-toggle="modal" data-target="#create_vale" href="javascript:void(0)">
        <span class="icon icon-plus"></span> Agregar vale de gastos
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Descripción</th>
            <th scope="col">Cant. Recibida</th>
            <th scope="col">Responsable</th>
            <th scope="col">Cant. Devuelta</th>
            <th scope="col">Gasto total</th>
            <th scope="col">Autorizado por</th>
            <th scope="col">Recibido por</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vales as $key => $vale)
            <tr>
                <td>{{ $vale->descripcion }}</td>
                <td>${{ $vale->cantidad_recibida }}</td>
                <td>{{ $vale->responsable }}</td>
                <td>${{ $vale->cantidad_regresada }}</td>
                <td>${{ $vale->gasto_total }}</td>
                <td>{{ $vale->autorizado_por }}</td>
                <td>{{ $vale->recibido_por }}</td>
                <td>
                    <table>
                        <tr>
                            <td>
                                @livewire('gasto-component', ['vale' => $vale], key($vale->id))
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#edit_vale" href="javascript:void(0)"
                                    wire:click="edit({{ $vale->id }})" class="btn btn-warning"><span
                                        class="icon icon-pencil"></span></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteVale({{ $vale->id }})"
                                    class="btn btn-danger"><span class="icon icon-bin"></span></a>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        @endforeach
        @if (count($vales) <= 0)
            <tr>
                <td colspan="8" class="text-center font-weight-bold">
                    No se encontraron registros
                </td>
            </tr>
        @endif
    </tbody>
</table>
