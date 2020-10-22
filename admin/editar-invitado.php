<?php 
    $id = $_GET["id"];

    if(!filter_var($id, FILTER_VALIDATE_INT)){
        header("location:../404.html");
        exit();
    }
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
                    <h1>Editar Invitado.
                        <span>Rellena el formulario para editar un invitado. </span>
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
                            <h3 class="card-title">Editar Invitado.</h3>
                        </div>
                        <?php 
                        $sql =" SELECT * FROM invitados WHERE invitados_id = $id";
                        $resultado = $conn->query($sql);
                        $invitado = $resultado->fetch_assoc();
                       
                        ?>
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctyoe="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre_invitado">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" value="<?php echo $invitado["nombre_invitado"]; ?>" placeholder="Nombre del Invitado">
                                </div>                 
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="apellido_invitado">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" value="<?php echo $invitado["apellido_invitado"]; ?>" placeholder="Apellido del Invitado" >
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="biografia_invitado">Biografía:</label>
                                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="8"  placeholder="Biografía del Invitado"><?php echo $invitado["descripcion"];?></textarea>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="imagen_actual">Imagen Actual:</label>
                                    <br>
                                    <img src="../img/invitados/<?php echo $invitado["url_imagen"]; ?>" width="300" high="300" >

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
                              <input type="hidden" name="registro" value="actualizar">
                              <input type="hidden" name="id_registro" value="<?php echo $invitado['invitados_id']?>";>
                                <button type="submit" class="btn btn-primary"  id="crear_registro" >Guardar</button>
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