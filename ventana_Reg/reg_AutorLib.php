<?php 
  
    include_once ('../conexion_PhpAdmin.php');  
    
    if(isset($_REQUEST['boton'])){
        if(!empty($_POST['nameAutor'])){
            
            $autor = $_POST['nameAutor'];

            try{    
                    
                $stmt = "INSERT INTO reg_autor (nombre_Autor) VALUES ('$autor')";
                mysqli_query($conn, $stmt);
                echo "<script>alert('Datos registrados correctamente en la base de datos!')</script>";
            
            }
            catch(Exception $e) {

                echo "Error en la consulta de datos " . $e->getMessage();
            }
        }
        else 
            echo "<script>alert('Datos vacios)</script>";    
           
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

    <title>Registro de autor</title>

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
                        <h3 _msthash="1213043" _msttexthash="115427">Registro de autor</h3>
                        <form class="mb-5" method="post" id="formSoli" name="formNac" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label" _msthash="841113" _msttexthash="83291">Nombre de categoria</label>
                                    <input type="text" class="form-control" name="nameAutor" placeholder="Ingresa el nombre del autor" _mstplaceholder="113022">
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