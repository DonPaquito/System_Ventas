<?php include_once('header.php') ?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="temp_agrega.php" method="post">
                        <div class="form-group">
                            <input type="text" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto:</label>
                            <select class="form-control" name="id_producto">
                                <!-- Aquí debes cargar las opciones desde la tabla producto -->
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
