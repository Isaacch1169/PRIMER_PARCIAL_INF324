<?php
session_start();

if(isset($_SESSION["rol"])){
    if ($_SESSION["rol"] != 1) {
        echo "Acceso denegado. Solo los funcionarios pueden registrar personas.";
        header("location: login.php");    
    }
}
else{
    header("location: login.php");
}
// Aquí va el formulario para registrar personas y propiedades
?>

<?php 
include "conexion.inc.php";
$sql="select * from persona";
$resultado=mysqli_query($con, $sql);
?>
<html>
<head>
	<title>Mi Pagina</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="miestilo.css">
</head>
<body>
    <header>
    </header>
	
	<main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<h1>Usuarios</h1>
		<table class="table table-striped">
			<thead>
			<tr>	
				<th scope="col">ci</th>
				<th scope="col">nombre</th>
				<th scope="col">paterno</th>
                <th scope="col">materno</th>
                <th scope="col">contraseña</th>
                <th scope="col">id_rol</th>
				<th scope="col">Operaciones</th>
			</tr>
			</thead>
			<tbody class="table-group-divider">
			<?php
			while($fila=mysqli_fetch_array($resultado))
			{
				echo "<tr>";
				echo "<td scope='row'>$fila[ci]</td>";
				echo "<td scope='row'>$fila[nombre]</td>";
				echo "<td scope='row'>$fila[paterno]</td>";
                echo "<td scope='row'>$fila[materno]</td>";
                echo "<td scope='row'>$fila[contrasenia]</td>";
                echo "<td scope='row'>$fila[id_rol]</td>";
				echo "<td scope='row'>";
				echo "<a class='btn btn-secondary' href='editar.php?ci=$fila[ci]'>Editar</a>";
				echo "<a class='btn btn-danger' href='eliminar.php?ci=$fila[ci]'>Eliminar</a>";
				echo "<a class='btn btn-secondary' href='catastro.php?ci=$fila[ci]'>Ver Catastro</a>";
				echo "</td>";
				echo "</tr>";
			}
			?>
			</tbody>
		</table>
		<a class="btn btn-primary" href='nuevo.php'>Insertar nuevo usuario</a>
	</main>
</body>
</html>