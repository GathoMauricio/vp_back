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
                let html = "<option value>Seleccione una opción</option>";
                let counter = 0;
                $.each(JSON.parse(data), function (index, item) {
                    counter++;
                    html +=
                        "<option value='" +
                        item.id +
                        "'>" +
                        item.name +
                        "</option>";
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
