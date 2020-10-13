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
                    <h1>Crear Categorías de Eventos
                        <span>Rellena el formulario para crear una categoría de Evento. </span>
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
                            <h3 class="card-title">Crear Categoría.</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria"placeholder="Nombre Categoria">
                                </div>
                                <div class="form-group">
                                  <label for="">Icono:</label>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <i class="fa fa-address-book"></i>
                                      </div>
                                      <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa_icon">
                                      
                                  </div>
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