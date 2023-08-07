
<?php include('header.php');
include('includes/acceso.php');
include('clases/cliente.php');
$codigo = $_GET["codigo"];
$conexion = connect_db();
$cliente = new Cliente();
$cliente->conectar_db($conexion);
$res = $cliente->borrar($codigo);

if ($res) {
    echo '<script>window.location.href = "cliente_lista.php";</script>';
} else {
    echo "Error no se pudo eliminar..";
}
?>
