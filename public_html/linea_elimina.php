<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$linea = new Linea();
$linea->conectar_db($conexion);
$res = $linea->borrar($codigo);
if ($res) {
    header("Location: linea_lista.php");
} else {
    echo "Error no se pudo eliminar";
}
?>
