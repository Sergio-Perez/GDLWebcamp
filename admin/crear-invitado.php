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
                    <h1>Crear Invitado.
                        <span>Rellena el formulario para crear un invitado. </span>
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
                            <h3 class="card-title">Crear Invitado.</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctyoe="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre_invitado">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado"placeholder="Nombre del Invitado">
                                </div>                 
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="apellido_invitado">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado"placeholder="Apellidos del Invitado">
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="biografia_invitado">Biografía:</label>
                                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="8" placeholder="Biografia"></textarea>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="imagen_invitado">Elija una Imagen: </label></br>
                                    <input type="file"   id="imagen_invitado" name="archivo_imagen" accept="image/png, image/jpeg">
                                 </div>
                            </div>                                         
                           
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary"  id="agregar_registro" >Añadir</button>
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