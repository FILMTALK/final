<?php
session_start();
include_once("../config/database.php");

$id_usuario=$_SESSION['id_usuario'];

if(!(isset($id_usuario))){

	$id_usuario=$_GET['id_usuario'];
}

$collection=$bd->sigue_peli;
$pelis=$collection->find(array('id_usuario' => "$id_usuario"));

foreach ($pelis as $campos => $valor) {
    foreach ($valor as $campo => $value) {
        
        if($campo=="titulo"){

        	//include("../includes/botonDejarSeguir.html");
        	echo "<buttom id='borrarPeli' value='$id_usuario' name='$value' class='btn btn-primary borrarPeli' style='background-color:#00B8E6;border:none;outline:none;'><span class='glyphicon glyphicon-trash'></span></buttom>";
        	
            echo "<a href='../views/perfil-peli.php?peli=$value'> $value</a>";
            echo"<br>";
        }

    }
}
?>