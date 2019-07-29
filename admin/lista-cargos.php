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
      Listado de Cargos
      <small></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maneja los Cargos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre Cargo</th>
                  <th>Descripción del Cargo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                try {
                  $sql = "SELECT * FROM cargos";
                  $resultado = $conn->query($sql);
                } catch (Exception $e) {
                  $error = $e->getMessage();
                  echo $error;
                }
                while ($cargo = $resultado->fetch_assoc()) { ?>

                  <tr>
                    <td><?php echo $cargo['nombre_cargo']; ?></td>
                    <td><?php echo $cargo['descripcion_cargo']; ?></td>
                    <td>
                      <a href="editar-cargo.php?id=<?php echo $cargo['cargo_id'] ?>" class="btn bg-orange btn-flat margin">
                        <i class="fas fa-user-edit"></i>
                      </a>
                      <a href="#" data-id="<?php echo $cargo['cargo_id']; ?>" data-tipo="cargo" class="btn bg-maroon bnt-flat margin borrar_registro">
                        <i class="fas fa-trash-alt"></i>
                      </a>

                    </td>
                  </tr>
                <?php }  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre Cargo</th>
                  <th>Descripción del Cargo</th>
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