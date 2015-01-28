<?php 
include_once("../config/database.php");

$id_usuario=$_SESSION['id_usuario'];
$pelicula=$_GET['peli']; 
$collection=$bd->sigue_peli;

$sigue=$collection->find(array('titulo' => "$pelicula",'id_usuario' => "$id_usuario"));
if($sigue->count() == 0):
    include_once("../includes/botonSeguir.html");

else: include_once("../includes/botonSiguiendo.html");
endif;
?>