<?php
include('header.php');

if (isset($_POST['envia_datos'])){
    $id = $_POST['id'];
    $nombre = strtoupper($_POST['nombre']);
    $numero_actual = $_POST['numero_actual'];

    include_once('includes/acceso.php');
    include_once('clases/documento.php');
    $conexion = connect_db();
    $documento = new Documento();
    $documento->conectar_db($conexion);

    $response = $documento->modifica_documento($id, $nombre, $numero_actual);

    if ($response) {
        header("location: documento_lista.php");
    } else {
        echo "No se pudo modificar el documento";
    }
}
?>
