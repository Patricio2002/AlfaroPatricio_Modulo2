<?php
    $i=0;
    session_start();
    include("./config.php");
    $conexion=connectDB();
    if(isset($_POST["ubicacion"])){
        //guarda el id_de la carrera en base a la modalidad y ubicacion elegida
        $r="SELECT id_pase FROM pase_regla WHERE id_ubicacion = $_POST[ubicacion] AND id_modalidad = $_POST[modalidad] AND clave_carrera=$_SESSION[carrera];";
        $res=mysqli_query($conexion, $r);
       $arreglo=mysqli_fetch_array($res);
       $_SESSION["id_pase"]=$arreglo[0];
    }
    //guarda el id de la carrera si esta solo tiene una modalidad y ubicacion
    else{
        $r="SELECT id_pase FROM pase_regla WHERE clave_carrera=$_SESSION[carrera];";
        $res=mysqli_query($conexion, $r);
        $arreglo=mysqli_fetch_array($res);
        $_SESSION["id_pase"]=$arreglo[0]; 
    }
    //extrae los nombres de las asignaturas de cuarto
    $asig="SELECT Nombre FROM asignaturas WHERE Anio = 4;";
    $res2=mysqli_query($conexion, $asig);
    echo "<h2>Calificaciones IV</h2>";
    echo "<form action=./5to.php method=POST>";
    //despliega las asignaturas de cuarto
    while($arreglo=mysqli_fetch_array($res2)){
        echo "<h3>$arreglo[0]</h3>";
        echo "<input type=text name=$i required>";
        $i++;
        echo "<br>";
    }
    echo "<input type=submit value=continuar>";
    echo "</form>";
?>