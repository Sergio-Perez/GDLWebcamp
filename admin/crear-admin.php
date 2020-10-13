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
                    <h1>Crear Administrador
                        <span>Rellena el formulario para crear un administrador. </span>
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
                            <h3 class="card-title">Crear Administradores</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Tu Nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="usuario">Usuario: </label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Password: </label>
                                    <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password para Iniciar Sesión">
                                    <span id="resultado_password" class="help-block"></span>
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary"  id="agregar_registro_admin" >Añadir</button>
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