<?php
// Se importa la bd
include_once("../config/database.php");

$usuario=$_SESSION['nombreUsuario'];
if(!(isset($usuario))){
    // Se guarda el valor de la variable GET
    $usuario=$_GET['nUsuario'];
}
$amigo_usu=$_GET['usuario'];
$collection=$bd->sigue_amigos;

$amigo=$collection->find(array('usuario' => "$usuario",'amigo' => "$amigo_usu"));

if($amigo->count() == 0){

 	echo "<button class='btn btn-info' id='anadirAmigo' name='$usuario' value='$amigo_usu'
        style='background-color:#66cccc; color:#fff; border:none; opacity:0.7; padding-left:5px;
        margin-right:10px;
        outline:none;'><span class='glyphicon glyphicon-plus'></span>Añadir amigo</button>";
}else{
	echo "<button class='btn btn-info' id='anadirAmigo' name='$usuario' value='$amigo_usu'
        style='background-color:#66cccc; color:#fff; border:none; opacity:0.7; padding-left:5px;
        margin-right:10px;
        outline:none;'>Amigo<span class='glyphicon glyphicon-ok'></span></button>";
}
?>