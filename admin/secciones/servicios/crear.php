<?php 
include("../../db/db-connection.php");
include("../../template/header.php");

if($_POST){
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $sentencia=$conexion->prepare("INSERT INTO servicios(id, titulo, descripcion, icono) VALUES (NULL, :titulo, :descripcion, :icono)");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":icono", $icono);
    $sentencia->execute();
    $mensaje="Registro agregado con exito";
    header("Location:index.php?=".$mensaje);
    

}
?>
<div class="card">
    <div class="card-header">
       Crear Servicios
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Ingrese el titulo del servicio">
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <input type="text" 
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese la descripcion del servicio">
         
        </div>
        <div class="mb-3">
          <label for="icono" class="form-label">Icono</label>
          <input type="text"
            class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono">
          
        </div>
        <button type="submit" href="index.php" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>