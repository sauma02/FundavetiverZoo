<?php 
include("../../template/header.php");
include("../../db/db-connection.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion -> prepare("SELECT * FROM usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //Fetch lazy para seleccionar uno a uno
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $usu = $registro['usuario'];
    $pass = $registro['password'];
    $idRol = $registro['idrol'];



}
if($_POST){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $usu=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $pass=(isset($_POST['contrasenia']))?$_POST['contrasenia']:"";
    $idRol = (isset($_POST['idRol']))?$_POST['idRol']:"";
    $sentencia=$conexion->prepare("UPDATE `usuarios` 
    SET `usuario` = :usuario, `password` = :contrasenia, `idrol` = :idRol
    WHERE `usuarios`.`id` = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":usuario", $usu);
    $sentencia->bindParam(":contrasenia", $pass);
    $sentencia->bindParam(":idRol", $idRol);
    $sentencia->execute();
    $mensaje="Registro editado con exito";
    header("Location:index.php?mensaje=".$mensaje);

}

?>

<div class="card">
    <div class="card-header">
       Editar Usuario
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="txtID"  class="form-label">Id:</label>
          <input type="text" readonly="true" value="<?php echo $txtID;?>"
            class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
         
        </div>
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario:</label>
          <input type="text" value="<?php echo $usu?>"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Edite el nombre de usuario">
         
        </div>
        <div class="mb-3">
          <label for="contrasenia" class="form-label">Contraseña:</label>
          <input type="text" value="<?php echo $pass?>"
            class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Edite la contraseña">
         
        </div>
        <div class="mb-3">
          <label for="idRol" class="form-label">idRol:</label>
          <input type="text" value="<?php echo $idRol?>"
            class="form-control" name="idRol" id="idRol" aria-describedby="helpId" placeholder="Edite el id rol">
         
        </div>
     
        <button type="submit" class="btn btn-success">Editar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>