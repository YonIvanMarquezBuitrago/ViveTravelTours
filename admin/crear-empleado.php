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
      Crear Empleados
      <small>llena el formulario para añadir un Empleado</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Empleado</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-empleado.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_empleado">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Nombre">
                </div>

                <div class="form-group">
                  <label for="apellido_empleado">Apellido:</label>
                  <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Apellido">
                </div>

                <div class="form-group">
                  <label for="nombre">Cargo:</label>
                  <select name="cargo_empleado" class="form-control seleccionar">
                    <option value="0">- Seleccione -</option>
                    <?php
                    try {
                      $sql = "SELECT * FROM cargos ";
                      $resultado = $conn->query($sql);
                      while ($nombre_cargo = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $nombre_cargo['cargo_id']; ?>">
                          <?php echo $nombre_cargo['nombre_cargo']; ?>

                        </option>

                      <?php }
                  } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="descripcion_empleado">Descripción: </label>
                  <textarea class="form-control" id="descripcion_empleado" name="descripcion_empleado" rows="8" placeholder="Descripcion Empleado"></textarea>
                </div>

                <div class="form-group">
                  <label for="url_imagen_empleado">Imagen:</label>
                  <input type="file" id="url_imagen_empleado" name="archivo_imagen">
                  <p class="help-block">Añada la imagen del Empleado aquí</p>
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