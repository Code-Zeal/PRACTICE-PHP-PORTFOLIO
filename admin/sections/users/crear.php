<?php

include("../../bd.php");
if($_POST){
  print_r($_POST);
  $usuario=(isset($_POST["usuario"]))?$_POST["usuario"]:"";
  $correo=(isset($_POST["correo"]))?$_POST["correo"]:"";
  $password=(isset($_POST["password"]))?$_POST["password"]:"";

  $sentencia=$conexion->prepare("INSERT INTO `tbl_usuarios` (`id`,`usuario`,`correo`,`password`) VALUES (NULL, :usuario, :correo, :password);");

  $sentencia->bindParam(":usuario",$usuario);
  $sentencia->bindParam(":correo",$correo);
  $sentencia->bindParam(":password",$password);
  $sentencia->execute();
  $mensaje="Usuario creado con éxito";
  header("Location:index.php?mensaje=".$mensaje);
};

include("../../templates/header.php");
?>

<div class="card">
  <div class="card-header">
    Agregar Usuario
  </div>
  <div class="card-body">
    
  <form action="" enctype="multipart/form-data" method="post">
   
<div class="mb-3">
  <label for="usuario" class="form-label">Usuario:</label>
  <input type="text"
    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario">
  <div class="mb-3">
    <label for="correo" class="form-label">Correo:</label>
    <input type="text"
      class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo">
    
  </div>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Contraseña: </label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
</div>



  <button type="submit" class="btn btn-success">Agregar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>

  </div>
</div>

<?php
include("../../templates/footer.php")
?>
