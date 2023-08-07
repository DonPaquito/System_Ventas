<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $nombre = strtoupper($_POST['nombre']);
    $ruc = $_POST['ruc'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $cliente = new Cliente();
    $cliente->conectar_db($conexion);
    
    $response = $cliente->modifica_cliente($id, $nombre, $ruc, $direccion, $telefono);

    if ($response) {
        header("location: cliente_lista.php");
    } else {
        echo "No se pudo modificar el cliente";
    }   
}
?>
