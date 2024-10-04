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
			<div class="mb-3">
				<label for="id" class="col-sm-2 col-form-label">Id:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="id" required>
				</div>
			</div>
			<div class="mb-3">
				<label for="ci" class="col-sm-2 col-form-label">Carnet:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="ci" value="<?php echo $ci; ?>" readonly>
				</div>
			</div>
			<div class="mb-3">
				<label for="cod_cat" class="col-sm-2 col-form-label">Código Catastral:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="cod_cat" required>
				</div>
			</div>
			<div class="mb-3">
                <label for="distrito" class="form-label">Distrito:</label>
                <select class="form-control" id="distrito" name="distrito" required>
                    <option value="">Seleccione Distrito</option>
                    <?php
                    include "conexion.inc.php";
                    
                    // Obtener los distritos
                    $sql = "SELECT idD, nombreD FROM distrito";
                    $result = mysqli_query($con, $sql);

                    // Rellenar las opciones del select
                    while ($fila = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$fila['idD']."'>".$fila['nombreD']."</option>";
                    }

                    mysqli_close($con);
                    ?>
                </select>
            </div>

            <!-- llenado de la zona -->
            <div class="mb-3 ">
                <label for="zona" class="form-label">Zona:</label>
                <select class="form-control" id="zona" name="zona" required>
                    <option value="">Seleccione Zona</option>
                </select>
            </div>


			<div class="mb-3">
				<label for="superficie" class="col-sm-2 col-form-label">Superficie:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="superficie" required>
				</div>
			</div>
			<div class="mb-3">
				<label for="tipo_propiedad" class="col-sm-2 col-form-label">Tipo de Propiedad:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tipo_propiedad" required>
				</div>
			</div>
			<div class="mb-3">
				<label for="fecha_registro" class="col-sm-2 col-form-label">Fecha de Registro:</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="fecha_registro" required>
				</div>
			</div>
			<div class="mb-3">
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
	<!-- Script AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Cuando se selecciona un distrito
            $('#distrito').on('change', function(){
                var distritoID = $(this).val();
                if(distritoID){
                    // Hacer petición AJAX
                    $.ajax({
                        type: 'POST',
                        url: 'obtenerZonas.php',  
                        data: 'idD='+distritoID,
                        success: function(html){
                            $('#zona').html(html);  
                        }
                    }); 
                }else{
                    $('#zona').html('<option value="">Seleccione Zona</option>'); 
                }
            });
        });
    </script>
</body>
</html>
