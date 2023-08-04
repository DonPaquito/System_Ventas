<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al sistema...</title>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
</head>
<body>
    <center>
        <br>
        <br>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Inicio de Sesion</h5>
    <div class="container-sm">

  <div class="text-center">
  <img src="img/acceso.png" width='48' class="rounded" alt="inicio sesion">
</div>  

</div>

 
<form name="login" method="post" action="valida.php">
  <div class="mb-3">
    <label for="Usuario" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usua" >
     </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="pass">
  </div>
  
  <button type="submit" name="envia_login" class="btn btn-primary">Ingresar</button>
  <button type="reset" class="btn btn-primary">Limpiar</button>
</form>
 
 </div>
  </div>
</div>

</center>
</body>
</html>

