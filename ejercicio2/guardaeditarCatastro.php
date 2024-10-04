
<?php 
include "conexion.inc.php";
$ci=$_GET["ci"];
$id=$_GET["id"];
$cod_cat=$_GET["cod_cat"];
$distrito=$_GET["distrito"];
$zona=$_GET["zona"];
$superficie=$_GET["superficie"];
$tipo_propiedad=$_GET["tipo_propiedad"];
$fecha_registro=$_GET["fecha_registro"];
$tipo_impuesto=$_GET["tipo_impuesto"];

$sql = "update catastro set cod_cat='$cod_cat', distrito='$distrito', zona='$zona', 
superficie='$superficie', tipo_propiedad='$tipo_propiedad', fecha_registro='$fecha_registro', tipo_impuesto='$tipo_impuesto' 
where ci=$ci and id = $id";

mysqli_query($con, $sql);

header("Location: catastro.php?ci=$ci");
?>
