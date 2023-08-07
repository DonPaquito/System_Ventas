<?php

if (isset($_POST['envia_login'])){
   
    $nom = $_POST['usua'];
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $res = $oempleado->lee_datos($nom);
    if($res!=null) {
        // aqui validamos las credenciales
        $usuario = $res["usuario"];
        $clave = $res["contrasena"];
        

        if (password_verify($pass,$clave)) {

            //echo "acceso correcto";
          
            session_start();
            $_SESSION['nombre'] = $res["nombre"];
            $_SESSION['idEmpleado']= $res["id"];
            $_SESSION['login_estado'] = 1;
            header("location: index.php");
        
        } else{
               header("location: login.php");
              
    }
}
    else{
        header("location: login.php");
        }
   
    
}
?>


