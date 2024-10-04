<?php 
include "conexion.inc.php";
$ci = $_GET["ci"];
$id = $_GET["id"];
$sql = "SELECT * FROM catastro WHERE ci = $ci AND id = $id";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$ci = $fila["ci"];
$id = $fila["id"];
$cod_cat = $fila["cod_cat"];
$distrito = $fila["distrito"];
$zona = $fila["zona"];
$superficie = $fila["superficie"];
$tipo_propiedad = $fila["tipo_propiedad"];
$fecha_registro = $fila["fecha_registro"];
$tipo_impuesto = $fila["tipo_impuesto"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Catastro</h1>
        
        <form action="guardaeditarCatastro.php" method="GET" class="bg-light p-5 rounded shadow">
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">Carnet</label>
                <input type="number" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="cod_cat" class="form-label">Código Catastral</label>
                <input type="number" class="form-control" id="cod_cat" name="cod_cat" value="<?php echo $cod_cat; ?>">
            </div>
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="number" class="form-control" id="distrito" name="distrito" value="<?php echo $distrito; ?>">
            </div>
            <div class="mb-3">
                <label for="zona" class="form-label">Zona</label>
                <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona; ?>">
            </div>
            <div class="mb-3">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="number" class="form-control" id="superficie" name="superficie" value="<?php echo $superficie; ?>">
            </div>
            <div class="mb-3">
                <label for="tipo_propiedad" class="form-label">Tipo de Propiedad</label>
                <input type="text" class="form-control" id="tipo_propiedad" name="tipo_propiedad" value="<?php echo $tipo_propiedad; ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?php echo $fecha_registro; ?>">
            </div>
            <div class="mb-3">
                <label for="tipo_impuesto" class="form-label">Tipo de Impuesto</label>
                <input type="text" class="form-control" id="tipo_impuesto" name="tipo_impuesto" value="<?php echo $tipo_impuesto; ?>">
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" name="Aceptar" class="btn btn-secondary">Aceptar</button>
                <button type="submit" name="Cancelar" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
