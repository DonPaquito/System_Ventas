<?php
  session_start();
  if (isset($_SESSION["nombre"]) and ($_SESSION['login_estado']) != 1) {
    echo $_SESSION["nombre"];
    header("location:login.php");
  }
  $total;
  include_once('includes/acceso.php');
  $conexion = connect_db();
?>
  <?php include('header.php');
  ?>
<form action="compra_realizar.php" method="POST">
    <div class="container mt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th><label for="empleado">Empleado:</label></th>
            <th class="w-25" style="background-color: blueviolet; color: black;">
              <div class="form-group">
                <input type="text" class="form-control" id="nombre_sesion" name="nombre_sesion"
                  value="<?php echo $_SESSION['nombre']; ?>" readonly>
              </div>
            </th>            
            <th><label for="documento">Documento:</label></th>
            <th class="w-25" style="background-color: blueviolet; color: black;">
              <div class="form-group">
                <select class="form-control" name="documento" id="documento">
                  <?php
                  // Obtener los documentos de la base de datos
                  $query_documentos = "SELECT * FROM documento";
                  $result_documentos = mysqli_query($conexion, $query_documentos);
                  while ($row_documento = mysqli_fetch_array($result_documentos)) {
                    $nombre_documento = $row_documento['nombre'];
                    echo "<option value='$nombre_documento'>$nombre_documento</option>";
                  }
                  ?>
                </select>
              </div>
            </th>
            <th><label for="numero">Número:</label></th>
            <th class="w-25" style="background-color: blueviolet; color: black;">
              <!-- Input number de solo lectura con el valor del campo "numero_actual" -->
              <div class="form-group">
                <?php

                // Obtener el valor del campo "numero_actual" de la tabla "documento"
                $query_numero_actual = "SELECT numero_actual FROM documento WHERE id = 1"; // Suponiendo que el ID del documento es 1
                $result_numero_actual = mysqli_query($conexion, $query_numero_actual);
                $row_numero_actual = mysqli_fetch_array($result_numero_actual);
                $numero_actual = $row_numero_actual['numero_actual'];
                // Mostrar el valor en el input number de solo lectura
                echo "<input type='number' class='form-control' name='numero_actual' id='numero_actual' value='$numero_actual' readonly>";
                ?>
              </div>
            </th>
          </tr>
          <tr>
          <th><label for="proveedor">Proveedor:</label></th>
            <th class="w-25" style="background-color: blueviolet; color: black;">
              <div class="form-group">
                <select class="form-control" name="proveedor" id="proveedor">
                  <?php
                  // Obtener los proveedores de la base de datos
                  $query_proveedores = "SELECT * FROM proveedor";
                  $result_proveedores = mysqli_query($conexion, $query_proveedores);
                  while ($row_proveedor = mysqli_fetch_array($result_proveedores)) {
                    $nombre_proveedor = $row_proveedor['nombre'];
                    echo "<option value='$nombre_proveedor'>$nombre_proveedor</option>";
                  }
                  ?>
                </select>
              </div>
            </th>
            <th><label for="tipo_compra">Tipo de compra:</label></th>
            <th class="w-25" style="background-color: blueviolet; color: black;">
              <div class="form-group">
                <select class="form-control" name="tipo_compra" id="tipo_compra">
                  <option value='contado'>Compra al contado</option>
                  <option value='credito'>Compra por crédito</option>
                </select>
              </div>
            </th>
            <th><label for="fecha">Fecha:</label></th>
            <th class="border-bottom" class="w-25" style="background-color: blueviolet; color: black;">
              <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>">
            </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="container mt-3 text-center">
      <div class="row">
        <div class="col-4 offset-4">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ComprarProducto">
            Agregar nuevo producto
          </button>
        </div>
      </div>
    </div>
    <br><br><br><br>
    <div class="container mt-3">
      <div id="alertMessage" class="alert alert-success d-none" role="alert"></div>
    </div>
    <div class="container mt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nro</th>
            <th>Código</th>
            <th colspan="2">Descripción</th>
            <th>Unidad</th>
            <th>Cantidad</th>
            <th>Precio unidad</th>
            <th>Importe</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Obtener los datos de la tabla temp
          include_once('includes/acceso.php');
          $conexion = connect_db();
          $query = "SELECT temp.numero, producto.id AS codigo, producto.nombre_producto AS descripcion, producto.unidad_medida AS unidad, temp.cantidad, producto.precio_unidad AS precio
          FROM temp
          INNER JOIN producto ON temp.id_producto = producto.id";
          $result = mysqli_query($conexion, $query);

          // Enumerar las filas
          $contador = 1;
          $total = 0;
          while ($row = mysqli_fetch_array($result)) {
            $codigo = $row['codigo'];
            $descripcion = $row['descripcion'];
            $unidad = $row['unidad'];
            $cantidad = $row['cantidad'];
            $precio = $row['precio'];
            $importe = $cantidad * $precio;

            echo "<tr>";
            echo "<td>$contador</td>";
            echo "<td>$codigo</td>";
            echo "<th colspan='2'>$descripcion</th>";
            echo "<td>$unidad</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$precio</td>";
            echo "<td>$importe</td>";
            echo "</tr>";
            $total = $total + $importe;
            $contador++;
          }
          ?>
        </tbody>
        <tfooter>
          <td><button type="submit" class="btn btn-secondary" name="boton" value="1">Guardar</button></td>
          <td><button type="submit" class="btn btn-success" name="boton" value="2">Limpiar</button></td>
          <td><button type="submit" class="btn btn-warning" name="boton" value="3">Imprimir</button></td>
          <td><button type="submit" class="btn btn-danger" name="boton" value="4">Salir</button></td>
          <th colspan="2"></th>
          <th colspan="2">
            <div class="container mt-3">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Subtotal</td>
                    <td>
                      <?php echo $total ?>
                    </td>
                  </tr>
                  <tr>
                    <td>IGV</td>
                    <td>
                      <?php echo $total * 18 / 100 ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>
                      <?php echo $total * 118 / 100 ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </th>
        </tfooter>
      </table>
    </div>
  </form>
  <div class="modal" id="ComprarProducto">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Añadir producto</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <!-- Formulario para agregar productos -->
          <form action="comprar_productosEX.php" method="post">
            <div class="container mt-3">
              <label for="producto">Producto:</label>
              <select class="form-control" name="producto" id="producto">
                <?php
                // Obtener los productos de la base de datos
                include_once('includes/acceso.php');
                $conexion = connect_db();
                $query = "SELECT * FROM producto";
                $result = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_array($result)) {
                  $nombre = $row['nombre_producto'];
                  $precio = $row['precio_unidad'];
                  echo "<option value='$nombre'>$nombre - Precio: $precio</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-outline">
              <label class="form-label" for="cantidad">Ingrese la cantidad:</label>
              <input type="number" id="cantidad" name="cantidad" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary" name="envioProducto">Submit</button>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


</form>
  <?php include('footer.php');?>

