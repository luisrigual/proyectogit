<?  
session_start();
  if (!session_is_registered('rut') && empty($_SESSION['rut']))
  {
    header ("Location: sesion.html");
  }
  function api(){
    $fecha=(date("d")-1)."-".date("m")."-".date("Y");
    $url="http://mindicador.cl/api/uf/";
    return $respuesta=$url.$fecha;
  }
  $direccion=api();
  $json=file_get_contents($direccion);
  $datos=json_decode($json,true);
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
  <div class="container-fluid pt-5">
    <div class="container">
    <h1 class="text-primary text-center pt-5">Mostrar UF del Día</h1>
    <h6 class="text-secondary text-center py-4">Fecha: <?php echo (date("d")-1)."-".date("m")."-".date("Y");?></h6>
    <div>
        <table class="table table-bordered mt-5 pt-5">
          <tbody>
            <tr>
              <th scope="row">Autor:</th>
              <td><?php echo $datos["autor"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Nombre: </th>
              <td><?php echo $datos["nombre"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Unidad de Medida: </th>
              <td><?php echo $datos["unidad_medida"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Valor: </th>
              <td><?php echo $datos["serie"][0]["valor"];?></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
<!--form-->
<footer class="container-fluid bg-black text-center text-white mt-4 py-5">
    <p>Derechos Reservados 2019.</p>
</footer>
<script src="js/AjaxRequest.js" type="text/javascript"></script>
<script src="js/clientes.js" type="text/javascript"></script>
<script src="js/CuentaUsuario.js" type="text/javascript"></script>  
</body>
</html>