<?php
include("admin/bd.php");
  //servicios
  $sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
  $sentencia->execute();
  $Lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


  //portafolio
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
  $sentencia->execute();
  $Lista_portfolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

   //portafolio
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_entradas`");
  $sentencia->execute();
  $Lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

   //equipo
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
  $sentencia->execute();
  $Lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

     //configuraciones
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
  $sentencia->execute();
  $Lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Código Marce | Soluciones Web, Movíl y Más</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Acerca De Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading"><?php echo $Lista_configuraciones[0]["valorconfiguracion"]?></div>
                <div class="masthead-heading text-uppercase"><?php echo $Lista_configuraciones[1]["valorconfiguracion"]?></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $Lista_configuraciones[3]["valorconfiguracion"]?>"><?php echo $Lista_configuraciones[2]["valorconfiguracion"]?></a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $Lista_configuraciones[4]["valorconfiguracion"]?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $Lista_configuraciones[5]["valorconfiguracion"]?></h3>
                </div>
                <div class="row text-center">
                  <?php foreach($Lista_servicios as $registros)
                  {?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros["icono"];?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php echo $registros["titulo"];?></h4>
                        <p class="text-muted"><?php echo $registros["descripcion"];?></p>
                    </div>

                    <?php }?>
                  
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $Lista_configuraciones[6]["valorconfiguracion"]?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $Lista_configuraciones[7]["valorconfiguracion"]?></h3>
                </div>
                <div class="row">


 <?php foreach($Lista_portfolio as $portfolio)
                  {?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal"  href="#portfolio<?php echo $portfolio["id"]?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $portfolio["imagen"]?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $portfolio["cliente"]?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $portfolio["categoria"]?></div>
                            </div>
                        </div>
                    </div>

  <?php }?>

                 
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $Lista_configuraciones[8]["valorconfiguracion"]?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $Lista_configuraciones[9]["valorconfiguracion"]?></h3>
                </div>
                <ul class="timeline">
                  <?php $contador=0; foreach($Lista_entradas as $portfolio) {?>
                    <li <?php echo (($contador%2)==0)?'class="timeline-inverted"':""; ?> >
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/<?php echo $portfolio["imagen"]?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $portfolio["fecha"]?></h4>
                                <h4 class="subheading"><?php echo $portfolio["titulo"]?></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><?php echo $portfolio["descripcion"]?></p></div>
                        </div>
                    </li>
                  <?php $contador++; }?>
                
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                               <?php echo $Lista_configuraciones[10]["valorconfiguracion"]?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $Lista_configuraciones[11]["valorconfiguracion"]?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $Lista_configuraciones[12]["valorconfiguracion"]?></h3>
                </div>
                <div class="row">
      <?php foreach($Lista_equipo as $equipo)
                  {?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/<?php echo $equipo["imagen"]?>" alt="..." />
                            <h4><?php echo $equipo["nombrecompleto"]?></h4>
                            <p class="text-muted"><?php echo $equipo["puesto"]?></p>
                            <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send/?phone=<?php echo $equipo["whatsapp"]?>" target="_blank" aria-label="<?php echo $equipo["nombrecompleto"]?> Whatsapp number"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-dark btn-social mx-2" target="_blank"  href="mailto:<?php echo $equipo["email"]?>" aria-label="<?php echo $equipo["nombrecompleto"]?> Email"><i class="fa fa-envelope"></i></a>
                            <a class="btn btn-dark btn-social mx-2" target="_blank" href="<?php echo $equipo["linkedin"]?>" aria-label="<?php echo $equipo["nombrecompleto"]?> LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    
  <?php }?>
                    
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"><?php echo $Lista_configuraciones[16]["valorconfiguracion"]?></p></div>
                </div>
            </div>
        </section>
        <!-- Clients
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CONTACTANOS</h2>
                    <h3 class="section-subheading text-muted">Nos comunicaremos contigo lo antes posible</h3>
                </div>
                <form id="contactForm" method="post">>
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Tu Nombre *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nombre es requerido</div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Tu Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Un email es requerido.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">email no es valido</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Tu Teléfono *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Un número de teléfono es requerido</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Tu Mensaje *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Un mensaje es requerido</div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">CONTACTAME!</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Código Marce 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Políticas de privacidad</a>
                        <a class="link-dark text-decoration-none" href="#!">Terminos de uso</a>
                    </div>
                </div>
            </div>
        </footer>
        <?php foreach($Lista_portfolio as $portfolio)
                  {?>
        <div class="portfolio-modal modal fade" id="portfolio<?php echo $portfolio["id"]?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase"><?php echo $portfolio["titulo"]?></h2>
                                    <p class="item-intro text-muted"><?php echo $portfolio["subitulo"]?></p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $portfolio["imagen"]?>" alt="..." /><?php echo $portfolio["descripcion"]?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            <?php echo $portfolio["cliente"]?>
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            <?php echo $portfolio["categoria"]?>
                                        </li>
                                    </ul>
                                    <a class="btn btn-primary btn-xl text-uppercase"  type="button" href="<?php echo $portfolio["url"]?>" target="_blank" >
                                        <i class="fa fa-external-link me-1"></i>
                                        Abrir Proyecto
                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
  <?php }?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
