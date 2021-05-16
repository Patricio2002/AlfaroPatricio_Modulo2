<?php
    session_start();
    //guarda los datos de su calificacion el 6to
    $calif6=$_POST["0"]+$_POST["1"]+$_POST["2"]+$_POST["3"]+$_POST["4"]+$_POST["5"]+$_POST["6"]+$_POST["7"]+$_POST["8"];
    $calif6=$calif6/9;
    $_SESSION["calif6"]=$calif6;
    header("location: GuardarDatosCuenta.php");
?>