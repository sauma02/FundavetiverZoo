<?php 
include("../../template/header.php"); 
include("../../db/db-connection.php");
if(isset($_GET['txtID'])){

    $txtID =(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion -> prepare("DELETE FROM `entradas` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //Borrado de imagen
    $sentencia = $conexion->prepare("SELECT `imagen` FROM `entradas` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //Borrar registro de imagen
    //fetch lazy y fetch para tarear uno en especifico
    $registro_de_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($registro_de_imagen['imagen'])){
        //File exists
        if(file_exists("../../../assets/imgFunzoo/".$registro_de_imagen["imagen"])){
            //borrar con unlink
            unlink("../../../assets/imgFunzoo/".$registro_de_imagen["imagen"]);
        }else{
            echo "no existe";
        }
    }
}
$sentencia = $conexion->prepare("SELECT * FROM `entradas`");
$sentencia->execute();
//Se usa un fecth all para traer a todos los datos
$Listar_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);





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
                  <?php foreach($Listar_entradas as $entradas){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $entradas['id']?></td>
                        <td><?php echo $entradas['titulo']?></td>
                        <td><?php echo $entradas['descripcion']?></td>
                        <td><img width ="100px" src="../../../assets/imgFunzoo/<?php echo $entradas['imagen'];?>" class="" alt=""><?php echo $entradas['imagen'];?></td>
                        <td>
                        <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $entradas['id'];?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $entradas['id'];?>" role="button">Eliminar</a>
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