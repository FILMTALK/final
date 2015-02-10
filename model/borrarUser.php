<?php
// Se importa database.php para realizar consultas a la base de datos
include_once("../config/database.php");
// Se guarda la variable GET id
$id=$_GET['id'];
// Se establece la colección de usuarios
$collection=$bd->usuarios;
// Se elimina el registro de usuario con ese id 
$eliminar=$collection->remove( array( '_id' => new MongoID($id)));
?>