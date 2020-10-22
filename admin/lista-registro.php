<?php 
include_once "funciones/sesiones.php";
include_once "funciones/funciones.php";

include_once "templates/header.php";
include_once "templates/barraSuperior.php";
include_once "templates/navegacion.php";


?>


 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Usuarios Registrados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adminArea.php">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios Registrados</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los usuarios Registarados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Fecha Registro</th>
                   <th>Articulos</th>
                   <th>Talleres</th>
                   <th>Regalo</th>
                   <th>Total Pagado</th>
                   <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try {
                          $sql = " SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                          $sql .= " JOIN regalos ";
                          $sql .= " ON registrados.regalo = regalos.id_regalo";
                         
                          $resultado = $conn->query($sql);
                      } catch (\Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while($registrados = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td> <?php echo $registrados["nombre_registrado"] . " " .  $registrados["apellido_registrado"]; 
                         
                              $pagado = $registrados["pagado"];
                              if($pagado){
                                echo   '</br> <span class="badge bg-green"> Pagado </span>';

                              } else {
                                echo ' </br> <span class="badge bg-red"> No Pagado </span>';
                              }
                        ?>
                        </td>
                        <td><?php echo $registrados["email_registrado"]; ?></td>
                        <td><?php echo $registrados["fecha_registro"]; ?></td>
                        <td>
                          <?php
                           $articulos = json_decode($registrados["pases_articulos"],true); 

                           $arreglo_articulos= array ( 
                             "un_dia" => "Pase 1 Día",
                             "pase_dias" => "Pase 2 días",
                             "pase_completo" => "Pase completo",
                             "camisas" => "Camisas",
                             "etiquetas" => "Etiquetas" 
                           );
                           foreach($articulos as $llave => $articulo){
                             if(array_key_exists("cantidad", $articulo)){
                              echo  $articulo["cantidad"] . " " . $arreglo_articulos[$llave] . "</br>";

                             }else{
                                    echo  $articulo . " " . $arreglo_articulos[$llave] . "</br>";
                                  }
                           }
                         ?>
                        </td>
                        <td >
                            <?php                           
                                $eventos_resultado = $registrados["talleres_registrados"]; 
                                $talleres = json_decode($eventos_resultado ,true);

                                $talleres = implode("', '", $talleres["eventos"]);

                                $sql_talleres = " SELECT nombre_evento, fecha_evento , hora_evento  FROM eventos WHERE clave IN ('$talleres')  OR evento_id IN ('$talleres')";

                                $resultado_talleres = $conn->query($sql_talleres);

                                while($eventos = $resultado_talleres->fetch_assoc()){
                                    //var_dump( $eventos);
                                    echo $eventos["nombre_evento"] . " " .  "<span class='horas'>" . $eventos["fecha_evento"] . " " .  $eventos["hora_evento"] . "</span>". "<br>";
                                }
                                

                                
                            ?>
                        </td>
                        <td><?php echo $registrados["nombre_regalo"]; ?></td>
                        <td> € <?php echo (float) $registrados["total_pagado"]; ?></td>
                        <td> 
                          <a href="editar-registro.php?id=<?php echo $registrados["ID_Registrado"]; ?>" class="btn bg-orange btn-flat margin">
                            <i class="fas fa-pencil-alt" style="color:white;"></i>
                          </a>
                          
                          <a href="#"data-id="<?php echo $registrados["ID_Registrado"]; ?>" data-tipo="registrado" class="btn bg-maroon margin borrar_registro">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>   






                      </tr>

                     <?php } ?>
                  </tbody>
                  
                  <tfoot>
                  <tr>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Fecha Registro</th>
                   <th>Articulos</th>
                   <th>Talleres</th>
                   <th>Regalo</th>
                   <th>Total Pagado</th>
                   <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php 
include_once "templates/footer.php";



?>


