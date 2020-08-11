<?php 
    include("conexion.php");

        $id = $_POST['id'];
        $editar = mysqli_query($conectar,"SELECT * FROM tareas WHERE id = $id ");

        if(!$editar){
            die("error");
        }
        $json = array();
        while($row = mysqli_fetch_array($editar))
        {
            $json[] = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'id' => $row['id']
            ); 
        }

        $stringjason = json_encode($json[0]);
        echo $stringjason;
?>