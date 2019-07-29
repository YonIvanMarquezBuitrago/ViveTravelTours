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
      Crear Servicios
      <small>llena el formulario para añadir un servicio</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Servicio</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-servicio.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_servicio">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion_servicio">Descripción: </label>
                  <textarea class="form-control" id="descripcion_servicio" name="descripcion_servicio" rows="8" placeholder="Descripcion servicio"></textarea>
                </div>

                <div class="form-group">
                  <label for="imagen_servicio">Imagen:</label>
                  <input type="file" id="imagen_servicio" name="archivo_imagen">
                  <p class="help-block">Añada la imagen del servicio aquí</p>
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