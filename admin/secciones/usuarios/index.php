<?php 
include("../../template/header.php");
include("../../db/db-connection.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
        //Borrada del registro
    $sentencia = $conexion -> prepare("DELETE* FROM usuarios WHERE id=:id");
    $sentencia -> bindParam(":id", $txtID);
    $sentencia -> execute();


}
//listar registros
//Seleccionar registros
$sentencia=$conexion->prepare("SELECT usuarios.id, usuarios.usuario, usuarios.password, usuarios.idrol , permisos.rol FROM usuarios
LEFT JOIN permisos ON usuarios.idrol = permisos.id");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                        <th scope="col">Usuario:</th>
                        <th scope="col">Contraseña:</th>
                        <th scope="col">idRol:</th>
                        <th scope="col">Rol:</th>
                        <th scope="col">Accion:</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($lista_usuarios as $usuarios){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $usuarios['id']?></td>
                        <td><?php echo $usuarios['usuario']?></td>
                        <td><?php echo $usuarios['password'];?></td>
                        <td><?php echo $usuarios['idrol'];?></td>
                        <td><?php echo $usuarios['rol'];?></td>
                        <td>
                        <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $usuarios['id'];?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $usuarios['id'];?>" role="button">Eliminar</a>
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