<?php 
//Se abre y se destruye la sesion para cerrar todas las sesiones
session_start();
session_destroy();
header("Location:../index.php");
?>