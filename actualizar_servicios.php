<?php
include_once("conexion.php");
$id = $_POST["id"];
$texto = $_POST["texto"];
$columna = $_POST["columna"];
if($_POST["texto"]=='SI' || $_POST["texto"]=='NO' || $_POST["texto"]=='si' || $_POST["texto"]=='no'){
 $consulta = "UPDATE servicios set $columna ='$texto' WHERE id_servicio = $id";
    $row = mysqli_query($conn, $consulta);
 if($row == true ){
     echo "Dato actualizado";
 }
}else if ($_POST["texto"]!='SI' || $_POST["texto"]!='NO' || $_POST["texto"]!='si' || $_POST["texto"]!='no'){
     echo "Debes ingresar SI O NO, de lo contrario no puedes actualizar";
}
?>