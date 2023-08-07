
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$res=$oproducto->borrar($codigo);

if ($res) {
    echo '<script>window.location.href = "producto_lista.php";</script>';
} else {
    echo "Error: No se pudo eliminar el producto. Detalles: " . $conexion->error;
}

