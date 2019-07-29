<?php
include_once 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$lugar = $_POST['lugar_evento'];
$categoria_id = $_POST['categoria_evento'];
$costo = $_POST['costo_evento'];


// obtener la fecha
$fechaini = $_POST['fecha_evento_ini'];
$fecha_formateada_ini = date('Y-m-d', strtotime($fechaini));
$fechafin = $_POST['fecha_evento_fin'];
$fecha_formateada_fin = date('Y-m-d', strtotime($fechafin));

$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {

    $directorio = "../img/eventos/";

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if (move_uploaded_file($_FILES['archivo_img']['tmp_name'], $directorio . $_FILES['archivo_img']['name'])) {
        $imagen_url = $_FILES['archivo_img']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }


    if ($categoria_id == 1) {
        $clave = 'pereg_extra';
    } else if ($categoria_id == 2) {
        $clave = 'paquete_extra';
    } else {
        $clave = 'evento_extra';
    }



    try {
        $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, lugar_evento, fecha_inicio, fecha_fin, costo_evento, imagen_evento, id_cat_evento, clave) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )  ');
        $stmt->bind_param('ssssisis', $titulo, $lugar, $fecha_formateada_ini, $fecha_formateada_fin, $costo, $imagen_url, $categoria_id, $clave);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' => $imagen_resultado
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
    $directorio = "../img/eventos/";
    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }
    if (move_uploaded_file($_FILES['archivo_img']['tmp_name'], $directorio . $_FILES['archivo_img']['name'])) {
        $imagen_url = $_FILES['archivo_img']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    try {

        if ($_FILES['archivo_img']['size'] > 0) {

            // con imagen

            $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, lugar_evento = ?, fecha_inicio = ?, fecha_fin = ?, costo_evento = ?, imagen_evento = ?, id_cat_evento = ?, clave = ?, editado = NOW() WHERE evento_id = ? ');
            $stmt->bind_param('ssssisisi', $titulo, $lugar, $fecha_formateada_ini, $fecha_formateada_fin, $costo, $imagen_url, $categoria_id, $clave, $id_registro);
        } else {
            // sin imagen
            $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, lugar_evento = ?, fecha_inicio = ?, fecha_fin = ?, costo_evento = ?, id_cat_evento = ?, clave = ?, editado = NOW() WHERE evento_id = ? ');
            $stmt->bind_param('ssssiisi', $titulo, $lugar, $fecha_formateada_ini, $fecha_formateada_fin, $costo, $categoria_id, $clave, $id_registro);
        }

        $estado = $stmt->execute();

        if($estado == true) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }    
    die(json_encode($respuesta));    
}



if ($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];
    try {
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
