<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =($_POST['nom']);
    $dir = ($_POST['dir']);
    $tel = $_POST['tel'];
    $usu = ($_POST['usu']);
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $res = $oempleado->agrega_empleado($nom,$tel,$dir,$usu,$pass);

    if($res) {
        $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_empleado.php");
    } else
    echo "No se pudo agregar el producto";
    
}
?>
