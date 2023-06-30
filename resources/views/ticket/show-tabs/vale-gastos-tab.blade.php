<div class="tab-pane fade" id="vale-gastos" role="tabpanel" aria-labelledby="vale-gastos-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        VALE DE GASTOS
    </h5>
    <table style="width:100%">
        <thead>
            <tr style="background-color:#60b22f">
                <th style="color:white;">
                    CONCEPTO
                </th>
                <th style="color:white;">
                    RESPONSABLE
                </th>
                <th style="color:white;">
                    CANTIDAD
                </th>
                <th style="color:white;">
                    DETALLES
                </th>
                <th style="color:white;">
                    ESTATUS
                </th>
            </tr>
        </thead>
        <tbody id="tbody_expense">
            @foreach ($ticket->vales as $vale)
                <tr>
                    <td>{{ $vale->concepto->concepto }}</td>
                    <td>{{ $vale->responsable->name }}</td>
                    <td>${{ $vale->cantidad }}</td>
                    <td>{{ $vale->detalle }}</td>
                    <td>{{ $vale->status }}</td>
                </tr>
            @endforeach
            @if (count($ticket->vales) <= 0)
                <tr>
                    <td class="text-center" colspan="6">No ha información para mostrar</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
