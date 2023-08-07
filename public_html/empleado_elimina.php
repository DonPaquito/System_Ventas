<?php include('header.php') ?>

<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$empleado = new Empleado();
$empleado->conectar_db($conexion);
$res = $empleado->borrar($codigo);
if ($res) {
    header("Location: empleado_lista.php");
} else {
    echo "Error no se pudo eliminar";
}
?>
