<?php
include_once 'funciones/funciones.php';


$id_registro = $_POST['id_registro'];



if($_POST['registro'] == 'actualizar'){    
    $directorio = "../img/encabezado/";    
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
            $stmt = $conn->prepare('UPDATE encabezado SET  img_encabezado = ? WHERE id_encabezado = ? ');
            $stmt->bind_param("si", $imagen_url,  $id_registro);
               
        } else {
            // sin imagen
           
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
