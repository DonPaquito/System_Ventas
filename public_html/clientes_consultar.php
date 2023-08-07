<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1) {
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$oCliente = new Cliente();
$oCliente->conectar_db($conexion);
$busquedaNombres = "";
$busquedaDireccion = "";
$listaCombinada = array();
?>
<form action="clientes_consultar.php" method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" id="busquedaNombres" placeholder="Ingrese algo" name="busquedaNombres">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="busquedaDireccion" placeholder="Ingrese algo"
            name="busquedaDireccion">
    </div>
    <button type="submit" class="btn btn-primary">Buscar por nombres</button>
</form>
<?php
if (isset($_POST['busquedaNombres'])) {
    $busquedaNombres = $_POST['busquedaNombres'];
}
if (isset($_POST['busquedaDireccion'])) {
    $busquedaDireccion = $_POST['busquedaDireccion'];
}
$clientes_nombre = $oCliente->leerNombre($busquedaNombres);
$clientes_direccion = $oCliente->leerDireccion($busquedaDireccion);
?>
<?php
if ($clientes_nombre && $clientes_direccion) {
    ?>
    <div class="card card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php
               while ($row1 = mysqli_fetch_array($clientes_nombre)) {
                $id1 = $row1['id'];
                $nombre1 = $row1['nombre'];

                // Reiniciamos el cursor del segundo resultado a la primera fila en cada iteración
                mysqli_data_seek($clientes_direccion, 0);

                while ($row2 = mysqli_fetch_array($clientes_direccion)) {
                    $id2 = $row2['id'];

                    if ($id1 == $id2) {
                        $direccion_cliente2 = $row2['direccion_cliente'];
                        $telefono_cliente2 = $row2['telefono_cliente'];

                        $listaCombinada[$id1] = array(
                            $id2,
                            $nombre1,
                            $direccion_cliente2,
                            $telefono_cliente2
                        );

                        break; // Salir del segundo bucle una vez que se encuentra la coincidencia
                    }
                }
            }

                foreach ($listaCombinada as $indice => $item) { ?>
                    <tr>
                        <td>
                            <?php echo $item[0] ?>
                        </td>
                        <td>
                            <?php echo $item[1] ?>
                        </td>
                        <td>
                            <?php echo $item[2] ?>
                        </td>
                        <td>
                            <?php echo $item[3] ?>
                        </td>
                    </tr>
                <?php }
} ?>


        </tbody>
    </table>
</div>
</div>
</div>
<?php

include('footer.php');
?>