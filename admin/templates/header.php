<?php
session_start();
$url_base="http://localhost/portfolio/admin/";

if(!isset($_SESSION["usuario"])){
  header("Location:".$url_base."login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
  <title>Administrador de Código Marce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

  <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body >
  <header>
    <!-- place navbar here -->

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $url_base?>" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/services">Servicios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/portfolio">Portafolio</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/entries">Entradas</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/team">Equipo</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/configs">Configuraciones</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>/sections/users">Usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base?>close.php">Cerrar sesión</a>
        </div>
    </nav>
  </header>
  <main class="container">
    <br/>
    <script>
      <?php if(isset($_GET["mensaje"])){
        ?>
      Swal.fire({icon:"success",title:"<?php echo $_GET["mensaje"]?>"})
      <?php }?>
    </script>