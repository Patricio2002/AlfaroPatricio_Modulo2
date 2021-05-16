<?php
    session_start();
    include("./config.php");
    $conexion=connectDB();
    //selecciona los datos del usuario
    $t1="SELECT * FROM alumno WHERE Ncuenta = $_SESSION[Cuenta]";
    $res=mysqli_query($conexion, $t1);
    $arreglo=mysqli_fetch_array($res);
    echo "<h1>Esta es su hoja de resultados con base a sus datos proporcionados</h1>
    <h3>Datos personales del alumno</h3>
    <table border=1>
        <thead>
            <th>No. de cuenta</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Promedio 4to</th>
            <th>Promedio 5to</th>
            <th>Promedio 6to</th>
            <th>Promedio final</th>
            <th>Area</th>

        </thead>
    <tbody>
        <tr>
            <td>$_SESSION[Cuenta]</td>
            <td>$_SESSION[nombre]</td>
            <td>$_SESSION[ApeP]</td>
            <td>$_SESSION[ApeM]</td>
            <td>$_SESSION[calif4]</td>
            <td>$_SESSION[calif5]</td>
            <td>$_SESSION[calif6]</td>
            <td>$_SESSION[PromFinal]</td>
            <td>$_SESSION[area]</td>
        </tr>
    </tbody>
    </table>";
    echo "<br><br>
    <h3>Carrera Solicitada</h3>";
    //seleciiona  la informacion de la carrera que quiere junto con su modalidad y ubicacion
    $t2= "SELECT * FROM pase_regla JOIN modalidad ON modalidad.id_modalidad = pase_regla.id_modalidad 
    JOIN ubicacion ON ubicacion.id_ubicacion = pase_regla.id_ubicacion WHERE id_pase = $_SESSION[id_pase];";
    $res2=mysqli_query($conexion, $t2);
    $arreglo2= mysqli_fetch_array($res2);
    //Selecciona el nombre de la carrera
    $t2_1="SELECT Nombre FROM carrera WHERE clave_carrera=$_SESSION[carrera];";
    $res3=mysqli_query($conexion, $t2_1);
    $arreglo3 = mysqli_fetch_array($res3);
    echo " 
    <table border=1>
        <thead>
            <th>Carrera</th>
            <th>Modalidad</th>
            <th>ubicacion</th>
            <th>Probabilidad de entrar</th>
        </thead>
        <tbody>
        <td>$arreglo3[0]</td>
        <td>$arreglo2[6]</td>
        <td>$arreglo2[8]</td>";
        //revisa si la probabilidad de entrar es alta media o baja dependiendo de la diferencia que haya entre su calificacion y el ingreso
        if($_SESSION["PromFinal"]-$arreglo2[4]>0.5){
            echo "<td>Alta</td>";
        }
        elseif($_SESSION["PromFinal"]-$arreglo2[4]<= 0.5 && $_SESSION["PromFinal"]-$arreglo2[4] >= -0.5){
            echo "<td>Media</td>";
        }
        elseif($arreglo2[4]==0){
            echo "<td>Carrera de ingreso indirecto</td>";
        }
        else{
           echo "<td>Baja</td>";
        }
        echo "</tbody>";
    echo "</table>";
?>
<br><br>
<form action="./cerrar" method="POST">
<input type="submit" value="Regresar">
</form>
