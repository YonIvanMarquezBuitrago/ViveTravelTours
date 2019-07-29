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
            Listado de Empleados
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra la lista de Empleados y su información aquí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Descripcion</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {

                              $sql = "SELECT empleado_id, nombre_empleado, apellido_empleado, nombre_cargo, descripcion_empleado, url_imagen_empleado ";
                              $sql .= " FROM empleados ";
                              $sql .= " INNER JOIN cargos ";
                              $sql .= " ON  empleados.id_cargo_empleado=cargos.cargo_id ";
                              $sql .= " ORDER BY empleado_id ";
                              $resultado = $conn->query($sql);

                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($empleado = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>
                                    <td><?php echo $empleado['nombre_empleado'] . " " . $empleado['apellido_empleado'];  ?></td>
                                    <td><?php echo $empleado['nombre_cargo']; ?></td>
                                    <td><?php echo $empleado['descripcion_empleado']; ?></td>
                                    <td><img src="../img/empleados/<?php echo $empleado['url_imagen_empleado']; ?>" width="150"></td>
                                    <td>
                                        <a href="editar-empleado.php?id=<?php echo $empleado['empleado_id'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $empleado['empleado_id'] ?>" data-tipo="empleado" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Descripcion</th>
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

