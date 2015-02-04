<?php 
include_once("../config/database.php");
// Se guarda la variable de ssión
$id_usuario=$_SESSION['id_usuario'];
$pelicula=$_GET['peli']; // Se obtiene del método GET
$collection=$bd->sigue_peli; // Se establece la colección
// Tiene que coincidir tanto el título de la película como el id del usuario en el mismo registro
$sigue=$collection->find(array('titulo' => "$pelicula",'id_usuario' => "$id_usuario"));
// Si no coinciden --> no hay datos
if($sigue->count() == 0):
	// Aparece el botón seguir
    include_once("../includes/botonSeguir.html");
else: include_once("../includes/botonSiguiendo.html"); // Muestra el botón siguiendo
endif;
?>