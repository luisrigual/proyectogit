<?  
session_start();
  if (!session_is_registered('rut') && empty($_SESSION['rut']))
  {
    header ("Location: sesion.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <title>Banco BimYou</title>
</head>
<body>
<!--navbar-->
<div class="container-fluid navbar-inverse bg-blue fixed-top">
  <nav class="navbar navbar-expand-lg container">
    <a class="navbar-brand text-white" href="#"><img id="logo" src="img/logo.png" alt="logo"></i>Banco BimYou</a>
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="principal.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="depositos.php">Depósitos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="uf.php">Mostrar UF</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" onclick="CerrarSesion();">Cerrar Sesión</a>
        </li>
      </ul>
      </div>
  </nav>
</div>
<!--navbar-->

<!--form-->
<form action="">	
  <div class="container-fluid pt-5">
    <div class="container">
    <h1 class="text-primary text-center pt-5">Clientes</h1>
  <h6 class="text-secondary text-center py-4">Todos los datos son obligatorios</h6>
  <div class="form-row">
    <div class="col-md-2"></div>
    <div class="form-group col-md-4">
      <label for="rut">RUT</label>
      <input type="number" class="form-control form-control-sm" id="rut" placeholder="RUT" required="required" onchange="buscar();">
    </div>
    <div class="form-group col-md-4">
      <label for="nombre">Apellidos y Nombres</label>
      <input type="text" class="form-control form-control-sm" id="nombre"  placeholder="Apellidos y Nombres" required="required" pattern="[A-Z a-z]*">
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="form-row">
  <div class="col-md-2"></div>
  <div class="form-group col-md-4">
    <label for="numeroc">Numero de Cuenta</label>
    <input type="number" class="form-control form-control-sm" id="numeroc" placeholder="Número de cuenta" required="required">
  </div>
  <div class="form-group col-md-4">
    <label for="saldo">Saldo Inicial</label>
    <input type="text" class="form-control form-control-sm" id="saldo" placeholder="Saldo" required="required">
  </div>
  <div class="col-md-2"></div>
</div>
<div class="form-row">
  <div class="col-md-2"></div>
  <div class="form-group col-md-4">
     <label for="clave">Contraseña</label>
      <input type="email" class="form-control form-control-sm col-md-12" id="clave" placeholder="Contraseña" required="required">
  </div>
  <div class="col-md-2"></div>
</div>
    
  <div class="text-center col-md-12 mt-1">
  <button type="button" class="btn btn-primary px-5" id="guardarc" onclick="guardar();">Guardar</button>
  <button type="button" class="btn btn-primary px-5" id="modificarc" onClick="modificar();" disabled="disabled">Modificar</button>
  <button type="button" class="btn btn-primary px-5" onClick="limpiar();">Cancelar</button>
  </div>
  </div>
</div>
</form>
<!--form-->
<footer class="container-fluid bg-black text-center text-white mt-4 py-5">
    <p>Derechos Reservados 2019.</p>
</footer>
<script src="js/AjaxRequest.js" type="text/javascript"></script>
<script src="js/clientes.js" type="text/javascript"></script>
<script src="js/CuentaUsuario.js" type="text/javascript"></script>  
</body>
</html>