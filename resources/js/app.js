require("./bootstrap");

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $(".select2").select2({ theme: "classic" });

    if ($("#dashboard_table").length) {
        crearDatatable("dashboard_table");
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
