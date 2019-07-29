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
      Crear Evento
      <small>llena el formulario para crear un evento</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Evento</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo"method="post" action="modelo-evento.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="titulo">Titulo Evento:</label>
                  <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo del Evento">
                </div>
                
                <div class="form-group">
                  <label for="luger">Lugar del Evento:</label>
                  <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" placeholder="Lugar del  Evento">
                </div>

                <div class="form-group">
                  <label for="nombre">Categoría:</label>
                  <select name="categoria_evento" class="form-control seleccionar">
                    <option value="0">- Seleccione -</option>
                    <?php
                    try {
                      $sql = "SELECT * FROM categoria_evento ";
                      $resultado = $conn->query($sql);
                      while ($cat_evento = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $cat_evento['id_categoria']; ?>">
                          <?php echo $cat_evento['cat_evento']; ?>

                        </option>

                      <?php }
                  } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Fecha Inicio de Evento:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fas fa-calendar-day"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="fecha_ini" name="fecha_evento_ini">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Fecha Final de Evento:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fas fa-calendar-check"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="fecha_fin" name="fecha_evento_fin">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-row">
                  <label for="costo">Costo por Persona:</label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="number" name="costo_evento" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="costo" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="imagen_evento">Imagen:</label>
                  <input type="file" id="imagen_evento" name="archivo_img">
                  <p class="help-block">Añada la imagen del Evento aquí</p>
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