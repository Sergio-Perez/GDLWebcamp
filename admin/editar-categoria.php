<?php 
include_once "funciones/sesiones.php";

include_once "funciones/funciones.php";

$id = $_GET["id"];

 if(!filter_var($id, FILTER_VALIDATE_INT)){
     header("location:../404.html");
     exit();
 }


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
                    <h1>Editar Categorías de Eventos
                        <span>Rellena el formulario para editar una categoría de Evento. </span>
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
                            <h3 class="card-title">Editar Categoría.</h3>
                        </div>


                        <?php 
                        $sql = " SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                        $resultado = $conn->query($sql);
                        $categoria = $resultado->fetch_assoc();


                        
                        
                        ?>
                        
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre Categoria" value ="<?php echo $categoria["cat_evento"]?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Icono:</label>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <i class="fa fa-address-book"></i>
                                      </div>
                                      <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa_icon" value ="<?php echo $categoria["icono"]?>">
                                      
                                  </div>
                                </div>
         


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <input type="hidden" name="registro" value="actualizar">
                              <input type="hidden" name="id_registro" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-primary"  id="agregar_registro" >Guardar</button>
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