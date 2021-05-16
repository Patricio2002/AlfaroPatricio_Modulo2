<?php
    include("./config.php");
    $conexion=connectDB();
    session_start();
        //inserta en la BD todos los resultados extraidos del cuestionario
        $cuenta="INSERT INTO alumno (Ncuenta, Promedio_cuarto, Promedio_quinto, Promedio_sexto, Nombre, ApellidoP, ApellidoM, Area, id_pase)
         VALUES ('$_SESSION[Cuenta]', '$_SESSION[calif4]','$_SESSION[calif5]', '$_SESSION[calif6] '$_SESSION[nombre]', '$_SESSION[ApeP]', '$_SESSION[ApeM]', '$_SESSION[area]', '$_SESSION[id_pase]');";
        echo $cuenta;
        //guarda el promedio final
        $_SESSION["PromFinal"]=($_SESSION['calif4']+$_SESSION['calif5']+$_SESSION['calif6'])/3;
        header("location: ./Tablas.php");
?>