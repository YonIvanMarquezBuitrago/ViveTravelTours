<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre_servicio'];
$descripcion = $_POST['descripcion_servicio'];


$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    */
    
    $directorio = "../img/servicios/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    
    try {
        $stmt = $conn->prepare('INSERT INTO servicios (nombre_servicio, descripcion_servicio, imagen_servicio) VALUES (?, ?, ?) ');
        $stmt->bind_param("sss", $nombre, $descripcion, $imagen_url );
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
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

if($_POST['registro'] == 'actualizar'){    
    $directorio = "../img/servicios/";    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }    
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }    
    try {
        if($_FILES['archivo_imagen']['size'] > 0 ) {
            
            // con imagen
            $stmt = $conn->prepare('UPDATE servicios SET nombre_servicio = ?, descripcion_servicio = ?, imagen_servicio = ? WHERE id_servicio = ? ');
            $stmt->bind_param("sssi", $nombre, $descripcion, $imagen_url, $id_registro);
               
        } else {
            // sin imagen
            $stmt = $conn->prepare('UPDATE servicios SET nombre_servicio = ?, descripcion_servicio = ? WHERE id_servicio = ? ');
            $stmt->bind_param("ssi", $nombre, $descripcion,  $id_registro);
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

if($_POST['registro'] == 'eliminar'){

    $id_borrar = $_POST['id'];
    
    try {
        $stmt = $conn->prepare('DELETE FROM servicios WHERE id_servicio = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
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

