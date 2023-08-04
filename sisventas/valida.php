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
    
    if($res) {
        // aqui validamos las credenciales
        $usuario = $res["usuario"];
        $clave = $res["password"];
        
        if (password_verify($pass,$clave)) {
            //echo "acceso correcto";
            session_start();
            $_SESSION['nombre'] = $res["nombre"];
            $_SESSION['idEmpleado']= $res["idEmpleado"];
            $_SESSION['login_estado'] = 1;
            header("location: index.php");
        } else
               //header("location: index.php");
       

    }else
          //header("location: index.php");

   
   
}
?>