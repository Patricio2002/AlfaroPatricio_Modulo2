<?PHP
    session_start();
    include("./config.php");
    $conexion=connectDB();
    //almacena todos los datos enviados en la creacion de la cuenta en sesiones
    $_SESSION["nombre"]=$_POST["nombre"];
    $_SESSION["ApeP"]=$_POST["ApeP"];
    $_SESSION["ApeM"]=$_POST["ApeM"];
    $_SESSION["area"]=$_POST["area"];
    $_SESSION["carrera"]=$_POST["carrera"];
    //extrae la cantidad de carreras que existen
    $r="SELECT * FROM pase_regla WHERE clave_carrera LIKE('$_SESSION[carrera]');";
    $res=mysqli_query($conexion, $r);
    $cont=mysqli_num_rows($res);
    //si la carrera tiene mas de una ubicacion o modalidad
    if($cont>1){ 
        echo "<form action=./4to.php method=POST>";
            //extrae todas las modalidades de la carrera seleccionada
            $p="SELECT * FROM modalidad JOIN pase_regla ON modalidad.id_modalidad = pase_regla.id_modalidad WHERE  clave_carrera= '$_SESSION[carrera]';";
            $res2=mysqli_query($conexion, $p);
            echo "modalidad<select name=modalidad>"; 
            //las guarda en un select
            while($arreglo=mysqli_fetch_array($res2)){
            echo "<option value=$arreglo[0]>$arreglo[1]</option>"; 
            }
            echo "</select>";
            echo "<br><br>";
            //extrae todas las ubicaciones de la carrera seleccionada
            $p="SELECT * FROM ubicacion JOIN pase_regla ON ubicacion.id_ubicacion = pase_regla.id_ubicacion WHERE clave_carrera= '$_SESSION[carrera]';";
            $res2=mysqli_query($conexion, $p);
            echo "ubicacion<select name=ubicacion>"; 
            //las guarda en un select
            while($arreglo=mysqli_fetch_array($res2)){
            echo "<option value=$arreglo[0]>$arreglo[1]</option>"; 
            }
            echo "</select>";
            echo "<br>";
            echo "<input type=submit value=continuar>";
        echo "</form>";
    }
    //SI no tiene mas de una modalidad te redirige para que ingreses promedios
    else{
        header("location: ./4to.php");
    }
?>