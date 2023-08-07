<?php    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    include_once('clases/documento.php');
    include_once('clases/cliente.php');
    include_once('clases/venta.php');
    include_once('clases/detalle_venta.php');
    include_once('clases/temp.php');

    $conexion = connect_db();
    $boton=$_POST['boton'];
    if($boton==1){
        $vendedor=$_POST['nombre_sesion'];
        $cliente=$_POST['cliente'];
        $documento=$_POST['documento'];
        $tipo_venta=$_POST['tipo_venta'];
        $numero_actual=$_POST['numero_actual'];
        $fecha=$_POST['fecha'];        

        $oEmpleado=new Empleado();
        $oCliente=new Cliente();
        $oDocumento=new Documento();
        $oEmpleado->conectar_db($conexion);
        $oCliente->conectar_db($conexion);
        $oDocumento->conectar_db($conexion);

        $id_cliente=$oCliente->lee_id($cliente);
        $id_empleado=$oEmpleado->lee_id($vendedor);
        $id_documento=$oDocumento->lee_id($documento);

        $oVenta=new Venta();
        $oVenta->conectar_db($conexion);
        $id_ultima_venta=$oVenta->lee_ultima_id();
        $oDetalleVenta=new DetalleVenta();
        $oDetalleVenta->conectar_db($conexion);

        $oVenta->agrega_venta($fecha, $tipo_venta, $id_cliente, $id_empleado, $id_documento,$numero_actual);
        $ultima_venta=$oVenta->lee_ultima_id();

        $oTemp = new Temp();
        $oTemp->conectar_db($conexion);
        $datos_temp=$oTemp->listatemp();   
        while ($row = mysqli_fetch_array($datos_temp)) {
            $id_producto = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $oDetalleVenta->agrega_detalle_venta($ultima_venta, $id_producto, $cantidad);
        }
        $oTemp->vaciarTemp();
        $oDocumento->modifica_documento($id_documento, $documento, $numero_actual + 1);
        header("location:vender_productos.php");
    }
    if($boton==2){
        $oTemp = new Temp();
        $oTemp->conectar_db($conexion);
        $oTemp->vaciarTemp();
        header("location:vender_productos.php");
    }
    if($boton==3){
        header("location:vender_productos.php");
    }
    if($boton==4){
        header("location:index.php");
    }
?>