<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>Añade tus datos de Contacto</h2>

  <div class="bg-amarillo contenedor sombra">
  <form id="registrado" action="#">
        <h4>Todos los campos son obligatorios</h4>
    <div class="campos">
      <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Nombre Registrado" id="nombre_registrado" value="<?php echo ($registrado['nombre_registrado'] ? $registrado['nombre_registrado'] : '') ?>">
      </div>
      <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" placeholder="Apellido Registrado" id="apellido_registrado" value="<?php echo ($registrado['apellido_registrado'] ? $registrado['apellido_registrado'] : '') ?>">
      </div>
      <div class="campo">
        <label for="email">Email: </label>
        <input type="text" placeholder="Tu Correo" id="email_registrado" value="<?php echo ($registrado['email_registrado'] ? $registrado['email_registrado'] : '') ?>">
      </div>
    </div>

    <div id="eventos" class="eventos clearfix">
      <h4>Elige tus Intereses</h4>
      <div class="caja">

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php');
          $sql = "SELECT eventos.*, categoria_evento.cat_evento ";
          $sql .= " FROM eventos ";
          $sql .= " JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " ORDER BY eventos.fecha_inicio, eventos.id_cat_evento ";
          //echo $sql;
          $resultado = $conn->query($sql);
        } catch (Exception $e) {
          echo $e->getMessage();
        }

        $eventos_categoria = array();
        //header("Content-Type: text/html; charset=ISO-8859-1");
        while ($eventos = $resultado->fetch_assoc()) {


          $categoria = $eventos['cat_evento'];
          $suceso = array(
            'nombre_evento' => $eventos['nombre_evento'],
            'lugar' => $eventos['lugar_evento'],
            'id' => $eventos['evento_id']            
          );
          $eventos_categoria[$categoria][] = $suceso;
          
        }
        /*echo "<pre>";
        var_dump($eventos_categoria);
        echo "</pre>"; */
        ?>

        <?php foreach ($eventos_categoria as $suceso => $eventos) { ?>
          <div id="<?php echo $categoria; ?>" class="contenido-categoria clearfix">
            <h4><?php echo $suceso; ?></h4>



                <?php foreach ($eventos as $evento) { ?>
                  <label>
                    <input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                    <?php echo $evento['nombre_evento']; ?> iremos a: <time><?php echo $evento['lugar']; ?></time> 
                    <br>
                   
                  </label>
                <?php } 
              ?>
          </div>
          <!--.contenido-categoria -->
        <?php  } ?>
        </div>

      </div>
      <!--.caja-->



    <div class="campo enviar">
    <?php 
        $textoBtn = $contacto['nombre'] ? 'Guardar' : 'Añadir';
        $accion = $contacto['nombre'] ? 'editar' : 'crear';
    ?>
    <input type="hidden" id="accion" value="<?php echo $accion ?>">
    <?php if(isset($contacto['id'])) { ?>
        <input type="hidden" id="id" value="<?php echo $contacto['id']; ?>">
    <?php } ?>
    <input type="hidden" id="fecha_registro" value="<?php echo date('Y-m-d H:i;s'); ?>">
    <input type="submit" value="<?php echo $textoBtn ?>">
</div>


  </form>
  </div>
</section>
<!--seccion contenedor-->

<?php include_once 'includes/templates/footer.php'; ?>