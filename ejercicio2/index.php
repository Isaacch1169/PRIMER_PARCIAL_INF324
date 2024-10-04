<?php
 session_start();
 if(isset( $_SESSION["rol"])){
    if($_SESSION["rol"] == -1){
        header("location: login.php");
    }
 }
else{
    header("location: login.php");
}
?>

<?php
header("location: login.php");
?>