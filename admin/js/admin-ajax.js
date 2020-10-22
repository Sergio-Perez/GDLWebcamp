$(document).ready(function() {
    $("#guardar-registro").on("submit", function(r) {
        r.preventDefault();
        var e = $(this).serializeArray();
        console.log(e), $.ajax({
            type: $(this).attr("method"),
            data: e,
            url: $(this).attr("action"),
            dataType: "json",
            success: function(r) {
                var e = r;
                console.log(r), "exito" == e.respuesta ? Swal.fire("Correcto", "Se guardó correctamente", "success") : Swal.fire("Error!", "Error al crear.", "error")
            }
        })
    }), $("#guardar-registro-archivo").on("submit", function(r) {
        r.preventDefault();
        var e = new FormData(this);
        console.log(e), $.ajax({
            type: $(this).attr("method"),
            data: e,
            url: $(this).attr("action"),
            dataType: "json",
            contentType: !1,
            processData: !1,
            async: !0,
            cache: !1,
            success: function(r) {
                var e = r;
                console.log(r), "exito" == e.respuesta ? Swal.fire("Correcto", "Se guardó correctamente", "success") : Swal.fire("Error!", "Error al crear.", "error")
            }
        })
    }), $(".borrar_registro").on("click", function(r) {
        r.preventDefault();
        var e = $(this).attr("data-id"),
            t = $(this).attr("data-tipo");
        Swal.fire({
            title: "¿Estás Seguro?",
            text: "Un registro eliminado no se puede recuperar.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, !Eliminar!",
            cancelButtonText: "Cancelar"
        }).then(function(r) {
            r ? $.ajax({
                type: "post",
                data: {
                    id: e,
                    registro: "eliminar"
                },
                url: "modelo-" + t + ".php",
                success: function(r) {
                    var e = JSON.parse(r);
                    "exito" === e.respuesta ? (Swal.fire("Eliminado!", "Registro Eliminado", "success"), jQuery('[data-id="' + e.id_eliminado + '"]').parents("tr").remove()) : Swal.fire("Error", "!No se puedo Eliminar!", "error")
                }
            }) : Swal.fire("¡Cancelado!", "El administrador no se eliminó", "error")
        })
    })
});