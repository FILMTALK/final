<?php
    include_once("../config/database.php");
    $id_pelicula;
    // Se comprueba si la variable GET tiene algún valor
    if(isset($_GET['id_pelicula'])){
        // Si no tiene valor, se guarda en la variable local
        $id_pelicula=$_GET['id_pelicula'];           
    }
    $collection=$bd->criticas;
    $comenta = $collection->find(array('id_pelicula' => "$id_pelicula"));
    $id_usuario;
    $critica;
    $username;
    // Se recorre el array bidimensional de la película
    foreach ($comenta as $campo => $valor) {

        foreach ($valor as $coment => $datos) {

            if($coment=="id_usuario"){
            
                $id_usuario=$datos; 

                $collection=$bd->usuarios;
                $usuarios = $collection->findOne(array('_id' => new MongoId($id_usuario)));

                foreach ($usuarios as $campo => $valor) {

                    if($campo=="usuario"){
                    
                        echo "<b>".$valor."</b><br/>";
                    }             
                    
                }
            } 

            if($coment=="comentario"){
            
                echo $datos."<br/><br/><br/>";
            }
        }       
    }
?>