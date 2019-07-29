<?php include_once 'includes/templates/header.php'; ?>

<?php
try {
    require_once('includes/funciones/bd_conexion.php');
    $sql = "SELECT * FROM `servicios` ";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<section class="contenedor seccion">
    <h2>Asesoria en:</h2>
    <ul class="lista-imagenes clearfix">
        <?php while ($servicios = $resultado->fetch_assoc()) { ?>
            <li>
                <div class="texto-imagen">
                    <img src="img/servicios/<?php echo $servicios['imagen_servicio'] ?>" alt="Imagen Servicio">
                    <p><?php echo $servicios['nombre_servicio']; ?></p>
                </div>
                <!--servicios-->
            </li>
           

        <?php } ?>
    </ul>
</section>
<!--nosotros contenedor seccion-->

<?php include_once 'includes/templates/footer.php'; ?>