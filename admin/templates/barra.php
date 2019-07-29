<body class="hold-transition skin-blue sidebar-mini">
<!-- Contenedor de sitio -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- Mini logo para barra lateral mini 50x50 pixeles -->
      <span class="logo-mini"><b>V</b>TT</span>
      <!-- Logo para estado regular y dispositivos móviles.-->
      <span class="logo-lg"><b>ViveTravel</b>Tours</span>
    </a>
    <!-- Barra de navegación de encabezado: el estilo se puede encontrar en header.less-->
    <nav class="navbar navbar-static-top">
      <!-- Botón de barra lateral-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Barra de Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <!--Cuenta de usuario: el estilo se puede encontrar en el menú desplegable.s -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Hola: <?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">

              <!-- Menú de pie de página-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="editar-admin.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-success btn-flat">Ajustes</a>
                </div>
                <div class="pull-right">
                  <a href="login.php?cerrar_sesion=true" class="btn btn-success btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->