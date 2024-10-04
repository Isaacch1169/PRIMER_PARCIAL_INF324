<?php 
$ci = $_GET["ci"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Insertar Usuario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<div class="container mt-5">
		<h1 class="text-center mb-4">Nuevo catastro</h1>
		
			<form action="insertarCatastro.php" method="post" class="bg-light p-5 rounded shadow">
			<div class="mb-3 row">
				<label for="id" class="col-sm-2 col-form-label">Id:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="id" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ci" class="col-sm-2 col-form-label">Carnet:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="ci" value="<?php echo $ci; ?>" readonly>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cod_cat" class="col-sm-2 col-form-label">Código Catastral:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="cod_cat" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="distrito" class="col-sm-2 col-form-label">Distrito:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="distrito" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="zona" class="col-sm-2 col-form-label">Zona:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="zona" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="superficie" class="col-sm-2 col-form-label">Superficie:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="superficie" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tipo_propiedad" class="col-sm-2 col-form-label">Tipo de Propiedad:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tipo_propiedad" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="fecha_registro" class="col-sm-2 col-form-label">Fecha de Registro:</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="fecha_registro" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tipo_impuesto" class="col-sm-2 col-form-label">Tipo de Impuesto:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tipo_impuesto" required>
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<button type="submit" class="btn btn-primary">Insertar</button>
			</div>
		</form>
	</div>
</body>
</html>
