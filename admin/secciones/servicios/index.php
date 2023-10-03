<?php 
include("../../db/db-connection.php");
include("../../template/header.php");
if(isset($_GET['txtID'])){
    //Borrar registro
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM servicios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

}
//Listar servicios
$sentencia=$conexion->prepare("SELECT * FROM servicios");
$sentencia->execute();
//Se utiliza fetch assoc para cada uno, con el fecth all
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
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
                        <th scope="col">Titulo servicio:</th>
                        <th scope="col">Descripcion:</th>
                        <th scope="col">Icono:</th>
                        <th scope="col">Accion:</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($lista_servicios as $servicios){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $servicios['id']?></td>
                        <td><?php echo $servicios['titulo']?></td>
                        <td><?php echo $servicios['descripcion']?></td>
                        <td><?php echo $servicios['icono']?></td>
                        <td>
                        <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $servicios['id'];?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $servicios['id'];?>" role="button">Eliminar</a>
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



<?php 

include("../../template/footer.php");
?>