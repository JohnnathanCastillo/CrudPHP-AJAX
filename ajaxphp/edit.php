<?php 
    include("conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['name'];
    $descripcion =  $_POST['descripcion'];

    $actualizar = mysqli_query($conectar, "UPDATE tareas SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id");

        if(!$actualizar){
            die("Error al actualizar");
        }

        echo "Actualizado";

?>