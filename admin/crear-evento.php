<?php 
include_once "funciones/sesiones.php";

include_once "funciones/funciones.php";

include_once "templates/header.php";
include_once "templates/barraSuperior.php";
include_once "templates/navegacion.php";


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Evento
                        <span>Rellena el formulario para crear un Evento. </span>
                    </h1>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">

                <!-- Default box -->

                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Crear Evento</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" name="guardar-registro_evento" id="guardar-registro" method="post" action="modelo-evento.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Título Evento:</label>
                                    <input type="text" class="form-control " id="titulo_evento" name="titulo_evento" placeholder="Título del Evento">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Categoría: </label>
                                    <select name="categoria_evento" class="form-control select2">
                                        <option value="0">-- Seleccione --</option>
                                            <?php 
                                            try {
                                                $sql = " SELECT * FROM categoria_evento ";
                                                $resultado = $conn->query($sql);
                                                while($cat_evento = $resultado->fetch_assoc()){?>
                                                    <option value="<?php echo $cat_evento["id_categoria"];?>">
                                                        <?php echo $cat_evento["cat_evento"];?>
                                                        </option>


                                              <?php  }
                                            } catch (\Exception $e) {
                                                echo "Error" . $e->getMessage();
                                            }  ?>

                                    </select>                         
                               </div>                              
                                <div class="form-group">

                                    <label>Fecha Evento:</label>
                                    <div class="input-group date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="reservationdate" data-target="#reservationdate" name="reservationdate" />

                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        
                                                                                    </pre>
                                    </div>
                                </div>
                                    <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Hora:</label>

                                        <div class="input-group date" id="timepicker" data-target-input="nearest" >
                                            <input type="text" class="form-control datetimepicker-input" name="hora_evento" data-target="#timepicker"/>
                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">

                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.input group -->
                             
                                 <div class="form-group">
                                    <label for="nombre">Invitado o Ponente: </label>
                                    <select name="invitado" class="form-control select2">
                                        <option value="0">-- Seleccione --</option>
                                            <?php 
                                            try {
                                                $sql = " SELECT invitados_id , nombre_invitado, apellido_invitado FROM  invitados";
                                                $resultado = $conn->query($sql);
                                                while($invitados = $resultado->fetch_assoc()){?>
                                                    <option value="<?php echo $invitados["invitados_id"];?>">
                                                        <?php echo $invitados["nombre_invitado"] . "  " . $invitados["apellido_invitado"] ?>
                                                    </option>


                                              <?php  }
                                            } catch (\Exception $e) {
                                                echo "Error" . $e->getMessage();
                                            }  ?>

                                    </select>                         
                               </div>  

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary" >Añadir</button>
                            </div>
                         
                            </form>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    </div>

</div>
<!-- /.content-wrapper -->

<?php 

include_once "templates/footer.php";

?>