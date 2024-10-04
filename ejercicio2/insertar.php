<?php 
include "conexion.inc.php";
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$contrasenia = $_POST["contrasenia"];
$id_rol = $_POST["id_rol"];

$sql = "INSERT INTO persona (ci, nombre, paterno, materno, contrasenia, id_rol) VALUES ('$ci', '$nombre', '$paterno','$materno','$contrasenia', '$id_rol')";
mysqli_query($con, $sql);
header("Location: funcionario.php")
?>