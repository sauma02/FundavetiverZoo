<?php
$servidor ="localhost";
$baseDeDatos ="funzoo";
$usuario ="root";
$contrasenia ="";
//por medio de un try catch se verifica la conexion
try{
    // PDO sirve para establece la conexion a la base de datos
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
   

}catch(Exception $error){
    //si hay un error muestrame el mensaje, con la flecha, si hay error busca el mensaje
    echo $error->getMessage();
}


?>