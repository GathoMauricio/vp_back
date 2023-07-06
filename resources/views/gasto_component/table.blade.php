<div style="width: 100%;text-align:right;padding:10px;">
    <a data-toggle="modal" data-target="#create_gasto" href="javascript:void(0)">
        <span class="icon icon-plus"></span> Agregar gasto
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Proveedor</th>
            <th scope="col">Concepto</th>
            <th scope="col">Costo</th>
            <th scope="col">Detalle</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vale->gastos as $key => $gasto)
            <tr>
                <td>
                    {{ $gasto->proveedor != 'OTRO' ? $gasto->proveedor : $gasto->proveedor_otro }}
                </td>
                <td>
                    {{ $gasto->concepto != 'OTRO' ? $gasto->concepto : $gasto->concepto_otro }}
                </td>
                <td>${{ $gasto->costo }}</td>
                <td>{{ $gasto->detalle }}</td>
                <td>
                    <a data-toggle="modal" data-target="#edit_gasto" href="javascript:void(0)"
                        wire:click="edit({{ $gasto->id }})" class="btn btn-warning"><span
                            class="icon icon-pencil"></span></a>
                    <a href="javascript:void(0)" onclick="deleteGasto({{ $gasto->id }})" class="btn btn-danger"><span
                            class="icon icon-bin"></span></a>
                </td>
            </tr>
        @endforeach
        @if (count($vale->gastos) <= 0)
            <tr>
                <td colspan="5" class="text-center font-weight-bold">
                    No se encontraron registros
                </td>
            </tr>
        @endif
    </tbody>
</table>
