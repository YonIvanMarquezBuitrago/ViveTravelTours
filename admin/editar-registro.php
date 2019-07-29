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
            Editar Registro de Usuario Manual
            <small>llena el formulario para editar un usuario registrado</small>
        </h1>
    </section>

    <div class="row">
        <div class="col-md-8">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Usuario</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        $sql = "SELECT * FROM registrados WHERE id_registrado = $id ";
                        $resultado = $conn->query($sql);
                        $registrado = $resultado->fetch_assoc();
                        /*echo "<pre>";
                        var_dump($registrado);
                        echo "</pre>";*/
                        ?>
                        <!-- form start -->
                        <form class="editar-registrado" role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre_registrado">Nombre:</label>
                                    <input value="<?php echo $registrado['nombre_registrado']; ?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input value="<?php echo $registrado['apellido_registrado']; ?>" type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input value="<?php echo $registrado['email_registrado']; ?>" type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>



                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $registrado['id_registrado']; ?>">
                                <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro']; ?>">
                                <button type="submit" class="btn btn-primary" id="btnRegistro">Guardar</button>
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