<?php
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error");
}
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
      Editar Empleados
      <small>llena el formulario para editar un empleado</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Empleado</h3>
          </div>
          <div class="box-body">
            <?php
            $sql = "SELECT * FROM empleados WHERE empleado_id = $id ";
            $resultado = $conn->query($sql);
            $empleado = $resultado->fetch_assoc();
            ?>
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-empleado.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_empleado">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Nombre" value="<?php echo $empleado['nombre_empleado']; ?>">
                </div>
                <div class="form-group">
                  <label for="apellido_empleado">Apellido:</label>
                  <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Nombre" value="<?php echo $empleado['apellido_empleado']; ?>">
                </div>

                <div class="form-group">
                  <label for="cargo">Cargo:</label>
                  <select name="cargo_empleado" class="form-control seleccionar">
                    <option value="0">- Seleccione -</option>
                    <?php
                    try {
                      $cargo_actual = $empleado['id_cargo_empleado'];
                      $sql = "SELECT * FROM cargos ";
                      $resultado = $conn->query($sql);
                      while ($nombre_cargo = $resultado->fetch_assoc()) {
                        if ($nombre_cargo['cargo_id'] == $cargo_actual) { ?>
                          <option value="<?php echo $nombre_cargo['cargo_id']; ?>" selected>
                            <?php echo $nombre_cargo['nombre_cargo']; ?>
                          </option>
                        <?php } else { ?>
                          <option value="<?php echo $nombre_cargo['cargo_id']; ?>">
                            <?php echo $nombre_cargo['nombre_cargo']; ?>
                          </option>
                        <?php }
                    }
                  } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                  }


                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="descripcion_empleado">Descripción: </label>
                  <textarea class="form-control" id="descripcion_empleado" name="descripcion_empleado" rows="8" placeholder="Descripcion Empleado"><?php echo $empleado['descripcion_empleado']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <img src="../img/empleados/<?php echo $empleado['url_imagen_empleado']; ?>" width="200">
                </div>
                <div class="form-group">
                  <label for="imagen_empleado">Imagen:</label>
                  <input type="file" id="imagen_empleado" name="archivo_imagen">
                  <p class="help-block">Añada la imagen del empleado aquí</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $empleado['empleado_id']; ?>">
                <button type="submit" class="btn btn-primary" id="crear_registro" >Guardar</button>
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