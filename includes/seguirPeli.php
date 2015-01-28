<?php 

include_once("../config/database.php");
$collection=$bd->sigue_peli;
$id_usuario;
$id_pelicula;
$sigue=$collection->find(array('titulo' => "$id_pelicula",'id_usuario' => "$id_usuario"));
if($sigue->count() == 0):
    include_once("../includes/botonSeguir.html");

else: include_once("../includes/botonSiguiendo.html");
endif;
?>