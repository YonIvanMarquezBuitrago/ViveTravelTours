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
          Listado de Eventos
          <small>Aquí podrás editar o borrar los eventos</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los eventos en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre del Evento</th>
                  <th>Lugar del Evento</th>
                  <th>Fechas Salida</th>
                  <th>Fecha Regreso</th>
                  <th>Costo</th>
                  <th>Imagen</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql = "SELECT evento_id, nombre_evento, lugar_evento, fecha_inicio, fecha_fin, costo_evento, imagen_evento, cat_evento ";
                                $sql .= " FROM eventos ";
                                $sql .= " INNER JOIN categoria_evento ";
                                $sql .= " ON  eventos.id_cat_evento=categoria_evento.id_categoria ";
                                $sql .= " ORDER BY evento_id ";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($eventos = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $eventos['nombre_evento']; ?></td>
                                    <td><?php echo $eventos['lugar_evento']; ?></td>
                                    <td><?php echo $eventos['fecha_inicio']; ?></td>
                                    <td><?php echo $eventos['fecha_fin']; ?></td>
                                    <td><?php echo $eventos['costo_evento']; ?></td>
                                    <td><img src="../img/eventos/<?php echo $eventos['imagen_evento']; ?>" width="150"</td>
                                    <td><?php echo $eventos['cat_evento']; ?></td>
                                    <td>
                                        <a href="editar-evento.php?id=<?php echo $eventos['evento_id'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $eventos['evento_id']; ?>" data-tipo="evento" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Nombre del Evento</th>
                  <th>Lugar del Evento</th>
                  <th>Fechas Salida</th>
                  <th>Fecha Regreso</th>
                  <th>Costo</th>
                  <th>Imagen</th>
                  <th>Categoria</th>
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

