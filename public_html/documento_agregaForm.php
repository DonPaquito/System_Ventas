<?php 
session_start();
if (!isset($_SESSION['login_estado']) || $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
    <div class="card card-body">
        <form action="documento_agrega.php" method="post">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Documento" autofocus>
            </div>
            <div class="form-group">
                <input type="number" name="numero_actual" class="form-control" placeholder="Número Actual">
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
