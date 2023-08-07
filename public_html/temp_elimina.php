<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/temp.php');
$conexion = connect_db();
$temp = new Temp();
$temp->conectar_db($conexion);
$res = $temp->borrar($codigo);
if ($res) {
    header("Location: temp_lista.php");
} else {
    echo "Error no se pudo eliminar";
}
?>
