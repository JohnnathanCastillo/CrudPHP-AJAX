<?php 
    include('conexion.php');

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        
        $eliminar = mysqli_query($conectar," DELETE FROM tareas WHERE id = $id ");

        if(!$eliminar){
            die('error del query');
        }
        echo "tarea eliminada";
    }    
?>