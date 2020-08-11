<?php
    include('conexion.php');
    $listar = mysqli_query($conectar,"SELECT * FROM tareas");
    if(!$listar)
    {
        die("Error en la consulta".mysqli_error);
    }
    $json = array();
    while($fila = mysqli_fetch_array($listar))
    {
        $json[] = array(
            'id'=>$fila['id'],
            'nombre'=>$fila['nombre'],
            'descripcion'=>$fila['descripcion']
        );
    }
    $jsonstring = json_encode($json);

    echo $jsonstring;
        
?>