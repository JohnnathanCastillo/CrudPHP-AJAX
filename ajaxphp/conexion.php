<?php 

    $user = "root";
    $pass = "";
    $ser = "localhost";
    $db = "ajax";

    $conectar = mysqli_connect($ser , $user, $pass, $db);

    if(!$conectar)
    {
        echo "no se pudo conectar";
    }else
    {
        //echo "conexion correcta";
    }

?>