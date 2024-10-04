<?php
// Capturamos el código catastral del formulario
$cod_cat = $_GET['cod_cat'];

// Redirigimos a la aplicación JAVA pasando el parámetro cod_cat
header("Location: http://localhost:8080/webAplicationEjercicio4/obtenerImpuesto?cod_cat=" . $cod_cat);
exit();
?>