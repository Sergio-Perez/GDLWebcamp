$(function() {



    $('#registros').DataTable({
        "paging": true,
        "pageLenght": 10,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,

        "language": {
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
                last: "Ültimo",
                first: "Primero"
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ resultados",
            emptyTable: "No hay resultado para la busqueda",
            infoEmpty: "0  Registros",
            search: "Buscar: "
        }
    });

    $("#agregar_registro_admin").attr("disabled", true);

    $("#repetir_password").on("input", function() {
        var password_nuevo = $("#password").val();
        var password = $("#password");
        var campo_repetir_password = $('#repetir_password');

        campo_repetir_password.removeClass("is-valid is-invalid");
        $("input#password").parents(".form-group").removeClass("color-verde color-rojo");
        $("#resultado_password").parents(".form-group").removeClass("color-verde color-rojo");

        password.removeClass("is-valid is-invalid");


        if ($(this).val() == password_nuevo) {
            $("#resultado_password").text("Correcto");

            password.addClass("is-valid");

            campo_repetir_password.addClass('is-valid');
            $("#resultado_password").parents(".form-group").addClass("color-verde");
            $("input#password").parents(".form-group").addClass("color-verde");
            $("#agregar_registro").attr("disabled", false);




        } else {
            $("#resultado_password").text("No coincide el password");

            password.addClass("is-invalid");

            campo_repetir_password.addClass('is-invalid');
            $("#resultado_password").parents(".form-group").addClass("color-rojo");
            $("input#password").parents(".form-group").addClass("color-rojo");




        }

    })

    // Date Time Picker
    $('#reservationdate').datetimepicker({
        format: "D/M/Y",


    });

    $('#timepicker').datetimepicker({
        format: "HH:mm:ss"
    });

    $('#icono').iconpicker();
    $("div.iconpicker-popover").removeClass('fade');

});