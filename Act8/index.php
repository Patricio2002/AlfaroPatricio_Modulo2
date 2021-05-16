<?php
    include("./config.php");
    $conexion=connectDB();
    session_start();
        echo '
        <fieldset style=width:400px>';
        if(isset($_POST["enviar"])){ 
            //del cuestionario de abajo, verifica si la cuenta ya existe antes
            $soli="SELECT Ncuenta FROM alumno WHERE Ncuenta = '$_POST[Cuenta]';";
            $revision=mysqli_query($conexion, $soli);
            //cuenta los resultados desplegados
            $l=mysqli_num_rows($revision);
            $_SESSION["Cuenta"]=$_POST["Cuenta"];
            //Si la cuenta ya existe, redirige a las tablas
            if($l >= 1){
             header("location: Tablas.php");
            }
            //Si la cuenta no existe redirige a que llenes datos
            else{
                header("location: ./CrearCuenta.php");

            }
        }
        else{
            echo "<legend><h2>Validación de alumno</h2></legend>
            <form action='./Act8.php' method=POST>
                ingrese su numero de cuenta:
                <br><br>
                <input type='text' name='Cuenta'>
                <br><br>
                <input type='submit' name='enviar' value='enviar'>
            </form>
        </fieldset>";
        }
?>