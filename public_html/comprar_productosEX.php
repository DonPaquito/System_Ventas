<?php
include_once('includes/acceso.php');
$conexion = connect_db();

if (isset($_POST['envioProducto'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $query = "SELECT id, precio_unidad FROM producto WHERE nombre_producto = '$producto'";
    $result = mysqli_query($conexion, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_producto = $row['id'];
        $precio_unidad = $row['precio_unidad'];
        $query_insert = "INSERT INTO temp (cantidad, id_producto) VALUES ('$cantidad', '$id_producto')";
        $result_insert = mysqli_query($conexion, $query_insert);

        if ($result_insert) {
            echo "<script>window.location.href = 'comprar_productos.php?success=true';</script>";
        } else {
            echo "<script>window.location.href = 'comprar_productos.php?success=false';</script>";
        }
    } else {
        echo "<script>window.location.href = 'comprar_productos.php?success=false';</script>";
    }
}
?>
