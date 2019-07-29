<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->


    <link rel="stylesheet" href="css/normalize.css">

    <!--fontawesome-->
    <link rel="stylesheet" href="css/all.min.css">

    <!--113. Agregando una fuente con Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">

    <!--<link rel="stylesheet" href="css/colorbox.css">-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" /><!-- permite a los archivos de php leer elcss y pueda aplicarlo al proyecto-->

    <!--328. Cargando archivos de forma condicional-->
    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'nosotros' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'galeria') {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
    ?>

    <link rel="stylesheet" href="css/main.css">



    <meta name="theme-color" content="#fafafa">
</head>

<!--la siguiente clase permite: 330. Mostrando en que página se encuentra el
usuario actualmente-->
<body class="<?php echo $pagina; ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--110. Creando el Header y Menú de Redes Sociales-->
    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <!--111. Agregando Font Awesome e Iconos a nuestro Proyecto-->
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-pinterest-square"></i></a>
                    <a href="#"><i class="fab fa-youtube-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <!--.clearfix es una forma de que un elemento borra automáticamente sus elementos secundarios, 
                      por lo que no necesita agregar marcado adicional.
                      Generalmente se usa en diseños flotantes donde los elementos flotan para apilarse horizontalmente-->
                        <!-- <p class="fecha"><i class="fas fa-calendar-alt"></i>8-15 Jun</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Fusagasugá, CO</p>-->
                    </div>
                    <!--.clearfix-->
                    <h1 class="nombre-sitio">ViveTravelTours</h1>
                    <p class="slogan"><span>Viajamos con tus sueños</span> </p>
                </div>
                <!--.informacion-evento-->


            </div>
        </div>
        <!--.hero-->
    </header>

    <!--114. Creando la Barra de Navegación-->
    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Vive Travel Tours">
                </a>
            </div>
            <!--logo-->
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!--menu-movil-->
            <nav class="navegacion-principal clearfix">
                <a href="servicios.php">Servicios</a>
                <a href="calendario.php">Calendario</a>
                <a href="galeria.php">Galería</a>
                <a href="nosotros.php">Nosotros</a>
                <a href="registro.php">Registro</a>
            </nav>
        </div>
        <!--contenedor clearfix-->
    </div>
    <!--.barra-->