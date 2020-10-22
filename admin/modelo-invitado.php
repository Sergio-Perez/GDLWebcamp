<?php
include_once "funciones/funciones.php";

$nombre = $_POST["nombre_invitado"];
$apellido = $_POST["apellido_invitado"];
$biografia = $_POST["biografia_invitado"];

$id_registro = $_POST["id_registro"];
 
// Registrar Invitado nuevo
if($_POST["registro"] == "nuevo"){   
    /*  Comprobar lod datos 
    $respuesta= array(
        "post" => $_POST,
        "file" => $_FILES,

    );
    die(json_encode($respuesta));
   */
   $directorio = "../img/invitados/";
  // si no  existe el archivo lo creamos y le damos permisos(0755"los normales en web") a la carpeta y los archiovos(true)
   
  if(!is_dir($directorio)){
       mkdir ($directorio, 0755, true);
   }

   // Mosver archivo desde la ubicación temporal a la que yo elija
    if(move_uploaded_file($_FILES["archivo_imagen"]["tmp_name"], $directorio . $_FILES["archivo_imagen"]["name"])){
        $imagen_url = $_FILES["archivo_imagen"]["name"];
        $imagen_resultado = "Se subió Correctamente";

    }else{
        $respuesta = array(
            "respuesta" => error_get_last()
        );

    }

    
    try {    
        
        $stmt = $conn->prepare("INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen )VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("ssss",$nombre, $apellido, $biografia, $imagen_url );
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        $stmt->connect_error;

        if($stmt->affected_rows > 0){
            $respuesta = array (
                "respuesta" => "exito",
                "id_insertado" =>  $id_insertado,
                "resultado_imagen" => $imagen_resultado
            );

        } else {
            $respuesta = array (
                "respuesta" => "error",
                 "errrorr" => $stmt->connect_errno,
                 "Error2" => $stmt->connect_error,
                 "id_insertado" =>  $id_insertado,
                 "rows" => $stmt->affected_rows 
            );
        }

        
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array (
            "respuesta" => $e->getMessage()
         );  

    }
    die(json_encode($respuesta));
    
}

// Actualizar 
if($_POST["registro"] == "actualizar"){

    $directorio = "../img/invitados/";

    if(!is_dir($directorio)){
        mkdir ($directorio, 0755, true);
    }
 
    // Mosver archivo desde la ubicación temporal a la que yo elija
     if(move_uploaded_file($_FILES["archivo_imagen"]["tmp_name"], $directorio . $_FILES["archivo_imagen"]["name"])){
         $imagen_url = $_FILES["archivo_imagen"]["name"];
         $imagen_resultado = "Se subió Correctamente";
 
     }else{
         $respuesta = array(
             "respuesta" => error_get_last()
         );
 
     }
 
   
    try {

        if($_FILES["archivo_imagen"]["size"] > 0 ){
            //con imagen
            $stmt = $conn->prepare ("UPDATE invitados SET nombre_invitado = ? , apellido_invitado = ? , descripcion = ? , url_imagen = ? WHERE invitados_id = ?");
            $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
            
        }  else {
            // sin imagen 
            $stmt = $conn->prepare ("UPDATE invitados SET nombre_invitado = ? , apellido_invitado = ? , descripcion = ?  WHERE invitados_id = ?");
            $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);



        }
        
        $stmt->execute();
        $registros = $stmt->affected_rows;
        if($registros > 0){
    
            $respuesta = array (
                "respuesta" => "exito",
                "id_actualizado" => $id_registro
                
            );
    
        } else { $respuesta = array (
            "respuesta" => "error",
            "errrorr" => $stmt->connect_errno,
            "Error2" => $stmt->connect_error,
            "id_insertado" =>  $id_insertado,
            "rows" => $stmt->affected_rows 
            
        );
    
        }
        
        $stmt->close();
        $conn->close();
     } catch (Exception $e) {
            $respuesta = array (
                "respuesta" => $e->getMessage()
             );
    }
    die(json_encode($respuesta));

}

// Eliminar 
if($_POST["registro"] == "eliminar"){

  $id_borrar = $_POST["id"];

  try {   
        $stmt = $conn->prepare("DELETE FROM invitados WHERE invitados_id = ? ");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){

            $respuesta = array(
                "respuesta" => "exito",
                "id_eliminado"  => $id_borrar
                );

        } else  {
                $respuesta = array(
                    "respuesta" => "error"

                );
            }
            $stmt->close();
            $conn->close();
  } catch (Exception $e) {
      $respuesta = array(
          "respuesta" => $e->getMessage()
      );
  }
  die(json_encode($respuesta));
}







        

