
<?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT * FROM `empleados` ";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
    ?>

    <section class="contenedor seccion">
        <h2>Nosotros</h2>
        <ul class="lista-imagenes clearfix">
        <?php while ($empleados = $resultado->fetch_assoc()) { ?>
            <li>
                <div class="texto-imagen">
                        <a class="empleado-info" href="#empleado<?php echo $empleados['empleado_id']; ?>">
                            <img src="img/empleados/<?php echo $empleados['url_imagen_empleado'] ?>" alt="Imagen empleado">
                            <p><?php echo $empleados['nombre_empleado'] . " " . $empleados['apellido_empleado']; ?></p>
                        </a>
                    </div>
                <!--empleado-->
            </li>
            <div style="display:none;">
                    <div class="empleado-info" id="empleado<?php echo $empleados['empleado_id']; ?>">
                        <h2><?php echo $empleados['nombre_empleado'] . " " . $empleados['apellido_empleado']; ?></h2>
                        <img src="img/empleados/<?php echo $empleados['url_imagen_empleado'] ?>" alt="Imagen empleado">
                        <p><?php echo $empleados['descripcion_empleado'] ?></p>
                    </div>
                </div>
            <?php } ?>
          
         
        </ul>
    </section>
    <!--empleados contenedor seccion-->
    <?php
    $conn->close();
    ?>