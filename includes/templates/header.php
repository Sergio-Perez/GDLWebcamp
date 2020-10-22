<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

      // Definir archivo para cachear (puede ser .php también)
    $archivoCache = 'cache/'.$pagina.'.php';
    // Cuanto tiempo deberá estar este archivo almacenado
    $tiempo = 36000;
    // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
    if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
      include($archivoCache);
        exit;
    }
    // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
    ob_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>GdlWebCamp</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha256-wstTM1F5dOf7cgnlRHIW3bmoRAAGh6jL7tMIvqTuFZE=" crossorigin="anonymous" /> 
    <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "",$archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        } else if($pagina == 'conferencia'){
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />' ;
        } 

        
    ?>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
   
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina;?>">

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>

                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 Dic</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Madrid, Spain</p>
                    </div>

                    <h1 class="nombre-sitio">GdlWebCamp</h1>
                    <p class="slogan">La mejor conferencia de <span> diseño Web</span></p>
                </div>
                <!--informacion-evento-->
            </div>
        </div>
        <!--hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
            <a href="index.php">
                <img src="img/logo.svg" alt="imagen logo">
            </a>

            </div>
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="navegacion-principal clearfix">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservas</a>
            </nav>
        </div>
        <!--contenedor-->

    </div>
    <!--barra-->