<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $nombre = strtoupper($_POST['nombre']);
    $unidad = strtoupper($_POST['unidad']);
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $costo = $_POST['costo'];
    
    include_once('includes/acceso.php');
    include_once('clases/producto.php');
    $conexion = connect_db();
    $oproducto = new Producto();
    $oproducto->conectar_db($conexion);
    
    $response = $oproducto->modifica_producto($id, $nombre, $unidad, $cantidad, $precio, $costo);

    if ($response) {
        header("location: producto_lista.php");
    } else {
        echo "No se pudo modificar el producto";
    }    
}
?>
