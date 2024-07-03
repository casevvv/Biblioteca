<?php  
    include('./Controlador/C_registro.php');
    include_once ('../conexion_Pg.php');
    
    $controlador = new controladores();

    $controlador->c_categoriaL()
?>