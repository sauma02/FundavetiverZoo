
<?php 
include("../../template/header.php");
include("../../db/db-connection.php");
if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //borrar config
    $sentencia = $conexion ->prepare("DELETE FROM configuraciones WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    //borrado de imagen
    $sentencia=$conexion->prepare("SELECT imagen FROM configuraciones WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
    //Verificar si existe la imagen con file exits
    if(isset($registro_imagen['imagen'])){

        if(file_exists("../../../assets/img/config/".$registro_imagen['imagen'])){
            //borrar con unlink
            unlink("../../../assets/img/config/".$registro_imagen['imagen']);
        }else{
            echo "No existe..";
        }
        
    }
}
//Listar config
$sentencia=$conexion->prepare("SELECT * FROM configuraciones");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC)

?>



<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar configuracion</a>
    </div>
    <div class="card-body">
     <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID:</th>
                    <th scope="col">Nombre de la configuracion:</th>
                    <th scope="col">Descripcion:</th>
                    <th scope="col">Imagen:</th>
                    <th scope="col">Accion:</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_configuraciones as $configuracion) {?>
                    
                <tr class="">
                    <td scope="row"><?php echo $configuracion['id']?></td>
                    <td><?php echo $configuracion['titulo']?></td>
                    <td><?php echo $configuracion['descripcion']?></td>
                    <td><img width ="50" src="../../../assets/img/config/<?php echo $configuracion['imagen'];?>" alt="">    
                        <?php echo $configuracion['imagen'];?></td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $configuracion['id']?>" role="button">Editar</a>
                        |
                        <!-- Se manda en la ref un redireccionamiento a pgp index? significa que va a enviar la informacion en la mism a pagina, con un txtid que busque en el registro 'id' y lo elimine-->
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $configuracion['id']?>" role="button">Eliminar</a>
                    </div>
                    
                    </td>
            </tr>
                    <?php } ?>
       
            </tbody>
        </table>
     </div>
     
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>

<?php include("../../template/footer.php")?>