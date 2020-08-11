<?php 
    include('conexion.php');
    if(isset($_POST['name'])){
        $nombre = $_POST['name'];
        $descripcion = $_POST['descripcion'];

        $insertar = mysqli_query($conectar,"INSERT INTO tareas (nombre, descripcion) values ('$nombre', '$descripcion')");

        if(!$insertar){
            die("consulta ha fallado");
        }else{
            echo "Tarea Agregada";
        }
        
    }

?>