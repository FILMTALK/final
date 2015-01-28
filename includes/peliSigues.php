<?php

include_once("../config/database.php");
$id_usuario=$_SESSION['id_usuario'];
$collection=$bd->sigue_peli;
$pelis=$collection->find(array('id_usuario' => "$id_usuario"));

if(!isset($id_usuario)){
	$id_usuario=$_GET['id_usuario'];
}

$peli_id;

foreach ($pelis as $campos => $valor) {
    foreach ($valor as $campo => $value) {
        
        if($campo=="titulo"){


            include("../includes/botonDejarSeguir.html");
            echo "<a href='../views/perfil-peli.php?peli=$value'> $value</a>";
            echo"<br>";
        }

    }
}
?>