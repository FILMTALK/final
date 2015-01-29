<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");

$id_documento=$_GET['id'];

$collection=$bd->sigue_peli;

$eliminar=$collection->remove(array( '_id' => new MongoID($id_documento)));


?>
