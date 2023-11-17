<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
  
  $txtID = $_GET["txtID"];
  
  $sentencia=$conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $nombreconfiguracion=$registro["nombreconfiguracion"];
  $valorconfiguracion=$registro["valorconfiguracion"];
};

if($_POST){
  $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
  $nombreconfiguracion=(isset($_POST["nombreconfiguracion"]))?$_POST["nombreconfiguracion"]:"";
  $valorconfiguracion=(isset($_POST["valorconfiguracion"]))?$_POST["valorconfiguracion"]:"";


    $sentencia=$conexion->prepare("UPDATE `tbl_configuraciones` SET nombreconfiguracion=:nombreconfiguracion,valorconfiguracion=:valorconfiguracion WHERE id=:id");
    
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":nombreconfiguracion",$nombreconfiguracion);
    $sentencia->bindParam(":valorconfiguracion",$valorconfiguracion);
  
  $sentencia->execute();
  
  $mensaje="Entrada modificada con éxito";
  header("Location:index.php?mensaje=".$mensaje);
  

};

include("../../templates/header.php");
?>

<div class="card">
  <div class="card-header">
   Editar configuración varia
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

  <div class="mb-3">
    <label for="txtID" class="form-label">ID:</label>
    <input readonly value="<?php echo $txtID?>" type="text"
    class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">


      <label for="nombreconfiguracion" class="form-label">Nombre de la configuración</label>
      <input value="<?php echo $nombreconfiguracion?>" type="text"
      class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre de la configuración">

    <label for="valorconfiguracion" class="form-label">Valor</label>
    <input value="<?php echo $valorconfiguracion?>" type="text"
    class="form-control" name="valorconfiguracion" id="valorconfiguracion" aria-describedby="helpId" placeholder="Valor">

   
    
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
<a name="cancelar" id="cancelar" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>
  </div>
</div>


<?php
include("../../templates/footer.php")
?>
