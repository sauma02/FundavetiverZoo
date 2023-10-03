<?php 
include("../../db/db-connection.php");
include("../../template/header.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM servicios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //se utiliza un fecth lazy para seleccionar y asiganr el valor a cada una de las variables
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $titulo=$registro['titulo'];
    $descripcion=$registro['descripcion'];
    $icono=$registro['icono'];

}
if($_POST){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $sentencia=$conexion->prepare("UPDATE servicios
    SET titulo=:titulo, descripcion=:descripcion, icono=:icono
    WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":icono", $icono);
    $sentencia->execute();
    $mensaje="Registros editado con exito";
    header("Location:index.php?mensaje=".$mensaje);
}
?>
<div class="card">
    <div class="card-header">
       Editar Servicios
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="txtID"  class="form-label">Id:</label>
          <input type="text" readonly="true" value="<?php echo $txtID;?>"
            class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
         
        </div>
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input type="text" value="<?php echo $titulo?>"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Ingrese el titulo de la imagen">
         
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion:</label>
          <input type="text" value="<?php echo $descripcion?>"
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese una nueva descripcion">
         
        </div>
        <div class="mb-3">
          <label for="icono" class="form-label">Icono:</label>
          <input type="text" value="<?php echo $icono?>"
            class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="imagen">
          
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>