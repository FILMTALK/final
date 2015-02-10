<?php
include_once("../config/database.php");
// Se guarda la variable de sesión
$usuario=$_SESSION['nombreUsuario'];
// Se establece la colección sigue_peli
$collection=$bd->sigue_amigos;
$amigo=$collection->find(array('usuario' => "$usuario"));
// Variable local
$id_documento;
// Se recorren los datos del usuario
foreach ($amigo as $campos => $valor) {
   
    foreach ($valor as $campo => $value) {

        if($campo=="_id"){
             echo "<tr id='fila_".$value."'>";
             $id_documento=$value;
        }
        
        if($campo=="amigo"){

            echo "<td>";
                include("../includes/botonDejarSeguirAmigo.html");
            echo "</td>";
            echo "<td>";    
                echo " <a class='apilink' href='../views/profileAmigo.php?usuario=$value'> $value</a>";
                echo"<br>";
            echo "</td>";
        }
    }
    echo "</tr>";
}
?>