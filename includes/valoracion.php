<?php
// Se importa la conexión con la bd
include_once("../config/database.php");
// Funciones
include_once("../funciones/peliculas.php");
// Variable local
$id_pelicula;
// Se comrprueba si la variable GET contien un valor
if(isset($_GET['id_pelicula'])){
    // Si tiene valor, se guarda en la variable
    $id_pelicula=$_GET['id_pelicula'];           
}
// Se establece la colección
$collection=$bd->valoracion;
// Se obtiene la media de la película mediante la id_pelicula
$media=mediaValoracion("$id_pelicula");
// El resultado se multiplica por 2
$media=$media*2;
// Convierte un número en un entero
$media=round($media,2);
// Se obtiene el número de votos de la película
$votos=cantVotos("$id_pelicula");
// Muestra la media y el número de votos
echo "<h3>Nota: ". $media ."</h3><h3>       Votos: ". $votos ."</h3>";
?>