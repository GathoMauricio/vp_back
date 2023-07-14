require("./bootstrap");

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $(".select2").select2({ theme: "classic" });
    if ($("#dashboard_table").length) {
        crearDatatable("dashboard_table");
    }
    if ($("#user_table").length) {
        crearDatatable("user_table");
    }
});
window.successNotification = (text) => alertify.success(text);
window.infoNotification = (text) => alertify.message(text);
window.warningNotification = (text) => alertify.warning(text);
window.errorNotification = (text) => alertify.error(text);
function crearDatatable(table_id) {
    $("#" + table_id).DataTable({
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            info: "", //"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "", //"Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            sSearch: "Buscar:",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            sProcessing: "Procesando...",
        },
        //para usar los botones
        responsive: "true",
        dom: "Bfrtilp",
        buttons: [
            {
                extend: "excelHtml5",
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: "Exportar a Excel",
                className: "btn btn-success",
            },
            {
                extend: "pdfHtml5",
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: "Exportar a PDF",
                className: "btn btn-danger",
            },
            {
                extend: "print",
                text: '<i class="fa fa-print"></i> ',
                titleAttr: "Imprimir",
                className: "btn btn-info",
            },
        ],
    });
}
window.loadUsersByClient = (client_id) => {
    if (client_id.length > 0) {
        $.ajax("/api/load_users_by_client/" + client_id)
            .done(function (data) {
                console.log(data);
                let html = "<option value>Seleccione una opción</option>";
                let counter = 0;
                $.each(JSON.parse(data), function (index, item) {
                    counter++;
                    html +=
                        "<option value='" +
                        item.id +
                        "'>" +
                        item.name +
                        " " +
                        item.apellido;
                    ("</option>");
                });
                $("#usuario_id").html(html);
                if (counter > 0) {
                    infoNotification("Los usuarios se cargaron correctamente.");
                } else {
                    warningNotification(
                        "No se han registrado usuarios a este cliente, por favor verifíquelo y vuelva a intentarlo."
                    );
                    $("#area").val("");
                    $("#telefono").val("");
                    $("#email").val("");
                    $("#direccion").val("");
                }
            })
            .fail(function (err) {
                console.log("error: " + JSON.stringify(err));
            });
    } else {
        $("#usuario_id").html("<option value>Seleccione un cliente</option>");
        $("#area").val("");
        $("#telefono").val("");
        $("#email").val("");
        $("#direccion").val("");
    }
};
window.loadUserData = (user_id) => {
    if (user_id.length > 0) {
        $.ajax("/api/load_user_data/" + user_id)
            .done(function (data) {
                console.log(data);
                const json = JSON.parse(data);
                $("#area").val(json.area);
                $("#telefono").val(json.telefono);
                $("#email").val(json.email);
                $("#direccion").val(json.direccion);
            })
            .fail(function (err) {
                console.log("error: " + JSON.stringify(err));
            });
    } else {
        $("#area").val("");
        $("#telefono").val("");
        $("#email").val("");
        $("#direccion").val("");
    }
};
window.loadUsersByClientOnEdit = (client_id, current_id) => {
    $.ajax("/api/load_users_by_client/" + client_id)
        .done(function (data) {
            let html = "<option value>Seleccione una opción</option>";
            let counter = 0;
            $.each(JSON.parse(data), function (index, item) {
                counter++;
                if (item.id == current_id)
                    html +=
                        "<option value='" +
                        item.id +
                        "' selected>" +
                        item.name +
                        "</option>";
                else
                    html +=
                        "<option value='" +
                        item.id +
                        "'>" +
                        item.name +
                        "</option>";
            });
            $("#usuario_id").html(html);
        })
        .fail(function (err) {
            console.log("error: " + JSON.stringify(err));
        })
        .always(function () {
            $.ajax("/api/load_user_data/" + current_id)
                .done(function (data) {
                    const json = JSON.parse(data);
                    $("#area").val(json.area);
                    $("#telefono").val(json.telefono);
                    $("#email").val(json.email);
                    $("#direccion").val(json.direccion);
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                });
        });
};
let countServiceType = 0;
window.addServiceType = () => {
    let tipo = $("#cbo_tipo_servicio").val();
    let detalle = $("#detalle_tipo_servicio").val();
    if (countServiceType <= 0) $("#tbody_service_types").html("");
    $("#tbody_service_types").append(`
        <tr id="tr_service_type_${countServiceType}">
            <td>
                <input value="${tipo}" type="text" name="tipo[]" class="form-control" readonly />
            </td>
            <td>
                <input value="${detalle}"  type="text" name="detalle[]" class="form-control" readonly />
            </td>
            <td>
                <button onclick="removeServiceType(${countServiceType})" type="button" class="btn btn-danger"><span class="icon icon-minus"></span></button>
            </td>
        </tr>`);
    countServiceType++;
    $("#detalle_tipo_servicio").val("");
};
window.removeServiceType = (service_type_id) => {
    countServiceType--;
    $("#tr_service_type_" + service_type_id).remove();
    if (countServiceType <= 0)
        $("#tbody_service_types").html(
            `<tr>
            <td class="text-center" colspan="3">No se han agregado tipos de servicio</td>
        </tr>`
        );
};
window.deleteUser = (user_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            $.ajax({
                url: "/delete/user",
                method: "POST",
                data: {
                    user_id: user_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "DELETE",
                },
            })
                .done(function (data) {
                    console.log(data);
                    alert("Usuario eliminado.");
                    window.location.reload();
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.deleteClient = (client_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            $.ajax({
                url: "/delete/client",
                method: "POST",
                data: {
                    client_id: client_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "DELETE",
                },
            })
                .done(function (data) {
                    console.log(data);
                    alert("Cliente eliminado.");
                    window.location.reload();
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.deleteClientUser = (user_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            $.ajax({
                url: "/delete/client_user",
                method: "POST",
                data: {
                    user_id: user_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "DELETE",
                },
            })
                .done(function (data) {
                    console.log(data);
                    alert("Usuario eliminado.");
                    window.location.reload();
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.deleteTicket = (ticket_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            $.ajax({
                url: "/delete/ticket",
                method: "POST",
                data: {
                    ticket_id: ticket_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "DELETE",
                },
            })
                .done(function (data) {
                    console.log(data);
                    alert("Ticket eliminado.");
                    window.location.reload();
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.cancelTicket = (ticket_id, ticket) => {
    alertify.prompt(
        "Aviso",
        "¿Realmente desea cancelar el ticket " +
            ticket +
            "?\nIngrese el motivo...",
        "",
        function (e, reason) {
            if (reason.length > 0) {
                $.ajax({
                    url: "/cancel/ticket",
                    method: "POST",
                    data: {
                        ticket_id: ticket_id,
                        motivo_cancelacion: reason,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        _method: "PUT",
                    },
                })
                    .done(function (data) {
                        console.log(data);
                        alert("Ticket cancelado.");
                        window.location = "/dashboard";
                    })
                    .fail(function (err) {
                        console.log("error: " + JSON.stringify(err));
                        errorNotification("Error al procesar.");
                    });
            } else {
                e.cancel = true;
            }
        },
        function () {
            return;
        }
    );
};
window.changeTicketStatus = (ticket_id, status_id) => {
    alertify.confirm(
        "Atención",
        "¿Cambiar estatus?",
        function () {
            $.ajax({
                url: "/change_status/ticket",
                method: "POST",
                data: {
                    ticket_id: ticket_id,
                    status_id: status_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "PUT",
                },
            })
                .done(function (data) {
                    console.log(data);
                    alert("Estatus actualizado.");
                    window.location.reload();
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.loadSepomex = (cp) => {
    if (cp.length > 0) {
        $.ajax({
            url: "/api/load_sepomex/" + cp,
            method: "GET",
            data: {
                cp: cp,
            },
        })
            .done(function (data) {
                console.log(data);
                let html = ``;
                let counter = 0;
                $.each(JSON.parse(data), function (index, item) {
                    counter++;
                    html +=
                        "<option value='" +
                        item.id +
                        "'>" +
                        item.asentamiento +
                        "</option>";
                });
                $("#asentamiento").html(html);
                if (counter <= 0) {
                    $("#asentamiento").html("");
                    $("#ciudad").val("");
                    $("#municipio").val("");
                } else {
                    $("#ciudad").val(JSON.parse(data)[0].ciudad);
                    $("#municipio").val(JSON.parse(data)[0].municipio);
                }
            })
            .fail(function (err) {
                console.log("error: " + JSON.stringify(err));
            });
    }
};
window.cotizarProducto = (value) => {
    if (value == "SI") {
        $("#especifique_cotizar_producto").css("display", "block");
    } else {
        $("#especifique_cotizar_producto").css("display", "none");
        $("#especifique_cotizar_producto").val("");
    }
};
window.storeExpence = () => {
    $.ajax({
        url: "/store/expense_voucher",
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            ticket_id: $("#expense_ticket_id").val(),
            provider_id: $("#expense_provider_id").val(),
            concept_id: $("#expense_concept_id").val(),
            responsable_id: $("#expense_responsable_id").val(),
            autoriza_id: $("#expense_autoriza_id").val(),
            recibe_id: $("#expense_recibe_id").val(),
            status: $("#expense_estatus").val(),
            cantidad: $("#expense_cantidad").val(),
            motivo_visita: $("#expense_motivo_visita").val(),
            detalle: $("#expense_detalle").val(),
        },
    })
        .done(function (data) {
            const json = JSON.parse(data);
            if (json.error <= 0) {
                successNotification("Registro almacenado");
                $("#expense_provider_id").val("");
                $("#expense_concept_id").val("");
                $("#expense_responsable_id").val("");
                $("#expense_autoriza_id").val("");
                $("#expense_recibe_id").val("");
                $("#expense_estatus").val("");
                $("#expense_cantidad").val("");
                $("#expense_motivo_visita").val("");
                $("#expense_detalle").val("");
                $("#btn_dismiss_modal_expense").click();

                let html = ``;
                $.each(json.data, function (index, item) {
                    html += `
                    <tr>
                    <td>${item.concepto}</td>
                    <td>${item.responsable}</td>
                    <td>$ ${item.cantidad}</td>
                    <td>${item.detalle}</td>
                    <td>${item.estatus}</td>
                    <td>
                         <a data-toggle="modal" data-target="#show_expense_modal" type="button"
                            onclick="showExpense(${item.id})" class="btn btn-primary">
                            <span class="icon icon-eye"></span>
                        </a>
                         <a data-toggle="modal" data-target="#update_expense_modal" type="button"
                            onclick="editExpense(${item.id})" class="btn btn-warning">
                            <span class="icon icon-pencil"></span>
                         </a>
                         <a type="button" onclick="deleteExpense(${item.id},${item.ticket_id})" class="btn btn-danger">
                            <span class="icon icon-bin"></span>
                         </a>
                    </td>
                </tr>
                    `;
                });
                $("#tbody_expense").html(html);
            }
        })
        .fail(function (err) {
            console.log("error: " + JSON.stringify(err));
        });
};
window.showExpense = (id) => {
    $.ajax({
        url: "/show/expense_voucher",
        method: "GET",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            id: id,
        },
    })
        .done(function (data) {
            console.log(data);
            const json = JSON.parse(data);
            $("#show_expense_provider_id").val(json.proveedor);
            $("#show_expense_concept_id").val(json.concepto);
            $("#show_expense_responsable_id").val(json.responsable);
            $("#show_expense_autoriza_id").val(json.autoriza);
            $("#show_expense_recibe_id").val(json.recibe);
            $("#show_expense_estatus").val(json.estatus);
            $("#show_expense_cantidad").val(json.cantidad);
            $("#show_expense_motivo_visita").val(json.motivo_visita);
            $("#show_expense_detalle").val(json.detalle);
        })
        .fail(function (err) {
            console.log("error: " + JSON.stringify(err));
        });
};
window.editExpense = (id) => {
    $("#edit_expense_vale_id").val(id);
    $.ajax({
        url: "/get/expense_voucher",
        method: "GET",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            id: id,
        },
    })
        .done(function (data) {
            const json = JSON.parse(data);
            $("#edit_expense_provider_id").val(json.provider_id);
            $("#edit_expense_concept_id").val(json.concept_id);
            $("#edit_expense_responsable_id").val(json.id);
            $("#edit_expense_autoriza_id").val(json.autoriza_id);
            $("#edit_expense_recibe_id").val(json.recibe_id);
            $("#edit_expense_estatus").val(json.status);
            $("#edit_expense_cantidad").val(json.cantidad);
            $("#edit_expense_motivo_visita").val(json.motivo_visita);
            $("#edit_expense_detalle").val(json.detalle);
        })
        .fail(function (err) {
            console.log("error: " + JSON.stringify(err));
        });
};
window.updateExpense = (ticket_id) => {
    $.ajax({
        url: "/update/expense_voucher",
        method: "PUT",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            id: $("#edit_expense_vale_id").val(),
            ticket_id: ticket_id,
            provider_id: $("#edit_expense_provider_id").val(),
            concept_id: $("#edit_expense_concept_id").val(),
            responsable_id: $("#edit_expense_responsable_id").val(),
            autoriza_id: $("#edit_expense_autoriza_id").val(),
            recibe_id: $("#edit_expense_recibe_id").val(),
            status: $("#edit_expense_estatus").val(),
            cantidad: $("#edit_expense_cantidad").val(),
            motivo_visita: $("#edit_expense_motivo_visita").val(),
            detalle: $("#edit_expense_detalle").val(),
        },
    })
        .done(function (data) {
            const json = JSON.parse(data);
            if (json.error <= 0) {
                successNotification("Registro actualizado");
                $("#expense_provider_id").val("");
                $("#expense_concept_id").val("");
                $("#expense_responsable_id").val("");
                $("#expense_autoriza_id").val("");
                $("#expense_recibe_id").val("");
                $("#expense_estatus").val("");
                $("#expense_cantidad").val("");
                $("#expense_motivo_visita").val("");
                $("#expense_detalle").val("");
                $("#btn_dismiss_modal_expense").click();

                let html = ``;
                $.each(json.data, function (index, item) {
                    html += `
                    <tr>
                    <td>${item.concepto}</td>
                    <td>${item.responsable}</td>
                    <td>$ ${item.cantidad}</td>
                    <td>${item.detalle}</td>
                    <td>${item.estatus}</td>
                    <td>
                        <a data-toggle="modal" data-target="#show_expense_modal" type="button"
                            onclick="showExpense(${item.id})" class="btn btn-primary">
                            <span class="icon icon-eye"></span>
                        </a>
                        <a data-toggle="modal" data-target="#update_expense_modal" type="button"
                            onclick="editExpense(${item.id})" class="btn btn-warning">
                            <span class="icon icon-pencil"></span>
                        </a>
                        <a type="button" onclick="deleteExpense(${item.id},${ticket_id})" class="btn btn-danger">
                            <span class="icon icon-bin"></span>
                        </a>
                    </td>
                </tr>
                    `;
                });
                $("#tbody_expense").html(html);
                $("#btn_dismiss_modal_edit_expense").click();
            }
        })
        .fail(function (err) {
            console.log("error: " + JSON.stringify(err));
        });
};
window.deleteExpense = (id, ticket_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            $.ajax({
                url: "/delete/expense_voucher",
                method: "POST",
                data: {
                    id: id,
                    ticket_id: ticket_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    _method: "DELETE",
                },
            })
                .done(function (data) {
                    const json = JSON.parse(data);
                    if (json.error <= 0) {
                        successNotification("Registro actualizado");
                        $("#expense_provider_id").val("");
                        $("#expense_concept_id").val("");
                        $("#expense_responsable_id").val("");
                        $("#expense_autoriza_id").val("");
                        $("#expense_recibe_id").val("");
                        $("#expense_estatus").val("");
                        $("#expense_cantidad").val("");
                        $("#expense_motivo_visita").val("");
                        $("#expense_detalle").val("");
                        $("#btn_dismiss_modal_expense").click();

                        let html = ``;
                        $.each(json.data, function (index, item) {
                            html += `
                            <tr>
                            <td>${item.concepto}</td>
                            <td>${item.responsable}</td>
                            <td>$ ${item.cantidad}</td>
                            <td>${item.detalle}</td>
                            <td>${item.estatus}</td>
                            <td>
                                <a data-toggle="modal" data-target="#show_expense_modal" type="button"
                                    onclick="showExpense(${item.id})" class="btn btn-primary">
                                    <span class="icon icon-eye"></span>
                                </a>
                                <a data-toggle="modal" data-target="#update_expense_modal" type="button"
                                    onclick="editExpense(${item.id})" class="btn btn-warning">
                                    <span class="icon icon-pencil"></span>
                                </a>
                                <a type="button" onclick="deleteExpense(${item.id},${ticket_id})" class="btn btn-danger">
                                    <span class="icon icon-bin"></span>
                                </a>
                            </td>
                        </tr>
                            `;
                        });
                        $("#tbody_expense").html(html);
                        $("#btn_dismiss_modal_edit_expense").click();
                    }
                })
                .fail(function (err) {
                    console.log("error: " + JSON.stringify(err));
                    errorNotification("Error al procesar.");
                });
        },
        function () {}
    );
};
window.deleteVale = (vale_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            Livewire.emit("destroy", "vale", vale_id);
        },
        function () {}
    );
};

window.deleteGasto = (gasto_id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            Livewire.emit("destroy", "gasto", gasto_id);
        },
        function () {}
    );
};

window.deleteConcepto = (id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            Livewire.emit("destroy", id);
        },
        function () {}
    );
};
window.deleteProveedor = (id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            Livewire.emit("destroy", id);
        },
        function () {}
    );
};
window.deleteTipoServicio = (id) => {
    alertify.confirm(
        "Atención",
        "¿Eliminar registro?",
        function () {
            Livewire.emit("destroy", id);
        },
        function () {}
    );
};

//##############Livewire Functions###################
Livewire.on("successNotification", (text) => {
    alertify.success(text);
});
Livewire.on("errorNotification", (text) => {
    alertify.error(text);
});

Livewire.on("dismissCreateVale", () => {
    $("#dismissCreateVale").click();
});

Livewire.on("dismissEditVale", () => {
    $("#dismissEditVale").click();
});

Livewire.on("dismissCreateGasto", () => {
    $("#dismissCreateGasto").click();
});

Livewire.on("dismissEditGasto", () => {
    $("#dismissEditGasto").click();
});
