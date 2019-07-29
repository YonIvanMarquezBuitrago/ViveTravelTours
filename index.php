<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
    <h2>Viajamos con tus sueños</h2>
    <p> Asesoramos a personas, familias y empresas para realizar sus sueños de viaje, valoramos cada ideal de
        nuestros clientes y lo llevamos a la realidad.
        Apoyados en un grupo interdisciplinario y de altas cualidades humanas establecemos relaciones de confianza y
        seguridad para nuestros clientes, generando prosperidad para ellos, para la empresa y para la región.
    </p>
</section>
<!--seccion contenedor-->

<section class="programa">
    <div class="contenedor-video">
        <video autoplay loop poster="img/bg-programa.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
        </video>
    </div>
    <!--.contenedor-video-->
    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
                <h2>Programa</h2>
                <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = "SELECT * FROM `categoria_evento` ORDER BY `categoria_evento`.`id_categoria` ASC";
                    $resultado = $conn->query($sql);
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
                ?>

                <nav class="menu-programa">
                    <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <?php $categoria = $cat['cat_evento']; ?>
                        <a href="#<?php echo strtolower($categoria) ?>">
                            <i class="<?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                        </a>
                    <?php } ?>
                </nav>
                <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = "SELECT `evento_id`, `nombre_evento`, `lugar_evento`, `fecha_inicio`, `fecha_fin`, `costo_evento`, `cat_evento` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= "INNER JOIN `categoria_evento` ";
                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                    $sql .= "AND eventos.id_cat_evento = 1 ";
                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                    $sql .= "SELECT `evento_id`, `nombre_evento`, `lugar_evento`, `fecha_inicio`, `fecha_fin`, `costo_evento`, `cat_evento` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= "INNER JOIN `categoria_evento` ";
                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                    $sql .= "AND eventos.id_cat_evento = 2 ";
                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                    $sql .= "SELECT `evento_id`, `nombre_evento`, `lugar_evento`, `fecha_inicio`, `fecha_fin`, `costo_evento`, `cat_evento` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= "INNER JOIN `categoria_evento` ";
                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                    $sql .= "AND eventos.id_cat_evento = 3 ";
                    $sql .= "ORDER BY `evento_id` LIMIT 2;";
                    /*$resultado = $conn->query($sql);*/
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
                ?>

                <?php $conn->multi_query($sql); ?>

                <?php
                do {
                    $resultado = $conn->store_result();
                    $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                    <?php $i = 0; ?>
                    <?php foreach ($row as $evento) : ?>
                        <?php if ($i % 2 == 0) { ?>
                            <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                            <?php } ?>
                            <div class="detalle-evento">
                                <h3><?php echo html_entity_decode($evento['nombre_evento']); ?></h3>
                                <p><i class="far fa-calendar-alt"></i> <?php echo $evento['lugar_evento']; ?></p>
                                <p><i class="far fa-calendar-alt"></i> <?php echo $evento['fecha_inicio']." al ".$evento['fecha_fin']; ?></p>
                                <p><i class="fas fa-dollar-sign"></i> <?php echo $evento['costo_evento']; ?></p>
                            </div>
                            <!--detalle-evento-->

                            <?php if ($i % 2 == 1) : ?>
                                <a href="calendario.php" class="button float-right">Ver todos</a>
                            </div>
                            <!--#talleres-->
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <?php $resultado->free(); ?>
                <?php } while ($conn->more_results() && $conn->next_result()); ?>




            </div>
            <!--programa-evento-->
        </div>
        <!--contenedor-->
    </div>
    <!--contenido-programa-->
</section>
<!--.programa-->




<div class="contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li>
                <p class="numero"></p>Destinos
            </li>
            <li>
                <p class="numero"></p>Eventos
            </li>
            <li>
                <p class="numero"></p>Peregrinaciones
            </li>
            <li>
                <p class="numero"></p>Paquetes Turísticos
            </li>
        </ul>
    </div>
    <!--contenedor-->
</div>
<!--contador parallax-->


