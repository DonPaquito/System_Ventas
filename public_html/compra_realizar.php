<?php    
include_once('includes/acceso.php');
include_once('clases/empleado.php');
include_once('clases/documento.php');
include_once('clases/proveedor.php'); 
include_once('clases/compra.php');
include_once('clases/detalle_compra.php');
include_once('clases/temp.php');

$conexion = connect_db();
$boton=$_POST['boton'];
if($boton==1){
    $empleado=$_POST['nombre_sesion'];
    $proveedor=$_POST['proveedor'];
    $fecha=$_POST['fecha'];        

    $oEmpleado=new Empleado();
    $oProveedor=new Proveedor();
    $oDocumento=new Documento();
    $oEmpleado->conectar_db($conexion);
    $oProveedor->conectar_db($conexion);
    $oDocumento->conectar_db($conexion);

    $id_proveedor=$oProveedor->lee_id($proveedor);
    $id_empleado=$oEmpleado->lee_id($empleado);

    $oCompra=new Compra();
    $oCompra->conectar_db($conexion);
    $id_ultima_compra=$oCompra->lee_ultima_id();
    $oDetalleCompra=new DetalleCompra();
    $oDetalleCompra->conectar_db($conexion);

    $oCompra->agrega_compra($fecha, $id_proveedor);
    $ultima_compra=$oCompra->lee_ultima_id();

    $oTemp = new Temp();
    $oTemp->conectar_db($conexion);
    $datos_temp=$oTemp->listatemp();   
    while ($row = mysqli_fetch_array($datos_temp)) {
        $id_producto = $row['id_producto'];
        $cantidad = $row['cantidad'];
        $oDetalleCompra->agrega_detalle_compra($ultima_compra, $id_producto, $cantidad); 
    }
    $oTemp->vaciarTemp();
    $oDocumento->modifica_documento($id_documento, $documento, $numero_actual + 1);
    header("location:comprar_productos.php");
}
if($boton==2){
    $oTemp = new Temp();
    $oTemp->conectar_db($conexion);
    $oTemp->vaciarTemp();
    header("location:comprar_productos.php");
}
if($boton==3){

}
if($boton==4){

}
?>
