<?php

                    include_once("../config/database.php");

                    $id_usuario=$_SESSION['id_usuario'];

                    if(!(isset($id_usuario))){

                        $id_usuario=$_GET['id_usuario'];
                    }

                    $collection=$bd->sigue_peli;
                    $pelis=$collection->find(array('id_usuario' => "$id_usuario"));

                    $id_documento;

                    foreach ($pelis as $campos => $valor) {
                       
                        foreach ($valor as $campo => $value) {

                            if($campo=="_id"){
                                 echo "<tr id='fila_".$value."'>";
                                 $id_documento=$value;
                            }
                            
                            if($campo=="titulo"){

                                echo "<td>";
                                    include("../includes/botonDejarSeguir.html");
                                    //echo "<a id='$id_usuario' name='$value' class='btn btn-primary borrarPeli' onclick='noSeguir($id_documento)' style='background-color:#00B8E6;border:none;outline:none;'><span class='glyphicon glyphicon-trash'></span></a>";
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