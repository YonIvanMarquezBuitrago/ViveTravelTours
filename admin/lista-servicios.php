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
            Listado de Servicios
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra la lista de Servicios y su información aquí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre Servicio</th>
                  <th>Descripcion del Servicio</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {

                              $sql = "SELECT id_servicio, nombre_servicio, descripcion_servicio, imagen_servicio ";
                              $sql .= " FROM servicios ";
                              $sql .= " ORDER BY id_servicio ";
                              $resultado = $conn->query($sql);

                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($empleado = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>
                                    <td><?php echo $empleado['nombre_servicio'];  ?></td>
                                    <td><?php echo $empleado['descripcion_servicio']; ?></td>
                                    <td><img src="../img/servicios/<?php echo $empleado['imagen_servicio']; ?>" width="150"></td>
                                    <td>
                                        <a href="editar-servicio.php?id=<?php echo $empleado['id_servicio'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $empleado['id_servicio'] ?>" data-tipo="servicio" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Nombre Servicio</th>
                  <th>Descripcion del Servicio</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

