<?php 
include("../../template/header.php");
include("../../db/db-connection.php");
if($_POST){
    print_r($_POST);
    print_r($_FILES);
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";;
    $imagen = (isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
    $fecha_imagen = new DateTime();
    //Se valida se hay algo diferente de vacio en el cuadro de imagen, si es diferente, con el metodo timestamp traemos la fecha y concatenamos el nombre de la imagen
    $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";
    $tmp_imagen=$_FILES['imagen']['tmp_name'];
    if($tmp_imagen!= ""){
      //Si es diferente de vacio, se mueve la imagen con este metodo
  move_uploaded_file($tmp_imagen, "../../../assets/imgFunzoo/".$nombre_archivo_imagen);
    }
    $sentencia = $conexion->prepare("INSERT INTO entradas(id, titulo, descripcion, imagen) VALUES (NULL, :titulo, :descripcion, :imagen) ");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":imagen", $imagen);
    $sentencia->execute();
    $mensaje="Registro agregado con éxito";
//Con el metodo header se redirecciona directamente hacia el index denuevo mostrando un mensaje, con el Location para encontrar la seccion
header("Location:index.php?mensaje=".$mensaje);
}





?>
<div class="card">
    <div class="card-header">
       Crear Entrada
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Ingrese el titulo de la entrada">
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <input type="text" 
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese la descripcion de la entrada">
         
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="imagen">
          
        </div>
        <button type="submit" href="index.php" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>