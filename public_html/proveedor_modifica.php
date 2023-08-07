<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $nombre = strtoupper($_POST['nombre']);
    $nombre_linea = $_POST['nombre_linea'];
    
    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    include_once('clases/linea.php');
    $conexion = connect_db();
    $linea= new Linea();
    $proveedor = new Proveedor();
    $proveedor->conectar_db($conexion);
    $linea->conectar_db($conexion);
    $id_linea=$linea->obtenerIdLinea($nombre_linea);
    $response = $proveedor->modifica_proveedor($id, $nombre, $id_linea);

    if ($response) {
        header("location: proveedor_lista.php");
    } else {
        echo "No se pudo modificar el proveedor";
    }   
}
?>
