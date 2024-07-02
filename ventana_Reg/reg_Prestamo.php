<?php 
  
    include_once ('../conexion_PhpAdmin.php');  
    
    if(isset($_REQUEST['boton'])){
        if(!empty($_POST['selectSoli']) && !empty($_POST['selectLibro']) && !empty($_POST['fecha'])){
    
            $solicitante = $_POST['selectSoli'];
            $libro = $_POST['selectLibro'];
            $fecha = $_POST['fecha'];

            try{    
                        
                $countSoli=  $conn->query("SELECT * FROM reg_solicitante" );
                
                if($countSoli->num_rows > 0){
                    $stmt =$conn->prepare = "INSERT INTO reg_prestamo (nombre_Solicitante, nombre_Libro, fecha_Prestamo) VALUES ('$solicitante', '$libro', '$fecha')";
                    echo "<script>alert('Datos registrados correctamente en la base de datos!')</script>";
                } 
                else
                    echo "<script>alert('No hay datos en la tabla de referencia en la base de datos')</script>";
            }
            catch(Exception $e) {

                echo "Error en la consulta de datos " . $e->getMessage();
            }
        }
        else 
            echo "<script>alert('Datos vacios')<script>";    
           
    }
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

    <title>Registro prestamo</title>

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
                        <h3 _msthash="1213043" _msttexthash="115427">Registro de prestamos</h3>
                        <form class="mb-5" method="post" id="formSoli" name="formSoli" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841113" _msttexthash="83291">Nombre del solicitante</label>
                                    <select class='custom-select ' name="selectSoli" >
                                    <option value=0>Selecciona</option>
                                        <?php 
                                           
                                            $query="SELECT * FROM reg_solicitante";
                                            $resultado=mysqli_query($conn,$query);
                                           
                                                while($rows = mysqli_fetch_array($resultado)){
                                                    $solicit = $rows['nombre']; 
                                                    
                                                    
                                        ?> <option value="<?php echo $rows['idSolicitante']?>"> <?php echo $rows['nombre'] ?></option>;
                                        <?php
                                        }
                                        ?>
                                </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841123" _msttexthash="83491">Nombre del libro</label>
                                    <select class='custom-select ' name="selectLibro" >
                                    <option value=0>Selecciona</option>
                                        <?php 
                                           
                                            $query="SELECT idLibro, nombre_libro FROM reg_libro";
                                            $resultado=mysqli_query($conn,$query);
                                           
                                                while($rows = mysqli_fetch_array($resultado)){
                                                    $nameLib = $rows['nombre_libro']; 
                                                    
                                                    
                                        ?> <option value="<?php echo $rows['idLibro']?>"> <?php echo $rows['nombre_libro'] ?></option>;
                                        <?php
                                        }
                                        ?>
                                </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841123" _msttexthash="83491">Fecha del prestamo</label>
                                    <input type="text" class="form-control" name="fecha" value="<?php echo date('d-m-Y');?>" _mstplaceholder="114022">
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