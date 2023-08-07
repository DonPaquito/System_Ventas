<?php

if (isset($_POST['envia_datos'])){
    $cantidad = $_POST['cantidad'];
    $id_producto = $_POST['id_producto'];
    
    include_once('includes/acceso.php');
    include_once('clases/temp.php');
    $conexion = connect_db();
    $temp = new Temp();
    $temp->conectar_db($conexion);
    
    $response = $temp->agrega_temp($cantidad, $id_producto);

    if ($response) {
        header("location: temp_lista.php");
    } else {
        echo "No se pudo agregar el registro temporal";
    }
}
?>
