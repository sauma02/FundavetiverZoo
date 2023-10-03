<?php 
include("admin/db/db-connection.php");

//Seleccionar registros de portafolio
$sentencia=$conexion->prepare("SELECT * FROM `portafolio`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de entradas
$sentencia=$conexion->prepare("SELECT * FROM `entradas`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_entrada = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de entradas
$sentencia=$conexion->prepare("SELECT * FROM `configuraciones`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_config = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM `servicios`");
$sentencia->execute();
//Se utiliza fecthAll, se utiliza esta funcion mas el PDO::FETCH_ASSOC para que tengamos acceso a todos los resgitros
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $lista_config[0]['descripcion']?></title>
        <!-- Favicon-->
        <link width="5px" rel="icon" type="image/x-icon" href="assets/imgFunzoo/config/<?php echo $lista_config[1]['imagen']?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fontawesome.com/icons">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">

               <img  height="80" width="80" src="assets/imgFunzoo/config/<?php echo $lista_config[1]['imagen']?>" class="rounded-top "   alt=""> <a class="navbar-brand" href="#page-top"><?php echo $lista_config[1]['descripcion']?></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#portfolio">Portafolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#about">Nosotros</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#services">Servicios</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#contact">Contacto</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="admin/login.php">Admin log in</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img  src="assets/imgFunzoo/config/<?php echo $lista_config[2]['imagen']?>" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0"><?php echo $lista_config[3]['descripcion']?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-paw"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Hola, en estos momentos seguimos trabajando en nuestros medios de contacto, te invito a que sigas viendo nuestra pagina para que conozcas un poco mas sobre nosotros</p>
            </div>
        </header>
      
                
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                        <?php echo $lista_config[12]['titulo']?>
                            <br />
                            <?php echo $lista_config[12]['descripcion']?>
                            
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <!--href="http://wa.me/57<?//php echo $lista_config[11]['descripcion']?>"-->
                    <!--<?php //echo $lista_config[13]['descripcion']?>-->
                    <div class="col-lg-4 mb-5 mb-lg-0">

                        <h4 class="text-uppercase mb-4">Nuestras redes</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="mailto:<?php echo $lista_config[13]['descripcion']?>"><i class="fa-solid fa-envelope"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="" target="_blank"><i class="fab fa-fw fa-whatsapp"></i></a>
                        <br><br><br><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.937394291441!2d-74.8921319251424!3d5.576274333445736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e412b2d8cbd09bb%3A0x282059c54c21537a!2sNorcasia!5e0!3m2!1ses-419!2sco!4v1692606213933!5m2!1ses-419!2sco" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4"></h4>
                        <p class="lead mb-0">
                        <img class="img-fluid rounded mb-5" src="assets/imgFunzoo/config/<?php echo $lista_config[2]['imagen']?>" alt="..." style="margin-top:1px; "/>
                           
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; FunZoo - Sin animo de lucro</small></div>
        </div>

       
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
