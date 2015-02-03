<?php


        include_once("../config/database.php");

        include_once("../funciones/peliculas.php");

        $id_pelicula;

        if(isset($_GET['id_pelicula'])){
            $id_pelicula=$_GET['id_pelicula'];           
        }

        // Establecemos la colección
        $collection=$bd->valoracion;

        $media=mediaValoracion("$id_pelicula");

        $media=$media*2;

        $media=round($media,2);

        $votos=cantVotos("$id_pelicula");

        echo "<h3>Nota: ". $media ."</h3><h3>       Votos: ". $votos ."</h3>";

?>