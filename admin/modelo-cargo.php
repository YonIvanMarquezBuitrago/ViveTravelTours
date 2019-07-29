<?php
include_once 'funciones/funciones.php';

$nombre_cargo = $_POST['nombre_cargo'];
$desc_cargo = $_POST['descripcion_cargo'];

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    try {
        $stmt = $conn->prepare('INSERT INTO cargos (nombre_cargo, descripcion_cargo) VALUES (?, ?) ');
        $stmt->bind_param("ss", $nombre_cargo, $desc_cargo);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
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
    
    try {
        $stmt = $conn->prepare('UPDATE cargos SET nombre_cargo = ?, descripcion_cargo = ?, editado = NOW() WHERE cargo_id = ? ');
        $stmt->bind_param('ssi', $nombre_cargo, $desc_cargo, $id_registro );
        $stmt->execute();
        if($stmt->affected_rows) {
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
        $stmt = $conn->prepare('DELETE FROM cargos WHERE cargo_id = ? ');
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

