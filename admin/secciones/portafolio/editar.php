<?php 
include("../../template/header.php");
require("../../db/db-connection.php");
if(isset($_GET['txtID'])){
     //Recuperar los datos del registro de id correspondiente
   
    //se crear la variable txtID, con la informacion del get para obtener la informacion del txtID, de esta manera con un if, si es verdadero, obteniendola y sino, dejandola en blanco
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("SELECT * FROM `portafolio` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //Se utiliza un fetch para recuperar los datos de una sola variable, un dato exclusivo, por eso se usa el fecth_lazy, para obtener el dato de un solo registro
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $titulo=$registro['titulo'];
    $descripcion = $registro['descripcion'];
    $imagen=$registro['imagen'];

}
if($_POST){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $imagen = (isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";

    $sentencia=$conexion->prepare("UPDATE `portafolio`
    SET titulo=:titulo, descripcion=:descripcion
    WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam("titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->execute();
         //Para llamar a la imagen
    //Se le póne fecha a imagen
    if($_FILES['imagen']['name']!=""){
        
    
        $imagen =(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
    //Mover la imagen a assets para poder editarla
        $fecha_imagen = new DateTime();
        //Se valida se hay algo diferente de vacio en el cuadro de imagen, si es diferente, con el metodo timestamp traemos la fecha y concatenamos el nombre de la imagen
        $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";
        $tmp_imagen=$_FILES["imagen"]["tmp_name"];
       //Si es diferente de vacio, se mueve la imagen con este metodo
        move_uploaded_file($tmp_imagen, "../../../assets/imgFunzoo/".$nombre_archivo_imagen);
    
    
        //Antes de actualizar se necesita borrar la imagen previamente almacenada
        //Borrado del archivo anterior
        $sentencia=$conexion->prepare("SELECT `imagen` FROM `portafolio` WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
           //Verificar si existe la imagen con file exits
    if(isset($registro_imagen['imagen'])){

        if(file_exists("../../../assets/img/imgFunzoo/".$registro_imagen['imagen'])){
            //borrar con unlink
            unlink("../../../assets/img/imgFunzoo/".$registro_imagen['imagen']);
        }else{
            echo "No existe..";
        }
    }
            //Se hace la actualizacion de la imagen
    $sentencia=$conexion->prepare("UPDATE `portafolio`
    SET imagen=:imagen
    WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->execute();
    $mensaje="Registro modificado con éxito";
    //Con el metodo header se redirecciona directamente hacia el index denuevo mostrando un mensaje, con el Location para encontrar la seccion
    header("Location:index.php?mensaje=".$mensaje);
    }

}

?>
<div class="card">
    <div class="card-header">
       Editar Portafolio
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
          <label for="imagen" class="form-label">Imagen:</label>
          <img width ="50" src="../../../assets/imgFunzoo/<?php echo $imagen;?>" alt=""> 
          <input type="file"
            class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="imagen">
          
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
</form>
       
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>