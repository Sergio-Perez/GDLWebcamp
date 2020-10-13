$(document).ready(function() {
    $("#login-admin").on("submit", function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        // Abriendo AJAX

        $.ajax({
            type: $(this).attr("method"),
            data: datos,
            url: $(this).attr("action"),
            dataType: "json",
            success: function(data) {

                console.log(data);
                var resultado = data;

                if (resultado.respuesta == "exitoso") {

                    Swal.fire(
                        'Login Correcto',
                        'Bienvenid@ ' + resultado.usuario + " se logueo correctamente.",
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = "adminArea.php";

                    }, 2000);
                } else {
                    Swal.fire(
                        'Error!',
                        'Usuario o Password Incorrectos o No Existe',
                        'error'
                    )
                }
            }
        })
    });

});