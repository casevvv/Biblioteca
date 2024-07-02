<?php
    include('../header.php');
  
    include('../conexion_PhpAdmin.php');

    $stmt = "SELECT * FROM reg_solicitante  ORDER BY idSolicitante ASC ";
    $res=mysqli_query($conn, $stmt);
    if($res->num_rows < 0)
      echo "<script>alert('NO hay registros para mostrar');</script>";

?>


  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Consulta general de Solicitantes</h2>
      

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  

              <th scope="col">
                <label class="control control--checkbox">
                  <input type="checkbox"  class="js-check-all"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
              
              <th scope="col">id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Sexo</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Nacionalidad</th>
             
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <th scope="row">
                <label class="control control--checkbox">
                  <input type="checkbox"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
              <?php
              while($resultado = mysqli_fetch_array($res)){?>
    
                    <td><?php $resultado['idSolicitante']?></td>
                    <td><?php $resultado['nombre']?></td>
                    <td><?php $resultado['apellido']?></td>
                    <td><?php $resultado['idSexo']?></td>
                    <td><?php $resultado['telefono']?></td>
                    <td><?php $resultado['idNacionalidad']?></td>;
             <?php }
              ?>
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
          
            
          </tbody>
        </table>
      </div>


    </div>

  </div>
    

	<?php include('../footer.php') ?>