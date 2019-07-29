<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT `evento_id`, `nombre_evento`, `lugar_evento`, `fecha_inicio`, `fecha_fin`, `costo_evento`, `imagen_evento`, `cat_evento` ";
        $sql .= "FROM `eventos` ";
        $sql .= "INNER JOIN `categoria_evento` ";
        $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
        $sql .= "ORDER BY `evento_id` ";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
    ?>

    <div class="calendario">
        <?php
        $calendario = array();
        while ($eventos = $resultado->fetch_assoc()) {


            //obtiene la fecha inicio del evento para ordenar por fecha
            $fecha = $evento['fechainicio'];

            //obtiene la categoría del evento para ordenar por categoría
            $categoria = $eventos['cat_evento'];
            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'lugar' => $eventos['lugar_evento'],
                'fechainicio' => $eventos['fecha_inicio'],
                'fechafin' => $eventos['fecha_fin'],
                'costo' => $eventos['costo_evento'],
                'imagen' => $eventos['imagen_evento'],
                'categoria' => $eventos['cat_evento']
            );
            $calendario[$categoria][] = $evento;
            ?>


        <?php
        //while de fetch_assoc()
    }
    ?>

        <?php
        // imprimir todos los eventos
        foreach ($calendario as $tipocategoria => $lista_eventos) { ?>
            <h3>
                <i class="far fa-calendar-check" aria-hidden="true"></i>
                <?php echo $tipocategoria; ?>
            </h3>
            <?php

            // imprimir  la lista de  eventos
            foreach ($lista_eventos as $evento) { ?>
                <?php //se asignan variables para poder dar formato a las fechas
                $fechai = $evento['fechainicio'];
                $fechaf = $evento['fechafin']; ?>

                <div class="evento">
                    <div class="texto-imagen">
                    <img src="img/eventos/<?php echo $evento['imagen'] ?>" alt="Imagen Evento">
                        <p><?php echo $evento['titulo']; ?> </p>
                    </div>
                    <p class="lugar"><?php echo $evento['lugar']; ?> </p>
                    <p class="fecha-evento">
                        <?php
                        //Unix
                        setlocale(LC_TIME, 'es_ES.UTF-8');
                        //Windows
                        setlocale(LC_TIME, 'spanish');

                        echo strftime("%B %d", strtotime($fechai));
                        echo " a ";
                        echo strftime("%B %d del %Y", strtotime($fechaf));
                        ?>
                    </p>
                </div>
            <?php
            //fin foreach eventos
        }
        ?>
        <?php
        //fin foreach de tipo de categotia
    }
    ?>


    </div>
    <!--.calendario-->

    <?php
    $conn->close();
    ?>
</section>
<!--seccion contenedor-->


<?php include_once 'includes/templates/footer.php'; ?>