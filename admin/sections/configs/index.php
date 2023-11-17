<?php
include("../../bd.php");

  $sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
  $sentencia->execute();
  $Lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");


?>


<div class="card">
  <div class="card-header">
Configuraciones varias  
  
    
  </div>
  <div class="card-body">
    
  <div class="table-responsive-sm">
    <table class="table ">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre de la configuración</th>
          <th scope="col">Valor</th>
          <th scope="col">Acciones</th>
        
        </tr>
      </thead>
      <tbody>
        <?php foreach($Lista_usuarios as $registros){?>
        <tr class="">
          <td><?php echo $registros["id"];?></td>
          <td><?php echo $registros["nombreconfiguracion"];?></td>
          <td><?php echo $registros["valorconfiguracion"];?></td>
          <td>
            
        <a name="editar" id="editar" class="btn btn-warning" href="editar.php?txtID=<?php echo $registros["id"];?>" role="button">Editar</a>
        
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
