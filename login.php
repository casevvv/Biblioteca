<?php 
    include 'conexion_Pg.php';
    SESSION_START();

    if($_POST){
        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $username = $_POST['name'];
            $contrasena = $_POST['password'];

            $stmt =$conn->prepare("SELECT nombre, contrasena FROM usuarios WHERE nombre= '$username' && contrasena= '$contrasena'");          
            $stmt->execute();
            $stmt->bind_result($username, $contrasena);
            
            if($stmt->fetch())
               
                header("location:index.php");
            else {
                echo "Error";
            }
        }    
           
    }

?>
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta charset="UTF-8"/>
        <title>Inicio de sesión</title>
    </head>
    <body>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="Estilo/css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Ingresa el usuario para acceder </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/login.jpg);">
              </div>
                    <div class="login-wrap p-4 p-md-5">
                  <div class="d-flex">
                      <div class="w-100">
                          <h3 class="mb-4">Inicio de sesión</h3>
                      </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                  </div>
                        <form action="" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Usuario</label>
                                    <input type="text" name="name" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Iniciar sesión</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Recuerdame
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Olvide la contraseña</a>
                                </div>
                </div>
              </form>
              <p class="text-center">No estas registrado? <a data-toggle="tab" href="#signup">Inscribirse</a></p>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
    </body>
</html>
