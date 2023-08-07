<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $id_producto = $_POST['id_producto'];
    
    include_once('includes/acceso.php');
    include_once('clases/temp.php');
    $conexion = connect_db();
    $temp = new Temp();
    $temp->conectar_db($conexion);
    
    $response = $temp->modifica_temp($id, $cantidad, $id_producto);

    if ($response) {
        header("location: temp_lista.php");
    } else {
        echo "No se pudo modificar el registro temporal";
    }   
}
?>
