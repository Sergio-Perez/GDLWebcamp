 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="img/icon.png"
           alt="GDLWebcamp Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GDLWebcamp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!-- <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info ">
                  
          <a href="#" class="d-block nombre"><?php echo $_SESSION["nombre"]; ?></a>
          <p class="p-colocar "><i class="far fa-circle color-verde"></i> Online</p>
        </div>
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <p class="nav-inicio">Menu de Administración</p>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">

            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
           
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Eventos
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-evento.php" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-evento.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Categoria Eventos
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-categorias.php" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-categorias.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Invitados
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-invitados.php" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-invitado.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Registrados
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-registro.php" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-registro.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>

          <?php if($_SESSION["nivel"] == 1):?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Administradores
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-admin.php" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-admin.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Testimoniales
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p> Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar </p>
                </a>
              
            </ul>
          </li>
          
         
      
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>