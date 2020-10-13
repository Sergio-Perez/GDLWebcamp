
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto" >
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown ">
       
        <a class="nav-link admin" data-toggle="dropdown" href="#">
        <p >Hola : <?php echo $_SESSION["nombre"]; ?></p>

        <!--<i class="fas fa-th-large"></i>-->
        </a>
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"style="background-color: #8ccae5;" >
          <a href="editar-admin.php?id=<?php echo $_SESSION["id"]; ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body" >
                <h3 class="dropdown-item-title">Ajustes</h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider "></div>

             <a href="login.php?cerrar_sesion=true" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <div class="media-body">

                         <h3 class="dropdown-item-title">Cerrar Sesión</h3>
                    </div>
                </div>
              </a>
            <!-- Message End -->
        </div>
     
      </li>
    </ul>
    