<?php include_once('header.php') ?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
    <div class="card card-body">
        <form action="cliente_agrega.php" method="post">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
            </div>
            <div class="form-group">
                <input type="text" name="ruc" class="form-control" placeholder="RUC">
            </div>
            <div class="form-group">
                <input type="text" name="direccion" class="form-control" placeholder="Dirección">
            </div>
            <div class="form-group">
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
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
