<?php
session_start();
$con  =  mysqli_connect("localhost", "isaac", "123456", "BDIsaac");
$nombre = $_POST["nombre"];
$contrasenia = $_POST["contrasenia"];

$sql = "select count(*) cantidad, id_rol, ci
        from persona 
        where nombre='$nombre' and contrasenia='$contrasenia'";

$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
if($fila["cantidad"] != 0){
    $_SESSION["nombre"]=$nombre;
    $_SESSION["carnet"]=$fila["ci"];
    $_SESSION["rol"]=$fila["id_rol"];
    //ingresa
    if ($fila['id_rol'] == 1) { // 1 = funcionario
        header("Location: funcionario.php");
    } elseif ($fila['id_rol'] == 2) { // 2 = dueño
        header("Location: duenio.php");
    }
    
}
else{
    echo "<script>
            alert('Usuario o contraseña incorrecta');
            window.location.href = 'login.php'; 
          </script>";
}
?>