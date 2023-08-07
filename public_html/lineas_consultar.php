<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1) {
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$linea = new Linea();
$linea->conectar_db($conexion);
$busqueda="";
?>
<form action="lineas_consultar.php" method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" id="busqueda" placeholder="Ingrese algo" name="busqueda">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<?php
if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
}
    $datos_linea = $linea->leerCuando($busqueda);
    if ($datos_linea) {
        ?>
        <div class="card card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($datos_linea)) {
                        $id = $row['id'];
                        $nombre = $row['nombre'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $nombre; ?>
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