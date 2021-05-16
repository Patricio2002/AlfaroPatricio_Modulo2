<?php
    session_start();
    include("./config.php");
    $i=0;
    $conexion=connectDB();
    //se calcula el promedio de 4to. Liena 6 suma, linea 7 division
    $calif4=$_POST["0"]+$_POST["1"]+$_POST["2"]+$_POST["3"]+$_POST["4"]+$_POST["5"]+$_POST["6"]+$_POST["7"]+$_POST["8"]+$_POST["9"]+$_POST["10"]+$_POST["11"];
    $calif4=$calif4/12;
    $_SESSION["calif4"]=$calif4;
    //extrae las asignaturas de 5to
    $asig="SELECT Nombre FROM asignaturas WHERE Anio = 5;";
    $res2=mysqli_query($conexion, $asig);
    echo "<h2>Calificaciones V</h2>";
    echo "<form action=./6to.php method=POST>";
    //despliega las asignaturas de 5to en la pantalla
    while($arreglo=mysqli_fetch_array($res2)){
        echo "<h3>$arreglo[0]</h3>";
        echo "<input type=text name=$i required>";
        $i++;
        echo "<br>";
    }
    echo "<input type=submit value=continuar>";
    echo "</form>";
?>