<?php
include_once("../config/database.php");
// Se importan las funciones para comprobar u obtener datos
include_once("../funciones/usuarios.php");

// Se guarda el valor de la variable GET
$usuario=$_GET['usuario'];

//funcion para obtener la id de usuario con el nombre

$id_usuario=obtenerIdNombre($usuario);

// Se establece la colección sigue_peli
$collection=$bd->sigue_peli;
$pelis=$collection->find(array('id_usuario' => "$id_usuario"));
// Variable local
$id_documento;
// Se recorren los datos del usuario
foreach ($pelis as $campos => $valor) {
   
    foreach ($valor as $campo => $value) {

        if($campo=="_id"){
             echo "<tr id='fila_".$value."'>";
             $id_documento=$value;
        }
        
        if($campo=="titulo"){

            echo "<td>";
                echo "<span class='glyphicon glyphicon-film'></span>";
            echo "</td>";
            echo "<td>";    
                echo " <a class='apilink' href='../views/perfil-peli.php?peli=$value'> $value</a>";
                echo"<br>";
            echo "</td>";
        }
    }
    echo "</tr>";
}
?>