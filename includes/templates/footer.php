<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion">
            <h3>Sobre <span> ViveTravelTours</span></h3>
            <p>Somos una agencia de viajes joven y emprendedora, creada en Fusagasugá hace 3 años , inspirada en responder a las necesidades y recomendaciones de experiencias de viajes de los usuarios.
                Descubrimos la necesidad de crear un producto a la medida de los clientes y la importancia de asesorarlos en su sueño de viajar por las múltiples razones que los podían motivar.
                Existía de manera especial en la población adulto mayor una necesidad asociada a la satisfacción y seguridad, y allí fue donde encontramos el propósito de nuestra empresa: “ser reconocidos como una empresa que brinda confianza, satisfacción y seguridad a los clientes y acompañamiento permanente en su viaje”
                Nos proponemos cada día brindar experiencias de vida invaluables e inolvidables a nuestros clientes.
            </p>
        </div>
        <!--footer-informacion-->
        <div class="ultimos-tweets">
            <h3>Últimos <span>Tweets</span></h3>
            <a class="twitter-timeline" data-height="400" data-theme="light" data-link-color="#fe4918" href="https://twitter.com/YIMBUNAL?ref_src=twsrc%5Etfw">Tweets by YIMBUNAL</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <!--ultimos-tweetsn-->
        <div class="menu">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales-footer">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </nav>
        </div>
        <!--menu-->
    </div>
    <!--contenedor clearfix-->
    <p class="copyright">
        Todos los Derechos Reservados ViveTravelTours 2019.
    </p>
</footer>

<script src="js/vendor/modernizr-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="js/plugins.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>
<!--<script src="js/jquery.colorbox-min.js"></script>-->


<!--328. Cargando archivos de forma condicional-->
<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);
if ($pagina == 'nosotros' || $pagina == 'index') {
    echo '<script src="js/jquery.colorbox-min.js"></script>';
    echo '<script src="js/jquery.waypoints.min.js"></script>';
} else if ($pagina == 'galeria') {
    echo '<script src="js/lightbox.js"></script>';
}
?>


<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>