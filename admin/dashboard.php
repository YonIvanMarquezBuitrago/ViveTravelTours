<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control de Informacion de Vive Travel Tours</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box-body chart-responsive">
        <div class="chart" id="grafica-registros" style="height: 300px;"></div>
      </div>
    </div>
    <h2 class="page-header">Información Administrativa</h2>
    <div class="row">
      <!-- Total de Administradores -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(id_admin) AS registros FROM admins ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>
            <p>Total de Administradores</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-shield"></i>
          </div>
          <a href="lista-admin.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total de Cargos -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(cargo_id) AS registros FROM cargos ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>

            <p>Total de Cargos</p>
          </div>
          <div class="icon">
            <i class="fas fa-briefcase"></i>
          </div>
          <a href="lista-cargos.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total de Empleados -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(empleado_id) AS registros FROM empleados ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>

            <p>Total de Empleados</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <a href="lista-empleados.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- ./row -->

    <h2 class="page-header">Información Operativa</h2>

    <div class="row">

     <!-- Total de Servicios -->
     <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(id_servicio) AS registros FROM servicios ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-fuchsia">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>
            <p>Total de Servicios</p>
          </div>
          <div class="icon">
            <i class="fas fa-concierge-bell"></i>
          </div>
          <a href="lista-servicios.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total de Categoria Eventos -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(id_categoria) AS registros FROM categoria_evento ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-lime">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>
            <p>Total de Categoria Eventos</p>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="lista-categoria.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total de Eventos -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(evento_id) AS registros FROM eventos ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>
            <p>Total de Eventos</p>
          </div>
          <div class="icon">
            <i class="fas fa-calendar-alt"></i>
          </div>
          <a href="lista-evento.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total de Registrados -->
      <div class="col-lg-3 col-xs-6">
        <?php
        $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados ";
        $resultado = $conn->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small box -->
        <div class="small-box bg-navy">
          <div class="inner">
            <h3><?php echo $registrados['registros']; ?></h3>

            <p>Total de Registrados</p>
          </div>
          <div class="icon">
            <i class="fas fa-address-card"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Más Información <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>