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
      Editar encabezados
      <small>llena el formulario para editar un encabezado</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Editar encabezado</h3>
          </div>
          <div class="box-body">
            <?php
            $sql = "SELECT * FROM encabezado WHERE id_encabezado = $id ";
            $resultado = $conn->query($sql);
            $encabezado = $resultado->fetch_assoc();
            ?>
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-encabezado.php" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <img src="../img/encabezado/<?php echo $encabezado['img_encabezado']; ?>" width="200">
                </div>
                <div class="form-group">
                  <label for="imagen_encabezado">Imagen:</label>
                  <input type="file" id="imagen_encabezado" name="archivo_imagen">
                  <p class="help-block">Añada la imagen del encabezado aquí</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $encabezado['id_encabezado']; ?>">
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