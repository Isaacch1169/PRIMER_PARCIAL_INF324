<?php 
include "conexion.inc.php";
$ci=$_POST["ci"];
$id=$_POST["id"];
$cod_cat=$_POST["cod_cat"];
$distrito=$_POST["distrito"];
$zona=$_POST["zona"];
$superficie=$_POST["superficie"];
$tipo_propiedad=$_POST["tipo_propiedad"];
$fecha_registro=$_POST["fecha_registro"];
$tipo_impuesto=$_POST["tipo_impuesto"];

$sql = "INSERT INTO catastro (ci, id, cod_cat, distrito, zona, superficie, tipo_propiedad, fecha_registro, tipo_impuesto) 
VALUES ('$ci', '$id', '$cod_cat','$distrito','$zona', '$superficie','$tipo_propiedad','$fecha_registro', '$tipo_impuesto')";
mysqli_query($con, $sql);
header("Location: catastro.php?ci=$ci")
?>