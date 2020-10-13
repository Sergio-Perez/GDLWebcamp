$(document).ready(function() {
    $("#guardar-registro").on("submit", function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        console.log(datos);

        // Abriendo AJAX
        $.ajax({
            type: $(this).attr("method"),
            data: datos,
            url: $(this).attr("action"),
            dataType: "json",
            success: function(data) {
                var resultado = data;
                console.log(data);

                if (resultado.respuesta == "exito") {

                    Swal.fire(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                    )

                } else {
                    Swal.fire(
                        'Error!',
                        'Error al crear.',
                        'error'

                    )

                }
            }
        })
    });


    // se ejeciuta cuando hay un archivo
    $("#guardar-registro-archivo").on("submit", function(e) {
        e.preventDefault();

        var datos = new FormData(this);
        console.log(datos);

        // Abriendo AJAX
        $.ajax({
            type: $(this).attr("method"),
            data: datos,
            url: $(this).attr("action"),
            dataType: "json",
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
                var resultado = data;
                console.log(data);

                if (resultado.respuesta == "exito") {

                    Swal.fire(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                    )

                } else {
                    Swal.fire(
                        'Error!',
                        'Error al crear.',
                        'error'

                    )

                }
            }
        })
    });



    //Eliminar un registro

    $(".borrar_registro").on("click", function(e) {
        e.preventDefault();

        var id = $(this).attr("data-id");
        var tipo = $(this).attr("data-tipo");


        Swal.fire({
            title: '¿Estás Seguro?',
            text: "Un registro eliminado no se puede recuperar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, !Eliminar!',
            cancelButtonText: "Cancelar"

        }).then(function(result) {
            if (result) {

                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "eliminar"

                    },
                    url: "modelo-" + tipo + ".php",
                    success: function(data) {

                        var resultado = JSON.parse(data);

                        if (resultado.respuesta === "exito") {

                            Swal.fire(
                                'Eliminado!',
                                'Registro Eliminado',
                                'success'
                            )

                            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents("tr").remove();

                        } else {
                            Swal.fire(
                                'Error',
                                '!No se puedo Eliminar!',
                                'error'

                            )

                        }




                    }
                });

            } else {

                Swal.fire(
                    '¡Cancelado!',
                    'El administrador no se eliminó',
                    'error'
                )
            }
        });

    });


});