<section class="ofertas seccion">
    <h2>Ofertas</h2>
    <div class="contenedor">
        <ul class="lista-ofertas clearfix">
            <li>
                <div class="tabla-oferta">
                    <h3>Hoteles baratos</h3>
                    <p class="nombre-oferta">Tus viajes en oferta</p>
                    <ul>
                        <li>Hotel Waya Guajira, 2 personas desde: $ 317.900</li>
                        <li>Hotel en Cartagena, personas desde: $ 77.900</li>
                        <li>Hotel en Cancún, 2 personas desde: $ 71.900</li>
                    </ul>
                    <a href="#" class="button hollow">Ver Más</a>
                </div>
                <!--tabla-oferta-->
            </li>
            <li>
                <div class="tabla-oferta">
                    <h3>Planes en Oferta</h3>
                    <p class="nombre-oferta">Tus vacaciones soñadas</p>
                    <ul>
                        <li>Paquete a Santa Marta, 4 días / 3 noches $ 949.900</li>
                        <li>Paquete a San Andrés, 4 días / 3 noches 1.122.900</li>
                        <li>Paquete a Cancún, 4 días / 3 noches $ 2.568.900</li>
                    </ul>
                    <a href="#" class="button ">Ver Más</a>
                </div>
                <!--tabla-oferta-->
            </li>
            <li>
                <div class="tabla-oferta">
                    <h3>Tiquetes en Oferta</h3>
                    <p class="nombre-oferta">Tiquetes</p>
                    <ul>
                        <li>Vuelo a Cartagena Ida y Vuelta desde: $ 208.900</li>
                        <li>Vuelo a San Andres Ida y Vuelta desde: $ 238.900</li>
                        <li>Vuelo a Miami Ida y Vuelta desde: USD 406 / $ 1.342.387s</li>
                    </ul>
                    <a href="#" class="button">Ver Más</a>
                </div>
                <!--tabla-oferta-->
            </li>
            <li>
                <div class="tabla-oferta">
                    <h3>Cruceros en Oferta: Cruceros</h3>
                    <p class="nombre-oferta">Cruceros</p>
                    <ul>
                        <li>Crucero Europa, Crucero por Europa desde: $ 1.911.082</li>
                        <li>Crucero Caribe, Crucero al Caribe desde: $ 2.440.101</li>
                        <li>Crucero Bahamas, Crucero por Bahamas desde: $ 2.219.500</li>
                    </ul>
                    <a href="#" class="button hollow">Ver Más</a>
                </div>
                <!--tabla-oferta-->
            </li>
        </ul>
    </div>
    <!--contenedor-->
</section>
<!--ofertas seccion-->

<div id="mapa" class="mapa"></div>
<!--mapa-->

<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum et animi, id itaque aperiam
                    dolor qui
                    delectus ullam voluptas saepe vel, quam provident explicabo repellendus, fugit voluptates nulla
                    laboriosam
                    quo.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>Oswaldo Aponte Escobar <span>Diseñador en @prisma</span> </cite>
                </footer>
            </blockquote>
        </div>
        <!--testomonial-->
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum et animi, id itaque aperiam
                    dolor qui
                    delectus ullam voluptas saepe vel, quam provident explicabo repellendus, fugit voluptates nulla
                    laboriosam
                    quo.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>Oswaldo Aponte Escobar <span>Diseñador en @prisma</span> </cite>
                </footer>
            </blockquote>
        </div>
        <!--testomonial-->
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum et animi, id itaque aperiam
                    dolor qui
                    delectus ullam voluptas saepe vel, quam provident explicabo repellendus, fugit voluptates nulla
                    laboriosam
                    quo.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>Oswaldo Aponte Escobar <span>Diseñador en @prisma</span> </cite>
                </footer>
            </blockquote>
        </div>
        <!--testimonial-->
    </div>
    <!--testimoniales contenedor clearfix-->
</section>
<!--seccion-->

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>Registrate al newsletter:</p>
        <h3>Vive Travel Tours</h3>
        <a href="#" class="button transparente">Registro</a>
    </div>
    <!--contenido contenedor-->
</div>
<!--newsletter parallax-->

<section class="contenedor seccion">
    <h2>Nuestro Proximo Evento inicia en: </h2>
    <div class="cuenta-regresiva">
        <ul class="clearfix">
            <li>
                <p id="dias" class="numero"></p>Días
            </li>
            <li>
                <p id="horas" class="numero"></p>Horas
            </li>
            <li>
                <p id="minutos" class="numero"></p>Minutos
            </li>
            <li>
                <p id="segundos" class="numero"></p>Segundos
            </li>
        </ul>
    </div>
    <!--cuenta-regresiva-->
</section>
<!--seccion-->

<?php include_once 'includes/templates/footer.php'; ?>