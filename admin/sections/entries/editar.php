<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
  
  $txtID = $_GET["txtID"];
  
  $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $fecha=$registro["fecha"];
  $titulo=$registro["titulo"];
  $descripcion=$registro["descripcion"];
  $imagen=$registro["imagen"];
};

if($_POST){
  $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
  $fecha=(isset($_POST["fecha"]))?$_POST["fecha"]:"";
  $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
  $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";


    $sentencia=$conexion->prepare("UPDATE `tbl_entradas` SET titulo=:titulo,fecha=:fecha,descripcion=:descripcion WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":fecha",$fecha);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
  
  $sentencia->execute();
  if($imagen !==""){
  $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
  if(isset($registro_imagen["imagen"])){
    if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
  unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
    };
  }
  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($imagen!=""?$fecha_imagen->getTimestamp()."_".$imagen:"");

  $tmp_imagen=$_FILES["imagen"]["tmp_name"];
  
  if($tmp_imagen !== ""){
    move_uploaded_file($tmp_imagen,"../../../assets/img/about/$nombre_archivo_imagen");
  };
    $sentencia=$conexion->prepare("UPDATE `tbl_entradas` SET imagen=:imagen WHERE id=:id");
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
    Crear proyecto
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

  <div class="mb-3">
    <label for="txtID" class="form-label">ID:</label>
    <input readonly value="<?php echo $txtID?>" type="text"
    class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
    
      <label for="fecha" class="form-label">Fecha</label>
      <input value="<?php echo $fecha?>" type="text"
      class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha">

    <label for="titulo" class="form-label">Titulo</label>
    <input value="<?php echo $titulo?>" type="text"
    class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">



    <div class="mb-3">
    <label for="imagen" class="form-label">Imagen:</label>
    <br>
    <img width="100" height="100" src="../../../assets/img/about/<?php echo $imagen;?>"/>
    <input  type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>


    <label for="descripcion" class="form-label">Descripción</label>
    <input value="<?php echo $descripcion?>" type="text"
    class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">

   
    
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>
  </div>
</div>


<?php
include("../../templates/footer.php")
?>
