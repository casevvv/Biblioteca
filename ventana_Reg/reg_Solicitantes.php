<?php 
  
    include_once ('../conexion_PhpAdmin.php');  
    
    if(isset($_REQUEST['boton'])){
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['selectSexo']) && !empty($_POST['telefono']) && !empty($_POST['select'])){
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $sexo = $_POST['selectSexo'];
            $telefono = $_POST['telefono'];
            $nacionalidad = $_POST['select'];
 

            try{    
                        
                $countNa=  $conn->query("SELECT * FROM reg_nacionalidad" );
                
                if($countNa->num_rows > 0){
                    $stmt = ("INSERT INTO reg_solicitante (nombre, apellido, idSexo, telefono, idNacionalidad) VALUES ('$nombre', '$apellido', '$sexo', '$telefono', '$nacionalidad')");
                    mysqli_query($conn, $stmt);
                   
                    echo "<script>alert('Datos registrados correctamente en la base de datos!')</script>";
                } 
                else
                    echo "<script>alert('No hay datos en la tabla'+$countNa+' de referencia en la base de datos')</script>";
            }
            catch(Exception $e) {

                echo "Error en la consulta de datos " . $e->getMessage();
            }
        }
        else 
            echo "<script>alert('Datos vacios')<script>";    
           
    }
/*
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$carnet = $_POST['carnet'];
$email = $_POST['email'];
$anio = $_POST['anio'];
$carrera = $_POST['carrera'];


switch($proceso){
	case 'Registro': mysqli_query($con, "INSERT INTO usuario_estudiante (carnet, nombre, apellidos, email, anio, carrera) VALUES('$carnet','$nombre','$apellidos',
	                     '$email', '$anio', '$carrera')");
	break;
	case 'Edicion':	mysqli_query($con, "UPDATE usuario_estudiante SET carnet = '$carnet', nombre = '$nombre', apellidos = '$apellidos',
	                             email = '$email', anio = '$anio', carrera = '$carrera'  WHERE id_usuario_estudiante = '$id'");
	break;
}
$registro = mysqli_query($con, "SELECT * FROM usuario_estudiante ORDER BY id_usuario_estudiante ASC");

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	 <th width="50">Carnet</th>
            	<th width="100">Estudiante</th>
				<th width="100">Apellidos</th>
				<th width="100">Email</th>
				<th width="50">Año</th>
				<th width="100">Carrera</th>
				<th width="100">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['carnet'].'</td>
				<td>'.$registro2['nombre'].'</td>
				<td>'.$registro2['apellidos'].'</td>
				<td>'.$registro2['email'].'</td>
				<td>'.$registro2['anio'].'</td>
				<td>'.$registro2['carrera'].'</td>
				<td> <a href="javascript:editarEmpleado('.$registro2['id_usuario_estudiante'].');" class="glyphicon glyphicon-edit eliminar"     title="Editar"></a>
				 <a href="javascript:eliminarEmpleado('.$registro2['id_usuario_estudiante'].');">
				 <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
				 </td>
				</tr>';
	}
echo '</table>';
  */  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Estilo/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../Estilo/css/styleFormSoli.css">

    <title>Registro del solicitante</title>

  </head>
  <body>
  <?php
    include('../header.php');
  ?>    
  <div class="content">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-12">
                    <div class="form h-100">
                        <h3 _msthash="1213043" _msttexthash="115427">Registro de solicitantes</h3>
                        <form class="mb-5" method="post" id="formSoli" name="formSoli" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841113" _msttexthash="83291">Primer nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="name" placeholder="Ingresa el nombre" _mstplaceholder="113022">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841123" _msttexthash="83491">Primer apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa el apellido" _mstplaceholder="114022">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841113" _msttexthash="83291">Sexo</label>
                                    <select class='custom-select ' name="selectSexo" >
                                    <option value=0>Selecciona</option>
                                        <?php 
                                           
                                            $query="SELECT * FROM reg_sexo";
                                            $resultado=mysqli_query($conn,$query);
                                           
                                                while($rows = mysqli_fetch_array($resultado)){
                                                    $sexo = $rows['sexo']; 
                                                    
                                                    
                                        ?> <option value="<?php echo $rows['idSexo']?>"> <?php echo $rows['sexo'] ?></option>;
                                        <?php
                                        }
                                        ?>
                                </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841123" _msttexthash="83491">Télefono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Ingresa el número de télefono" _mstplaceholder="114022">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="budget" class="col-form-label" _msthash="841438" _msttexthash="189345">Nacionalidad</label>
                                <select class='custom-select ' name="select" >
                                    <option value=0>Selecciona</option>
                                        <?php 
                                           
                                            $query="SELECT * FROM reg_nacionalidad";
                                            $resultado=mysqli_query($conn,$query);
                                           
                                                while($rows = mysqli_fetch_array($resultado)){
                                                    $nacionalidad = $rows['nacionalidad']; 
                                                    
                                                    
                                        ?> <option value="<?php echo $rows['idNacionalidad']?>"> <?php echo $rows['nacionalidad'] ?></option>;
                                        <?php
                                        }
                                        ?>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" name="boton" value="Registrar" class="btn btn-primary rounded-0 py-2 px-4" _mstvalue="230191">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>
                        <div id="form-message-warning mt-4"></div>
                        <div id="form-message-success" _msthash="437398" _msttexthash="761826" _msthidden="1">
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../jsFormSoli/js/jquery-3.3.1.min.js"></script>
    <script src="../jsFormSoli/js/popper.min.js"></script>
    <script src="../jsFormSoli/js/bootstrap.min.js"></script>
    <script src="../jsFormSoli/js/jquery.validate.min.js"></script>
    <script src="../jsFormSoli/js/main.js"></script>

  </body>
</html>