<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
  
  $txtID = $_GET["txtID"];
  
  $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $nombre=$registro["nombrecompleto"];
  $puesto=$registro["puesto"];
  $whatsapp=$registro["whatsapp"];
  $linkedin=$registro["linkedin"];
  $email=$registro["email"];
  $imagen=$registro["imagen"];
};

if($_POST){
  $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
  $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
  $puesto=(isset($_POST["puesto"]))?$_POST["puesto"]:"";
  $whatsapp=(isset($_POST["whatsapp"]))?$_POST["whatsapp"]:"";
  $linkedin=(isset($_POST["linkedin"]))?$_POST["linkedin"]:"";
  $email=(isset($_POST["email"]))?$_POST["email"]:"";
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";


    $sentencia=$conexion->prepare("UPDATE `tbl_equipo` SET nombrecompleto=:nombre,puesto=:puesto,whatsapp=:whatsapp,linkedin=:linkedin,email=:email WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":puesto",$puesto);
    $sentencia->bindParam(":whatsapp",$whatsapp);
    $sentencia->bindParam(":linkedin",$linkedin);
    $sentencia->bindParam(":email",$email);
  
  $sentencia->execute();
  if($imagen !==""){
  $sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
  if(isset($registro_imagen["imagen"])){
    if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"])){
  unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
    };
  }
  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($imagen!=""?$fecha_imagen->getTimestamp()."_".$imagen:"");

  $tmp_imagen=$_FILES["imagen"]["tmp_name"];
  
  if($tmp_imagen !== ""){
    move_uploaded_file($tmp_imagen,"../../../assets/img/team/$nombre_archivo_imagen");
  };
    $sentencia=$conexion->prepare("UPDATE `tbl_equipo` SET imagen=:imagen WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
  
  
  $sentencia->execute();
  $mensaje="Entrada modificada con éxito";
  header("Location:index.php?mensaje=".$mensaje);
}else{
  $mensaje="Entrada modificada con éxito";
  header("Location:index.php?mensaje=".$mensaje);
}
  

};

include("../../templates/header.php");
?>

<div class="card">
  <div class="card-header">
   Editar integrante
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

  <div class="mb-3">
    <label for="txtID" class="form-label">ID:</label>
    <input readonly value="<?php echo $txtID?>" type="text"
    class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

      <div class="mb-3">
    <label for="imagen" class="form-label">Imagen:</label>
    <br>
    <img width="100" height="100" src="../../../assets/img/team/<?php echo $imagen;?>"/>
    <input  type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>

      <label for="nombre" class="form-label">Nombre</label>
      <input value="<?php echo $nombre?>" type="text"
      class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">

    <label for="puesto" class="form-label">Puesto</label>
    <input value="<?php echo $puesto?>" type="text"
    class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">

    <label for="whatsapp" class="form-label">WhatsApp</label>
    <input value="<?php echo $whatsapp?>" type="text"
    class="form-control" name="whatsapp" id="whatsapp" aria-describedby="helpId" placeholder="WhatsApp">

     <label for="linkedin" class="form-label">LinkedIn</label>
    <input value="<?php echo $linkedin?>" type="text"
    class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="LinkedIn">

     <label for="email" class="form-label">Email</label>
    <input value="<?php echo $email?>" type="text"
    class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">

   
    
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>
  </div>
</div>


<?php
include("../../templates/footer.php")
?>
