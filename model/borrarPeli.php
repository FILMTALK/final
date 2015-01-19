<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/peliculas.php");

$id=$_GET['id'];

$collection=$bd->peliculas;

$eliminar=$collection->remove( array( '_id' => new MongoID($id)));

?>