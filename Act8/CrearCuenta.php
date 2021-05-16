<?php
    include("./config.php");
    $conexion=connectDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./Verificacion.php " method="POST">
        <h3>Nombre(s)</h3>
        <input type="text" name="nombre" required>
        <br><br>
        <h3>Apellido Paterno:</h3>
        <input type="text" name="ApeP"required>
        <br><br>
        <h3>Apellido Materno</h3>
        <input type="text" name="ApeM"required>
        <br><br>
        <h3>Área elegida</h3><
        <select name="area">
            <option value="1">Area I.- Fisico Matemáticas y las ingenierías</option>
            <option value="2">Area II.- Ciencias Biológicas y de la salud</option>
            <option value="3">Area III.- Ciencias Sociales</option>
            <option value="4">Area IV.- Humandisades Y Artes</option>
        </select>
        <br><br>
        <h3>CARRERA</h3>
        <select name='carrera'>
        <?php
            $Q="";
            //extrae las carreras
            $Q="SELECT * FROM carrera;";
            $R=mysqli_query($conexion, $Q);
            //Coloca las carreras en un select
            while($arreglo=mysqli_fetch_array($R)){
                echo "<option value=$arreglo[0]>$arreglo[1]</option>";
            }
        ?>
        </select>
        <br><br>
        <input type="submit" name="enviar" value="continuar">
    </form>
</body>
</html>