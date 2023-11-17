<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
  
  $txtID = $_GET["txtID"];
  
  $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $titulo=$registro["titulo"];
  $subtitulo=$registro["subitulo"];
  $imagen=$registro["imagen"];
  $descripcion=$registro["descripcion"];
  $cliente=$registro["cliente"];
  $categoria=$registro["categoria"];
  $url=$registro["url"];
};

if($_POST){
  $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
  $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
  $subtitulo=(isset($_POST["subTitulo"]))?$_POST["subTitulo"]:"";
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
  $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
  $cliente=(isset($_POST["cliente"]))?$_POST["cliente"]:"";
  $categoria=(isset($_POST["categoria"]))?$_POST["categoria"]:"";
  $url=(isset($_POST["url"]))?$_POST["url"]:"";


    $sentencia=$conexion->prepare("UPDATE `tbl_portafolio` SET titulo=:titulo,subitulo=:subtitulo,descripcion=:descripcion,cliente=:cliente,categoria=:categoria,url=:url WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":subtitulo",$subtitulo);
    $sentencia->bindParam(":descripcion",$descripcion);
  $sentencia->bindParam(":cliente",$cliente);
  $sentencia->bindParam(":categoria",$categoria);
  $sentencia->bindParam(":url",$url);
  

  if($imagen !==""){
  $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
  if(isset($registro_imagen["imagen"])){
    if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
  unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
    };
  }
  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($imagen!=""?$fecha_imagen->getTimestamp()."_".$imagen:"");

  $tmp_imagen=$_FILES["imagen"]["tmp_name"];
  
  if($tmp_imagen !== ""){
    move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/$nombre_archivo_imagen");
  };
    $sentencia=$conexion->prepare("UPDATE `tbl_portafolio` SET imagen=:imagen WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
  
  
  $sentencia->execute();
  $mensaje="Servicio modificado con éxito";
  header("Location:index.php?mensaje=".$mensaje);
}
  $sentencia->execute();
  $mensaje="Servicio modificado con éxito";
  header("Location:index.php?mensaje=".$mensaje);

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

    <label for="titulo" class="form-label">Titulo</label>
    <input value="<?php echo $titulo?>" type="text"
    class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">

    <label for="subTitulo" class="form-label">Subtitulo</label>
    <input value="<?php echo $subtitulo?>" type="text"
    class="form-control" name="subTitulo" id="subTitulo" aria-describedby="helpId" placeholder="Subtitulo">


    <div class="mb-3">
    <label for="imagen" class="form-label">Imagen:</label>
    <br>
    <img width="100" height="100" src="../../../assets/img/portfolio/<?php echo $imagen;?>"/>
    <input  type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>


    <label for="descripcion" class="form-label">Descripción</label>
    <input value="<?php echo $descripcion?>" type="text"
    class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">

    <label for="cliente" class="form-label">Cliente</label>
    <input value="<?php echo $cliente?>" type="text"
    class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">

    <label for="categoria" class="form-label">Categoría</label>
    <input value="<?php echo $categoria?>" type="text"
    class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoría">

    <label for="url" class="form-label">Url</label>
    <input value="<?php echo $url?>" type="text"
    class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="Url">
    
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>
  </div>
</div>


<?php
include("../../templates/footer.php")
?>
