<?php 
    include('conexion.php');
    
    $search = $_POST['search'];

    if(!empty($search))
    {
        $consulta = mysqli_query($conectar,"SELECT * FROM tareas WHERE nombre LIKE '$search%'");
        
        if($consulta == false){
            die("Error de consulta".mysqli_error($conectar));
        }
        $json = array();
        while($row=mysqli_fetch_array($consulta)){
            $json[] = array(
                'name'=>$row['nombre'],
                'descripcion'=>$row['descripcion'],
                'id'=>$row['id']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;

    }


?>