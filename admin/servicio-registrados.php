<?php 
    include_once "funciones/sesiones.php";
    include_once "funciones/funciones.php";
$sql = "SELECT  DATE(fecha_registro) AS fecha , COUNT(*) AS resultado FROM registrados GROUP BY fecha ORDER BY fecha";
$resultado = $conn->query($sql);

$arreglo_registro = array();
while($registro_dia = $resultado->fetch_array()){
    $fecha = $registro_dia["fecha"];
    $registro["cantidad"] = $registro_dia["resultado"];
    $registro["fecha"] = $fecha;

    $arreglo_registro[] = $registro;
  

}
echo( json_encode($arreglo_registro));
