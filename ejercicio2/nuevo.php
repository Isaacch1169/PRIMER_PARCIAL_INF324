<html>
<head>
	<title>Insertar Usuario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	<div class="container mt-5">
		<h1 class="mb-4">Insertar Usuario</h1>
		<form action="insertar.php" method="post">
			<div class="mb-3">
				<label for="ci" class="form-label">Carnet</label>
				<input type="number" class="form-control" name="ci" id="ci" required>
			</div>
			<div class="mb-3">
				<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre" required>
			</div>
			<div class="mb-3">
				<label for="paterno" class="form-label">Paterno</label>
				<input type="text" class="form-control" name="paterno" id="paterno" required>
			</div>
			<div class="mb-3">
				<label for="materno" class="form-label">Materno</label>
				<input type="text" class="form-control" name="materno" id="materno" required>
			</div>
			<div class="mb-3">
				<label for="contrasenia" class="form-label">Contraseña</label>
				<input type="password" class="form-control" name="contrasenia" id="contrasenia" required>
			</div>
			<div class="mb-3">
				<label for="id_rol" class="form-label">ID Rol</label>
				<input type="number" class="form-control" name="id_rol" id="id_rol" required>
			</div>
			<button type="submit" class="btn btn-primary">Insertar</button>
			<a class="btn btn-secondary" href="funcionario.php">Regresar</a>
		</form>
	</div>
</body>
</html>
