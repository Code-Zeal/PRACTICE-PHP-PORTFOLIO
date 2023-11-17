<?php
include("../../bd.php");

  if(isset($_GET["txtID"])){
  $txtID = $_GET["txtID"];
  $sentencia=$conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  };

  $sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
  $sentencia->execute();
  $Lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);


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
          <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col">Puesto</th>
          <th scope="col">WhatsApp</th>
          <th scope="col">LinkedIn</th>
          <th scope="col">Email</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($Lista_equipo as $registros){?>
        <tr class="">
          <td><?php echo $registros["id"];?></td>
          <td scope="col">
           <img width="50" height="50" src="../../../assets/img/team/<?php echo $registros["imagen"];?>"/>
         </td>
          <td><?php echo $registros["nombrecompleto"];?></td>
          <td><?php echo $registros["puesto"];?></td>
          <td><?php echo $registros["whatsapp"];?></td>
          <td><?php echo $registros["linkedin"];?></td>
          <td><?php echo $registros["email"];?></td>
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
