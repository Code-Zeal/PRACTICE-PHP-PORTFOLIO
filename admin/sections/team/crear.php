<?php

include("../../bd.php");
if($_POST){
  print_r($_POST);
  $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
  $puesto=(isset($_POST["puesto"]))?$_POST["puesto"]:"";
  $whatsapp=(isset($_POST["whatsapp"]))?$_POST["whatsapp"]:"";
  $linkedin=(isset($_POST["linkedin"]))?$_POST["linkedin"]:"";
  $email=(isset($_POST["email"]))?$_POST["email"]:"";
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";

  $sentencia=$conexion->prepare("INSERT INTO `tbl_equipo` (`id`,`imagen`,`nombrecompleto`,`puesto`,`whatsapp`,`linkedin`,`email`) VALUES (NULL, :imagen, :nombre, :puesto, :whatsapp,:linkedin,:email);");

  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($imagen!=""?$fecha_imagen->getTimestamp()."_".$imagen:"");

  $tmp_imagen=$_FILES["imagen"]["tmp_name"];

  if($tmp_imagen !== ""){
    move_uploaded_file($tmp_imagen,"../../../assets/img/team/$nombre_archivo_imagen");
  };

  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":puesto",$puesto);
  $sentencia->bindParam(":whatsapp",$whatsapp);
  $sentencia->bindParam(":linkedin",$linkedin);
  $sentencia->bindParam(":email",$email);
  $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
  $sentencia->execute();
  $mensaje="Servicio creado con éxito";
  header("Location:index.php?mensaje=".$mensaje);
};

include("../../templates/header.php");
?>

<div class="card">
  <div class="card-header">
    Agregar integrante
  </div>
  <div class="card-body">
    
  <form action="" enctype="multipart/form-data" method="post">
    <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>
<div class="mb-3">
  <label for="nombre" class="form-label">Nombre:</label>
  <input type="text"
    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
  <div class="mb-3">
    <label for="puesto" class="form-label">Puesto:</label>
    <input type="text"
      class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">
    
  </div>
</div>
<div class="mb-3">
  <label for="whatsapp" class="form-label">WhatsApp:</label>
  <input type="text"
    class="form-control" name="whatsapp" id="whatsapp" aria-describedby="helpId" placeholder="WhatsApp">
</div>
<div class="mb-3">
  <label for="linkedin" class="form-label">LinkedIn:</label>
  <input type="text"
    class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="LinkedIn">
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email:</label>
  <input type="text"
    class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
</div>


  <button type="submit" class="btn btn-success">Agregar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>

  </div>
</div>

<?php
include("../../templates/footer.php")
?>
