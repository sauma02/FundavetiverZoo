<?php
//se apertura una variable de session para que si existe el usuario se pueda ingresar al usuario en variables de sesion, para conservarlo logueado
session_start();

if($_POST){
  //incluir conexion
  include("./db/db-connection.php");
 
  $usuar=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
  $password=(isset($_POST['password']))?$_POST['password']:"";
  //Seleccionar registros, se hace un select para contabilizar el usuario, y vberificar su existencia almacenando ese numero
$sentencia=$conexion->prepare("SELECT *, count(*) as n_usuario 
FROM `usuarios`
WHERE usuario=:usuario
AND password=:password
");
$sentencia->bindParam(":usuario", $usuar);
$sentencia->bindParam(":password", $password);
$sentencia->execute();
//Se utiliza fecth, se utiliza esta funcion mas el PDO::FETCH_LAZY para obtener todos los registros
$lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);
if($lista_usuarios['n_usuario']>0 && $lista_usuarios['idrol'] ==  1){
  
  print_r("El usuario y contraseña existe");
  $_SESSION['usuario']=$lista_usuarios['usuario'];
  $_SESSION['logueado']=true;
  header("Location:index.php");
}else{
 $mensaje="Error: el usuario o contraseña son incorrectos o no cuenta con los permisos requeridos";
}


}



?>

<!doctype html>
<html lang="en">

<head>
<br><br>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    
    <!-- place navbar here -->
  </header>
  
  <main>
  <div class="container">
    
    <div class="row">
      
      <div class="col-4">
        
        
      </div>
      <div class="col-4">
        
      </div>
      
    </div>
    
    <div class="card">

    
      <div class="card-header">
      Login
      </div>
      <div class="card-body">
        <?php if(isset($mensaje)){ ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong><?php echo $mensaje;?></strong>
      <?php } ?>
      <script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })
    </script>
    </div>
    

    <form method="POST" >
    <div class="mb-3">
      <label for="txtUsuario" class="form-label">Usuario</label>
      <input type="text"
        class="form-control" name="txtUsuario" id="txtUsuario" aria-describedby="helpId">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password"
          class="form-control" name="password" id="password" aria-describedby="helpId">
      
      </div>

      <input name="" id="" class="btn btn-primary" type="submit" value="Entrar">
      <a name="" id="" class="btn btn-danger" href="../index.php" role="button">Regresar</a>
    </form>



      </div>
      <div class="card-footer text-muted">
        
      </div>
    </div>
  </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>