<?php
if(isset($_POST['idD']) && !empty($_POST['idD'])){
    
    include "conexion.inc.php";

    $id_distrito = $_POST['idD'];

    // Consulta para obtener las zonas del distrito seleccionado
    $sql = "SELECT idZ, nombreZ FROM zona WHERE idD = $id_distrito";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        echo '<option value="">Seleccione Zona</option>';
        while($fila = mysqli_fetch_assoc($result)){
            echo '<option value="'.$fila['idZ'].'">'.$fila['nombreZ'].'</option>';
        }
    } else {
        echo '<option value="">No hay zonas disponibles</option>';
    }

     mysqli_close($con);
}
?>
