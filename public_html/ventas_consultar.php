<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1) {
    header("location: login.php");
    exit;
}
include('header.php');
include('includes/acceso.php');
include('clases/venta.php');
include('clases/cliente.php');
include('clases/documento.php');
include('clases/empleado.php');
include('clases/detalle_venta.php');
include('clases/producto.php');
include('clases/linea.php');

$conexion = connect_db();
$venta = new Venta();
$cliente=new Cliente();
$producto=new Producto();
$documento=new Documento();
$empleado=new Empleado();
$linea=new Linea();
$detalle_venta=new DetalleVenta();
$cliente->conectar_db($conexion);
$documento->conectar_db($conexion);
$empleado->conectar_db($conexion);
$venta->conectar_db($conexion);
$linea->conectar_db($conexion);
$detalle_venta->conectar_db($conexion);
$producto->conectar_db($conexion);
?>
<form action="ventas_consultar.php" method="POST">
    <div class="mb-3">
        <input type="number" class="form-control" id="busqueda" placeholder="Ingrese la id de a venta que desea verificar" name="busqueda">
    </div>
    <div class="mb-3">        
    </div>
    <button type="submit" class="btn btn-primary">Buscar id</button>
</form>
<?php
if (isset($_POST['busqueda'])) {
    
    
    
    
    $busqueda = $_POST['busqueda'];
    $datos_venta = $venta->consulta($busqueda); // Suponiendo que $busqueda es el id de venta deseado
    if ($datos_venta) {
        
        
        $id = $datos_venta['id'];
        $fecha = $datos_venta['fecha'];
        $tipo_venta = $datos_venta['tipo_venta'];
        $id_cliente = $datos_venta['id_cliente'];
        $nombre_cliente=$cliente->obtenerNombreCliente($id_cliente);
        $id_empleado = $datos_venta['id_empleado'];
        $nombre_empleado=$empleado->obtenerNombreEmpleado($id_empleado);
        $id_documento = $datos_venta['id_documento'];
        $nombre_documento=$documento->obtenerNombreDocumento($id_documento);
        $numero_documento = $datos_venta['numero_documento'];   
        
        ?>
        <div class="container mt-3">
            <table class="table table-hover">
                <tr>
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;">
                            <h3 align="center">Fecha</h3>
                            <p align="center"><?php echo $fecha?></p>
                        </div>
                    </th>
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;">
                            <h3 align="center">Tipo de venta</h3>
                            <p align="center"><?php echo $tipo_venta?></p>
                        </div>
                    </th>
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;">
                            <h3 align="center">Cliente:</h3>
                            <p align="center"><?php echo $nombre_cliente?></p>
                        </div>
                    </th>
                </tr>
                <tr>                    
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;">
                            <h3 align="center">Nombre del empleado</h3>
                            <p align="center"><?php echo $nombre_empleado?></p>
                        </div>
                    </th>
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;">
                            <h3 align="center">Tipo de documento</h3>
                            <p align="center"><?php echo $nombre_documento?></p>
                        </div>
                    </th>
                    <th style="background-color: blueviolet; color: black;">
                        <div class="container" style="background-color: #ffffff; color: black;" >
                            <h3 align="center">Número de documento</h3>
                            <p align="center"><?php echo $numero_documento?></p>
                        </div>
                    </th>
                </tr>
                </table>
                <table class="table table-hover" >
                    <tr >
                        <td style="background-color: #c2e8c2; color: black;"><h4>Número</h4></td>
                        <td style="background-color: #c2e8c2; color: black;"><h4>Código del producto</h4></td>    
                        <td style="background-color: #c2e8c2; color: black;"><h4>Nombre del producto</h4></td>
                        <td style="background-color: #c2e8c2; color: black;"><h4>Unidad de medida</h4></td>
                        <td style="background-color: #c2e8c2; color: black;"><h4>Descripción</h4></td>
                        <td style="background-color: #c2e8c2; color: black;"><h4>Pecio por unidad</h4></td>
                        <td style="background-color: #c2e8c2; color: black;"><h4>Línea del producto</h4></td>
                    <tr>
                    <tr>
                    <?php
                    $contador=1;
                        $detalles=$detalle_venta->buscarIdVenta($id);
                        while ($row=mysqli_fetch_array($detalles)){
                            $id_producto=$row['id_producto'];
                            $cantidad=$row['cantidad'];
                            $busquedaProducto=$producto->buscarIdProducto($id_producto);
                            if ($busquedaProducto) {
                                $nombre_producto = $busquedaProducto['nombre_producto'];
                                $unidad_medida = $busquedaProducto['unidad_medida'];
                                $stock = $busquedaProducto['stock'];
                                $descripcion = $busquedaProducto['descripcion'];
                                $precio_unidad = $busquedaProducto['precio_unidad'];
                                $costo_unidad = $busquedaProducto['costo_unidad'];
                                $id_linea = $busquedaProducto['id_linea'];
                                $nombre_linea=$linea->obtenerNombreLinea($id_linea);
                            }
                            ?>
                                <tr>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $contador; $contador++;?>
                                    </td>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $id_producto?>
                                    </td>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $nombre_producto;?>
                                    </td>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $unidad_medida;?>
                                    </td style="background-color: #fff9c2; color: black;">
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $descripcion;?>
                                    </td>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $precio_unidad;?>
                                    </td>
                                    <td style="background-color: #fff9c2; color: black;">
                                        <?php echo $nombre_linea;;?>
                                    </td>
                                </tr>
                            <?php
                         }
                    ?>            
            </table>
        </div>
        
        <?php    
    } 
}
?>
