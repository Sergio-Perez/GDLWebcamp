<?php
include_once "funciones/funciones.php";
$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$id_registro = $_POST["id_registro"];

// Registrar Admin nuevo
if($_POST["registro"] == "nuevo"){   
    
    $opciones =array(
    "cost" => 12
    );    
    $password_hashed = password_hash($password,PASSWORD_BCRYPT,$opciones);

    try {
        $stmt = $conn->prepare(" INSERT INTO admins (usuario, nombre, password) VALUES (?, ? , ?)");
        $stmt->bind_param("sss", $usuario, $nombre ,$password_hashed);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if( $id_registro > 0){
            $respuesta= array(
                "respuesta" => "exito",
                "id_admin" => $id_registro
            );
           

        } else {
            $respuesta= array(
                "respuesta" => "error"

            );
        }
        die(json_encode($respuesta));

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));

}

// Actualizar admin
if($_POST["registro"] == "actualizar"){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    
    try {

        if(empty($password = $_POST["password"])){

            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?");
            $stmt->bind_param("ssi", $usuario, $nombre , $id_registro) ;


        } else{
            $opciones = array(
                "cost" => 12
                );    
            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, password = ? ,editado = NOW() WHERE id_admin =? ");
            $stmt->bind_param("sssi", $usuario, $nombre , $password_hashed , $id_registro) ;
        }
      
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array (
                "respuesta" => "exito",
                "id_actualizado" => $stmt->insert_id
            );

        }else {
            $respuesta = array (
                "respuesta" => "error"
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
        $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ? ");
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







        
