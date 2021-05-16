<?php
    if(isset($_POST["CERRAR"])){
        session_unset();
        session_destroy();
    }
    header("location: ./index.php");
?>