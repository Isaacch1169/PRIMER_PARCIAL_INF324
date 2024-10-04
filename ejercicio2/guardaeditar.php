
<?php 
include "conexion.inc.php";
$ci = $_GET["ci"];
$nombre = $_GET["nombre"];
$paterno = $_GET["paterno"];
$materno = $_GET["materno"];
$contrasenia = $_GET["contrasenia"];
$id_rol = $_GET["id_rol"];

$sql = "update persona set nombre='$nombre', paterno='$paterno', materno='$materno', contrasenia='$contrasenia', id_rol='$id_rol' where ci=$ci";

mysqli_query($con, $sql);

header("Location: funcionario.php");
?>
