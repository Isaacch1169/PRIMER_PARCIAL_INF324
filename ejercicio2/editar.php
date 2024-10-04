<?php 
include "conexion.inc.php";
$ci = $_GET["ci"];
$sql = "SELECT * FROM persona WHERE ci = $ci";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$ci = $fila["ci"];
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];
$materno = $fila["materno"];
$contrasenia = $fila["contrasenia"];
$id_rol = $fila["id_rol"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Usuario</h1>
        
        <form action="guardaeditar.php" method="GET" class="bg-light p-5 rounded shadow">
            <div class="mb-3">
                <label for="ci" class="form-label">Carnet</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>">
            </div>
            <div class="mb-3">
                <label for="materno" class="form-label">Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $materno; ?>">
            </div>
            <div class="mb-3">
                <label for="contrasenia" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contrasenia" name="contrasenia" value="<?php echo $contrasenia; ?>">
            </div>
            <div class="mb-3">
                <label for="id_rol" class="form-label">Id Rol</label>
                <input type="text" class="form-control" id="id_rol" name="id_rol" value="<?php echo $id_rol; ?>">
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" name="Aceptar" class="btn btn-secondary">Aceptar</button>
                <button type="submit" name="Cancelar" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
