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
        
            <h1>Dashboard
              <small>Información sobre el evento</small>
            </h1>
        
      </div><!-- /.container-fluid -->

    </section>
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- LINE CHART -->
        <div class="container-fluid">
          <div class="col-12">
            <h3>Gráficas</h3>
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Datos de registros</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="grafica-registros" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                <!-- /.card-body -->
            </div><!--card-info-->
          </div>
        </div>
      </div>  
      
      <h2 class="page-header">Resumen de Registros</h2>
      <div class="row">
        <div class="col-lg-3 col-6">
          <?php 
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados";
                $resultado = $conn->query($sql);
                $registrados =$resultado->fetch_assoc();       
        
          ?>
            <!-- small card -->
            <div class="small-box bg-lightblue">
              <div class="inner">
                <h3><?php echo $registrados["registros"];?></h3>

                <p>Total Registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="lista-registro.php" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php 
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE  pagado = 1";
                $resultado = $conn->query($sql);
                $registrados =$resultado->fetch_assoc();       
        
          ?>
            <!-- small card -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $registrados["registros"];?></h3>

                <p>Total Pagados</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="lista-registro.php" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
          <?php 
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE  pagado = 0";
                $resultado = $conn->query($sql);
                $registrados =$resultado->fetch_assoc();       
        
          ?>
            <!-- small card -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $registrados["registros"];?></h3>

                <p>Total Sin Pagar</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
              <a href="lista-registro.php" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php 
                $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE  pagado = 1";
                $resultado = $conn->query($sql);
                $registrados =$resultado->fetch_assoc();       
        
          ?>
            <!-- small card -->
            <div class="small-box bg-olive ">
              <div class="inner">
                <h3>€ <?php echo (float)$registrados["ganancias"];?></h3>

                <p>Beneficios Totales</p>
              </div>
              <div class="icon">
                <i class="fas fa-euro-sign"></i>
              </div>
              <a href="lista-registro.php" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
      </div>
      <h2 class="page-header">Regalos</h2>
      <div class="row">
        <div class="col-lg-3 col-6">
            <?php 
                  $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE  pagado = 1";
                  $resultado = $conn->query($sql);
                  $regalo =$resultado->fetch_assoc();       
          
            ?>
              <!-- small card -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo $regalo["pulseras"];?></h3>

                  <p>Pulseras</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registro.php" class="small-box-footer">
                  Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <?php 
                  $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE  pagado = 2";
                  $resultado = $conn->query($sql);
                  $regalo =$resultado->fetch_assoc();       
          
            ?>
              <!-- small card -->
              <div class="small-box bg-fuchsia">
                <div class="inner">
                  <h3><?php echo $regalo["etiquetas"];?></h3>

                  <p>Etiquetas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registro.php" class="small-box-footer">
                  Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <?php 
                  $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE  pagado = 3";
                  $resultado = $conn->query($sql);
                  $regalo =$resultado->fetch_assoc();       
          
            ?>
              <!-- small card -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3><?php echo $regalo["plumas"];?></h3>

                  <p>Plumas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registro.php" class="small-box-footer">
                  Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            
            


      </div>


    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
include_once "templates/footer.php";



?>


