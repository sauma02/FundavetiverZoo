<?php 

include("../../template/header.php");
require("../../db/db-connection.php");
if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    //Borrada del registro
    $sentencia = $conexion->prepare("DELETE FROM `portafolio` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //Borrado de imagen
    $sentencia = $conexion->prepare("SELECT `imagen` FROM `portafolio` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_de_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
    
    if(isset($registro_de_imagen["imagen"])){
        if(file_exists("../../../assets/imgFunzoo/".$registro_de_imagen["imagen"])){
            //Borrar con unlink
            unlink("../../../assets/imgFunzoo/".$registro_de_imagen["imagen"]);
        }else{
            echo "no existe";
        }
    }
}
//Listar Registros
$sentencia = $conexion->prepare("SELECT * FROM `portafolio`");
$sentencia->execute();
$Lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);





?>


<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table">
                <thead>
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Titulo:</th>
                        <th scope="col">Descripcion:</th>
                        <th scope="col">Imagen:</th>
                        <th scope="col">Accion:</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($Lista_portafolio as $portafolio){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $portafolio['id']?></td>
                        <td><?php echo $portafolio['titulo']?></td>
                        <td><?php echo $portafolio['descripcion']?></td>
                        <td><img width ="50px" src="../../../assets/imgFunzoo/<?php echo $portafolio['imagen'];?>" class="" alt=""><?php echo $portafolio['imagen'];?></td>
                        <td>
                        <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $portafolio['id'];?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $portafolio['id'];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                
            </table>
        </div>
        <h4 class="card-title"></h4>
        <p class="card-text"></p>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>
<?php include("../../template/footer.php"); ?>