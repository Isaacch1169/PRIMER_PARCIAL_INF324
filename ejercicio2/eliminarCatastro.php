<?php 
include "conexion.inc.php";
$ci=$_GET["ci"];
$id=$_GET["id"];
$sql="delete from catastro where ci=$ci and id=$id";
mysqli_query($con, $sql);
header("Location: catastro.php?ci=$ci");
?>