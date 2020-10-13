<?php 


include_once "templates/header.php";
include_once "templates/barraSuperior.php";


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Error de Pagina 404</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adminArea.php">Inicio</a></li>
              <li class="breadcrumb-item active">Error de Pagina 404</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Página no encontada.</h3>

          <p>
              Nosotros no encontrarmos la página que estas buscando.
            
            Mientras tanto, puedes <a href="adminArea.php">volver a inicio</a>.
          </p>

        
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include_once "templates/footer.php";



?>