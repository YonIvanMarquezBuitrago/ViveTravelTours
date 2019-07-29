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
            Listado de encabezados
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra la lista de encabezados y su información aquí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {

                              $sql = "SELECT id_encabezado, img_encabezado ";
                              $sql .= " FROM encabezado ";                              
                              $sql .= " ORDER BY id_encabezado ";
                              $resultado = $conn->query($sql);

                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($encabezado = $resultado->fetch_assoc() ) { ?>
                                
                                <tr>                                    
                                    <td><img src="../img/encabezado/<?php echo $encabezado['img_encabezado']; ?>" width="150"></td>
                                    <td>
                                        <a href="editar-encabezado.php?id=<?php echo $encabezado['id_encabezado'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                       
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
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

