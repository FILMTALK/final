<?php
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/peliculas.php");
// Se guarda la variable GET id
$id=$_GET['id'];
// Se establece la colección de peliculas
$collection=$bd->peliculas;
// Se elimina el registro de usuario con ese id 
$eliminar=$collection->remove( array( '_id' => new MongoID($id)));
?>