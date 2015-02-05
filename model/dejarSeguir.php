<?php

// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se guarda el dato obtenido
$id_documento=$_GET['id'];
// Se establece la colección
$collection=$bd->sigue_peli;
// Elimina el registro mediante el id
$eliminar=$collection->remove(array( '_id' => new MongoID($id_documento)));

?>