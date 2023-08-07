<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $nombre = strtoupper($_POST['nombre']);
    
    include_once('includes/acceso.php');
    include_once('clases/linea.php');
    $conexion = connect_db();
    $linea = new Linea();
    $linea->conectar_db($conexion);
    
    $response = $linea->modifica_linea($id, $nombre);

    if ($response) {
        header("location: linea_lista.php");
    } else {
        echo "No se pudo modificar la línea";
    }   
}
?>
