<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'funciones/funciones.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crear Cargo
      <small>llena el formulario para crear un Cargo</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Cargo</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-cargo.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre del Cargo:</label>
                  <input type="text" class="form-control" id="nombre_cargo" name="nombre_cargo" placeholder="Cargo">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion del Cargo:</label>
                  <textarea class="form-control" id="descripcion_cargo" name="descripcion_cargo" rows="8" placeholder="Descripcion del Cargo"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php
include_once 'templates/footer.php';
?>