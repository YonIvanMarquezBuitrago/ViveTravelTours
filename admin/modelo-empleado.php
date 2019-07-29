<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre_empleado'];
$apellido = $_POST['apellido_empleado'];
$cargo_id = $_POST['cargo_empleado'];
$descripcion = $_POST['descripcion_empleado'];


$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    */
    
    $directorio = "../img/empleados/";
    
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
        $stmt = $conn->prepare('INSERT INTO empleados (nombre_empleado, apellido_empleado, id_cargo_empleado, descripcion_empleado, url_imagen_empleado) VALUES (?, ?, ?, ?, ?) ');
        $stmt->bind_param("ssiss", $nombre, $apellido, $cargo_id, $descripcion, $imagen_url );
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
    $directorio = "../img/empleados/";    
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
            $stmt = $conn->prepare('UPDATE empleados SET nombre_empleado = ?, apellido_empleado = ?, id_cargo_empleado = ?, descripcion_empleado = ?, url_imagen_empleado = ? WHERE empleado_id = ? ');
            $stmt->bind_param("ssissi", $nombre, $apellido, $cargo_id, $descripcion, $imagen_url,  $id_registro);
               
        } else {
            // sin imagen
            $stmt = $conn->prepare('UPDATE empleados SET nombre_empleado = ?, apellido_empleado = ?,id_cargo_empleado = ?, descripcion_empleado = ? WHERE empleado_id = ? ');
            $stmt->bind_param("ssisi", $nombre, $apellido, $cargo_id, $descripcion,  $id_registro);
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
        $stmt = $conn->prepare('DELETE FROM empleados WHERE empleado_id = ? ');
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

