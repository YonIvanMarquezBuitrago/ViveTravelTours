<?php

//echo json_encode($_POST['accion']);

if ($_POST['accion'] == 'crear') {
    //'error' -> $stmt->error_list();
    // Creará un nuevo registro en la BD
    require_once('../funciones/bd_conexion.php');

    //echo json_encode($_POST);
 
    // Validar las entradas
    $nombre = filter_var($_POST['nombre_registrado'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido_registrado'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email_registrado'], FILTER_SANITIZE_EMAIL);
    $fecha = filter_var($_POST['fecha_registro'], FILTER_SANITIZE_STRING);

    try { 
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $apellido, $email, $fecha);
        $stmt->execute();
        if($stmt->affected_rows == 1){
            $respuesta = array(
                'respuesta' => 'correcto',
                
                'datos' => array(
                    'nombre_registrado' => $nombre,
                    'apellido_registrado' => $apellido,
                    'email_registrado' => $email,
                    'fecha_registro' => $fecha,
                    'id_insertado' => $stmt->insert_id
                )
            );
        }
        
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}


