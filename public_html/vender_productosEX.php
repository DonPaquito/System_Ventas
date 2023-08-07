<?php
include_once('includes/acceso.php');
$conexion = connect_db();

if (isset($_POST['envioProducto'])) {
    // Obtener los datos del formulario
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Obtener el ID y el precio del producto seleccionado
    $query = "SELECT id, precio_unidad FROM producto WHERE nombre_producto = '$producto'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_producto = $row['id'];
        $precio_unidad = $row['precio_unidad'];

        // Insertar los datos en la tabla "temp"
        $query_insert = "INSERT INTO temp (cantidad, id_producto) VALUES ('$cantidad', '$id_producto')";
        $result_insert = mysqli_query($conexion, $query_insert);

        if ($result_insert) {
            // Mostrar mensaje de éxito en la página principal (vender_productos.php)
            echo "<script>window.location.href = 'vender_productos.php?success=true';</script>";
        } else {
            // Mostrar mensaje de error en la página principal (vender_productos.php)
            echo "<script>window.location.href = 'vender_productos.php?success=false';</script>";
        }
    } else {
        // Mostrar mensaje de error en la página principal (vender_productos.php)
        echo "<script>window.location.href = 'vender_productos.php?success=false';</script>";
    }
}
?>
