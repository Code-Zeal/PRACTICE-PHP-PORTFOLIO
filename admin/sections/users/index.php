<?php
include("../../bd.php");

  if(isset($_GET["txtID"])){
  $txtID = $_GET["txtID"];
  $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  };

  $sentencia=$conexion->prepare("SELECT * FROM `tbl_usuarios`");
  $sentencia->execute();
  $Lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");


?>


<div class="card">
  <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    
  </div>
  <div class="card-body">
    
  <div class="table-responsive-sm">
    <table class="table ">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Usuario</th>
          <th scope="col">Correo</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($Lista_usuarios as $registros){?>
        <tr class="">
          <td><?php echo $registros["id"];?></td>
          <td><?php echo $registros["usuario"];?></td>
          <td><?php echo $registros["correo"];?></td>
          <td>
            
        <a name="editar" id="editar" class="btn btn-warning" href="editar.php?txtID=<?php echo $registros["id"];?>" role="button">Editar</a>


        <a name="eliminar" id="eliminar" class="btn btn-danger " href="index.php?txtID=<?php echo $registros["id"];?>" role="button" >Eliminar</a>
        
      </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
  

  </div>

</div>

<?php
include("../../templates/footer.php")
?>
