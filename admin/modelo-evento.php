<?php
include_once "funciones/funciones.php";

$titulo = $_POST["titulo_evento"];
$cat_evento_id = $_POST["categoria_evento"];
$invitado_id = $_POST["invitado"];

$id_registro = $_POST["id_registro"];

// Obtener la fecha
$fecha = $_POST["reservationdate"];
$fecha_formateada = date("Y-m-d",strtotime($fecha));

// Hora
$hora = $_POST['hora_evento'];
$hora_formateada = date('H:i', strtotime($hora));

// Clave
$clave = "";
 
// Registrar Evento nuevo
if($_POST["registro"] == "nuevo"){   
   

    
    try {    
        
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv,clave) VALUES ( ?, ?, ?, ?, ? ,?)");
        $stmt->bind_param("sssiis", $titulo, $fecha_formateada, $hora_formateada, $cat_evento_id, $invitado_id, $clave);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        $stmt->connect_error;

        if($stmt->affected_rows > 0){
            $respuesta = array (
                "respuesta" => "exito",
                "id_insertado" =>  $id_insertado
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

// Actualizar admin
if($_POST["registro"] == "actualizar"){
   
    $hora_formateada = date('H:i', strtotime($hora));

    $horas = array (
        "hora" => $hora,
        "hora_formateada" =>  $hora_formateada
    );

    try {
        $stmt = $conn->prepare(" UPDATE eventos SET  nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ? , editado = NOW() WHERE  evento_id = ?");
        $stmt->bind_param("sssiii", $titulo, $fecha_formateada, $hora_formateada , $cat_evento_id , $invitado_id , $id_registro );
        $stmt->execute();
        if($stmt->affected_rows > 0){
    
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

// Eliminar admin
if($_POST["registro"] == "eliminar"){


  $id_borrar = $_POST["id"];

  try {   
        $stmt = $conn->prepare("DELETE FROM eventos WHERE evento_id = ? ");
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







        

