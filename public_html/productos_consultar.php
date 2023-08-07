<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1) {
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$producto = new Producto();
$producto->conectar_db($conexion);
$busqueda="";
$row;
?>
<form action="productos_consultar.php" method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" id="busqueda" placeholder="Ingrese el inicio de su palabra a buscar" name="busqueda">
    </div>
    <div class="mb-3">
        
    </div>
    <button type="submit" class="btn btn-primary">Buscar nombre</button>
</form>
<?php
if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
}
    $datos_producto = $producto->leerCuando("nombre_producto",$busqueda);
    if ($datos_producto) {
        ?>
        <div class="card card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <form action="productos_consultar.php" method="post">
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="1">Id</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="2">Nombre</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="3">Unidad de medida</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="4">Stock</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="5">Descripcion</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="6">Precio por unidad</button></th>
                            <th><button type="submit" class="btn btn-success" name="botonOrden" value="7">Costo por unidad</button></th>
                        </form>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['botonOrden'])){
                        $boton=$_POST['botonOrden'];
                        $conexion = connect_db();
                        $producto=new Producto();
                        $producto->conectar_db($conexion);
                        if($_SESSION["listaBooleans"]==null){
                            $listaBooleans=array(true, true, true, true, true, true, true);
                        }
                        $listaBooleans = $_SESSION["listaBooleans"];
                        
                        switch($boton){
                            case 1:
                                $datos_producto=$producto->ordenarPo('id',$listaBooleans[0]);
                                $listaBooleans[0]=!$listaBooleans[0];
                                break;
                            case 2:
                                $datos_producto=$producto->ordenarPo('nombre_producto',$_SESSION["listaBooleans"][1]);
                                $listaBooleans[1]=!$listaBooleans[1];
                                break;
                            case 3:
                                $datos_producto=$producto->ordenarPo('unidad_medida',$_SESSION["listaBooleans"][2]);
                                $listaBooleans[2]=!$listaBooleans[2];                                
                                break;    
                            case 4:
                                $datos_producto=$producto->ordenarPo('stock',$_SESSION["listaBooleans"][3]);
                                $listaBooleans[3]=!$listaBooleans[3];
                                break;
                            case 5:
                                $datos_producto=$producto->ordenarPo('descripcion',$_SESSION["listaBooleans"][4]);
                                $listaBooleans[4]=!$listaBooleans[4];
                                break;
                            case 6:
                                $datos_producto=$producto->ordenarPo('precio_unidad',$_SESSION["listaBooleans"][5]);
                                $listaBooleans[5]=!$listaBooleans[5];
                                break;
                            case 7:
                                $datos_producto=$producto->ordenarPo('costo_unidad',$_SESSION["listaBooleans"][6]);
                                $listaBooleans[6]=!$listaBooleans[6];
                                break;
                        }
                        $_SESSION['listaBooleans'] =  $listaBooleans;
                    }                    
                    while ($row = mysqli_fetch_array($datos_producto)) {
                        $id = $row['id'];
                        $nombre = $row['nombre_producto'];
                        $unidad=$row['unidad_medida'];
                        $stock=$row['stock'];
                        $descripcion=$row['descripcion'];
                        $precio=$row['precio_unidad'];
                        $costo=$row['costo_unidad'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $nombre; ?>
                            </td>
                            <td>
                                <?php echo $unidad; ?>
                            </td>
                            <td>
                                <?php echo $stock; ?>
                            </td>
                            <td>
                                <?php echo $descripcion; ?>
                            </td>
                            <td>
                                <?php echo $precio; ?>
                            </td>
                            <td>
                                <?php echo $costo; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        <?php    
}
include('footer.php');
?>