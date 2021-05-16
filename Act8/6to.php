<?php
    session_start();
    include("./config.php");
    $i=0;
    $e=0;
    $conexion=connectDB();
    //calcula el promedio de la calificacion de 5to. Linea & suma, Linea 9 division;
    $calif5=$_POST["0"]+$_POST["1"]+$_POST["2"]+$_POST["3"]+$_POST["4"]+$_POST["5"]+$_POST["6"]+$_POST["7"]+$_POST["8"]+$_POST["9"]+$_POST["10"]+$_POST["11"];
    $calif5=$calif5/12;
    $_SESSION["calif5"]=$calif5;
    //extrae las asignaturas de sexto que NO son optativas
    $asig="SELECT * FROM asignaturas WHERE Area = $_SESSION[area] AND Optativa != 'S' OR Area = 0 AND Optativa != 'S' AND anio=6;";
    $res2=mysqli_query($conexion, $asig);
    echo "<h2>Calificaciones VI</h2>";
    echo "<form action=./Prom6to.php method=POST>";
    //Despliega las calificaciones de sexto que NO son optativas
    while($arreglo=mysqli_fetch_array($res2)){
            echo "<h3>$arreglo[1]</h3>";
            echo "<input type=text name=$i required>";
            $i++;
            echo "<br>";
    }
    //extrae las asignaturas de sexto que SON optativas
    $asig2="SELECT * FROM asignaturas WHERE Area = $_SESSION[area] AND Optativa = 'S' OR Area = 0 AND Optativa = 'S' AND anio=6;";
    $res3=mysqli_query($conexion, $asig2);
    echo "<h3>Optativas:</h3>";
    echo "<select name=optativa>";
     //Coloca las calificaciones de sexto que SON optativas en un select
    while($arreglo2=mysqli_fetch_array($res3)){
        echo "<option value=$arreglo2[0]>$arreglo2[1]</option>";
    }
    echo "</select>";
    echo "<br>";
    echo "<input type=text name=$i required>";
    echo "<br>";
    echo "<input type=submit value=continuar>";
    echo "</form>";
?>