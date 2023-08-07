<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$proveedor = new Proveedor();
$proveedor->conectar_db($conexion);
$res = $proveedor->borrar($codigo);
if ($res) {
    header("Location: proveedor_lista.php");
} else {
    echo "Error no se pudo eliminar";
}
?>
