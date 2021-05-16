<?php
    session_start();
    include("./config.php");
    $conexion=connectDB();
    if(isset($_POST["CERRAR"])){
        $borrar="DELETE FROM alumno WHERE Ncuenta = $_SESSION[Cuenta];";
        session_unset();
        session_destroy();
    }
    header("location: ./index.php");
?>