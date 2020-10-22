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


    //-------------
    //- LINE CHART -
    //--------------
    var URLactual = window.location;
    if (URLactual == "http://localhost:8081/GDLWebcamp-produccion/admin/dashboard.php") {
        $.getJSON('servicio-registrados.php', function(data) {
            console.log(data);
            var fecha_registro = [];
            var cantidad_registro = [];

            for (var i = 0; i < data.length; i++) {
                fecha_registro[i] = data[i].fecha;
                cantidad_registro[i] = data[i].cantidad;
            }

            console.log(fecha_registro);

            console.log(cantidad_registro);

            var areaChartData = {
                labels: fecha_registro,
                datasets: [{
                    label: 'Registrados',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: true,
                    pointColor: '#FFFFFF',
                    pointStrokeColor: '#FFFFFF',
                    pointRadius: '3',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: '#FFFFFF',
                    data: cantidad_registro
                }]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                        },
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }

            var lineChartCanvas = $('#grafica-registros').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            /* lineChartData.datasets[1].fill = false; */
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

        })
    }
});