<?php
session_start();

if(isset($_SESSION["rol"])){
    if ($_SESSION["rol"] != 2) { 
        echo "Acceso denegado. Solo los Duenios pueden registrar personas.";
        header("location: login.php");
    }
}
else{
    header("location: login.php");
}

// Aquí va el formulario para registrar personas y propiedades
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    $con  =  mysqli_connect("localhost", "isaac", "123456", "BDIsaac");
    $ci = $_SESSION["carnet"];
    $sql = "SELECT * FROM catastro WHERE ci = $ci";
    $result = mysqli_query($con, $sql);
    ?>

<table class = "table table-striped">

<tr>
    <th>Id</th>
    <th>Codigo Catastro</th>
    <th>Distrito</th>
    <th>Zona</th>
    <th>Superficie</th>
    <th>Tipo de propiedad</th>
    <th>Fecha de registro</th>
  	 <th>Operaciones</th>
	

</tr>
    <?php
    // Recorre y muestra las propiedades del dueño
    echo "<h2>Propiedades</h2>";
    while ($fila = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$fila["id"]."</td>";
        echo "<td>".$fila["cod_cat"]."</td>";
        echo "<td>".$fila["distrito"]."</td>";
        echo "<td>".$fila["zona"]."</td>";
        echo "<td>".$fila["superficie"]."</td>";
        echo "<td>".$fila["tipo_propiedad"]."</td>";
        echo "<td>".$fila["fecha_registro"]."</td>";
        echo "<td scope='row'>";
        echo "<a class='btn btn-secondary' href='procesarCodigo.php?cod_cat=$fila[cod_cat]'>Ver Tipo Impuesto</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
    
</body>
</html>