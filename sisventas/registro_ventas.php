<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
include_once('clases/cliente.php');
include_once('clases/documento.php');
//include_once('clases/empleado.php');
//include_once('clases/venta.php');
//include_once('clases/detalle_ventas.php');

$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();
$sql = "create table tmp_999(
    id int,
    idproducto int,
    unimed varchar(10),
    cant decimal(5,2),
    preuni decimal(5.2),
    cosuni decimal(5,2)
)";
mysqli_query($conexion, $sql);
?>
<h2>Registro de Ventas</h2>
<table border="0">
<form name="fventas" method="post" action="regventas.php">
<tr>
    <td>
<label for="exampleDataList" class="form-label">Cliente</label>
</td>
<td>
<select class="form-select" name="sel_cliente" aria-label="Default select example">
<?php
    while ($row=mysqli_fetch_array($datos_cli)){ 
        $id=$row["idCliente"];
        ?>
  <option value="<?php echo $id; ?>"><?php echo $row['nombre']; ?></option>
<?php
    }    
    ?>
</select>
</td>
</tr>
</form>
</table>
<?php
$sql = "drop table tmp_999";
mysqli_query($conexion, $sql);

?>