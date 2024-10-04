<?php
include 'conexion.inc.php';


$id = $_POST['id'];
$ci = $_POST['ci'];
$cod_cat = $_POST['cod_cat'];
$distrito_id = $_POST['distrito'];
$zona_id = $_POST['zona'];
$superficie = $_POST['superficie'];
$tipo_propiedad = $_POST['tipo_propiedad'];
$fecha_registro = $_POST['fecha_registro'];
$tipo_impuesto = $_POST['tipo_impuesto'];

//obtenemos el nombre del distrito
$sqlDistrito = "SELECT nombreD FROM distrito WHERE idD = $distrito_id";
$resultDistrito = mysqli_query($con, $sqlDistrito);
$distrito = mysqli_fetch_assoc($resultDistrito)['nombreD'];

// nnombre de la zona
$sqlZona = "SELECT nombreZ FROM zona WHERE idZ = $zona_id";
$resultZona = mysqli_query($con, $sqlZona);
$zona = mysqli_fetch_assoc($resultZona)['nombreZ'];

$sqlInsert = "INSERT INTO catastro (id, ci, cod_cat, distrito, zona, superficie, tipo_propiedad, fecha_registro, tipo_impuesto) 
              VALUES ('$id', '$ci', '$cod_cat', '$distrito', '$zona', '$superficie', '$tipo_propiedad', '$fecha_registro', '$tipo_impuesto')";

if (mysqli_query($con, $sqlInsert)) {
    echo "Registro insertado con éxito.";
} else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($con);
}

mysqli_close($con);
header("Location: catastro.php?ci=$ci")
?>
