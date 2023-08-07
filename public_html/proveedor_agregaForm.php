<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1) {
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include ('clases/linea.php');
$conexion = connect_db();
$linea=new Linea();
$linea->conectar_db($conexion);

?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="proveedor_agrega.php" method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="linea">Línea:</label>
                            <select class="form-control" name="nombre_linea">
                                <?php                                 
                                $datos_linea=$linea->listaline();
                                while ($row=mysqli_fetch_array($datos_linea)){
                                    $nombre = $row['nombre'];
                                    ?>
                                    <option value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
                                    <?php
                                }
                                
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once('footer.php') ?>

