<div class="tab-pane fade" id="vale-gastos" role="tabpanel" aria-labelledby="vale-gastos-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        VALE DE GASTOS
    </h5>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create_expense_modal">
        Agregar vale
    </button>
    <br><br>
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
                <th style="color:white;">
                    &nbsp;
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
                    <td>
                        <a data-toggle="modal" data-target="#show_expense_modal" type="button"
                            onclick="showExpense({{ $vale->id }})" class="btn btn-primary">
                            <span class="icon icon-eye"></span>
                        </a>
                        <a data-toggle="modal" data-target="#update_expense_modal" type="button"
                            onclick="editExpense({{ $vale->id }})" class="btn btn-warning">
                            <span class="icon icon-pencil"></span>
                        </a>
                        <a type="button" onclick="deleteExpense({{ $vale->id }},{{ $ticket->id }})"
                            class="btn btn-danger">
                            <span class="icon icon-bin"></span>
                        </a>
                    </td>
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
@include('ticket.expense.show')
@include('ticket.expense.create')
@include('ticket.expense.edit')
