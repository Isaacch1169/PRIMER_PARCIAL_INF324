<?php
include "conexion.inc.php";


$sql = "
    SELECT
        p.ci,
        p.nombre,
        SUM(CASE WHEN c.tipo_impuesto = 'Alto' THEN 1 ELSE 0 END) AS Impuesto_Alto,
        SUM(CASE WHEN c.tipo_impuesto = 'Medio' THEN 1 ELSE 0 END) AS Impuesto_Medio,
        SUM(CASE WHEN c.tipo_impuesto = 'Bajo' THEN 1 ELSE 0 END) AS Impuesto_Bajo
    FROM
        persona p
    JOIN
        catastro c ON p.ci = c.ci
    GROUP BY
        p.ci, p.nombre;
";

$resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas por Tipo de Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 <?php
 
if (mysqli_num_rows($resultado) > 0) {
 
    echo "
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Carnet de Identidad</th>
                <th>Nombre</th>
                <th>Impuesto Alto</th>
                <th>Impuesto Medio</th>
                <th>Impuesto Bajo</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['ci'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['Impuesto_Alto'] . "</td>";
        echo "<td>" . $fila['Impuesto_Medio'] . "</td>";
        echo "<td>" . $fila['Impuesto_Bajo'] . "</td>";
        echo "</tr>";
    }

    echo "
        </tbody>
    </table>
    ";

} else {
    echo "No se encontraron registros.";
}

mysqli_close($con);
?>
   
</body>
</html>
