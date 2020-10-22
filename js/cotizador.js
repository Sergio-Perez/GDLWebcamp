(function() {
    "use strict";



    var regalo = document.getElementById("regalo");


    document.addEventListener("DOMContentLoaded", function() {



        // Campos Datos Usuario
        var nombre = document.getElementById("nombre");
        var apellido = document.getElementById("apellido");
        var email = document.getElementById("email");
        // Campos Pases
        var pase_dia = document.getElementById("pase_dia");
        var pase_dosdias = document.getElementById("pase_dosdias");
        var pase_completo = document.getElementById("pase_completo");

        // Botones y divs
        var calcular = document.getElementById("calcular");
        var errorDiv = document.getElementById("error");
        var lista_productos = document.getElementById("lista-productos");
        var botonRegistro = document.getElementById("btnRegistro");
        var suma = document.getElementById("suma-total");

        // Extras 
        var camisas = document.getElementById("camisa_evento");
        var etiquetas = document.getElementById("etiquetas");

        //   botonRegistro.hidden = true; Otra opción ocultar boton
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/') + 1);
        // Error
        var errorDiv = document.getElementById('error');

        if (filename == "registro.php" || filename == "crear-registro.php") {
            botonRegistro.style.visibility = "hidden";
            //botonRegistro.disabled = true;
        }


        if (document.getElementById("calcular")) {

            calcular.addEventListener("click", calcularMontos);

            pase_dia.addEventListener("blur", mostrarDias);
            pase_dosdias.addEventListener("blur", mostrarDias);
            pase_completo.addEventListener("blur", mostrarDias);

            nombre.addEventListener("blur", validarCampos);
            apellido.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarMail);

            var formulario_editado = document.getElementsByClassName("editar-registrado");
            if (formulario_editado.length > 0) {
                if (pase_dia.value || pase_dosdias.value || pase_completo.value) {
                    mostrarDias();
                }
            }

            function validarMail() {
                if (this.value.indexOf("@") > -1) {

                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc";
                } else {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Debe tener almenos una @";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red"
                }
            }



            function validarCampos() {
                if (this.value == "") {

                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Este campo es obligatorio";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red"

                } else {
                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc";
                }
            }

            function calcularMontos() {
                event.preventDefault();
                if (regalo.value === "") {
                    alert("Debes elegir un regalo");
                    regalo.focus();
                } else {

                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisa = parseInt(camisas.value, 10) || 0,
                        cantEtiqueta = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = (boletosDia * 30) + (boletos2Dias * 40) + (boletoCompleto * 50) + ((cantCamisa * 10) * .93) + (cantEtiqueta * 2);

                    var listadoProductos = [];

                    if (boletosDia > 0) {
                        listadoProductos.push(boletosDia + " Pases por día");
                    }
                    if (boletoCompleto > 0) {
                        listadoProductos.push(boletoCompleto + " Pases Completos");
                    }
                    if (boletos2Dias > 0) {
                        listadoProductos.push(boletos2Dias + " Pases por dos día");
                    }


                    if (cantCamisa > 0) {
                        listadoProductos.push(cantCamisa + " Camisas");
                    }
                    if (cantEtiqueta > 0) {
                        listadoProductos.push(cantEtiqueta + " Etiquetas");
                    }


                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = "";

                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + "<br/>";
                    }
                    suma.innerHTML = "$ " + totalPagar.toFixed(2);

                    //botonRegistro.style.visibility = "visible"; Otra opción mostrar boton
                    //botonRegistro.hidden = false;
                    botonRegistro.style.visibility = "visible";
                    //botonRegistro.disabled = false;

                    document.getElementById("total_pedido").value = totalPagar;

                }
            }

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                    console.log(diasElegidos);
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                    console.log(diasElegidos);
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push("viernes", "sabado", "domingo");
                    console.log(diasElegidos);
                }
                for (var i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }

        }
    }); // DOM CONTENT LOADED
})();