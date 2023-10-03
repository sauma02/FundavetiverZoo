<?php 
include("../../template/header.php");
include("../../db/db-connection.php");
if($_POST){
    $usu=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $pass=(isset($_POST['contrasenia']))?$_POST['contrasenia']:"";
    $idRol=(isset($_POST['idRol']))?$_POST['idRol']:"";
    $sentencia = $conexion->prepare("INSERT INTO usuarios(id, usuario, password, idrol) VALUES (NULL, :usuario, :contrasenia, :idRol)");
    $sentencia->bindParam(":usuario", $usu);
    $sentencia->bindParam(":contrasenia", $pass);
    $sentencia->bindParam(":idRol", $idRol);
    $sentencia->execute();
    $mensaje = "Registro agregado con exito";
    header("Location:index.php?mensaje=".$mensaje);
}

?>

<div class="card">
    <div class="card-header">
       Crear Usuario
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario:</label>
          <input type="text"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Ingrese el nombre de usuarios">
         
        </div>
        <div class="mb-3">
          <label for="contrasenia" class="form-label">Contraseña:</label>
          <input type="password"
            class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Ingrese la Contraseña">
         
        </div>
        <div class="mb-3">
          <label for="idRol" class="form-label">idRol:</label>
          <input type="text"
            class="form-control" name="idRol" id="idRol" aria-describedby="helpId" placeholder="Ingrese 1 para admin, 2 para usuario">
         
        </div>
       
        <button type="submit" href="index.php" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>