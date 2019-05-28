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
<div class="container-fluid navbar-inverse bg-success fixed-top">
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

<!--slider-->
    <div class="fondo">
    <div class="container-fluid fondo-2">
      <div class="container d-flex flex-column h-100 justify-content-center  align-items-center text-white">
        <h1 class="pb-25">Ahorre con nosotros!</h1>
        <p class="pb-25 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis doloribus sunt vero aliquid tempora ex quae sed harum veritatis, quos corporis aliquam hic, inventore totam, veniam saepe expedita fugit ratione?</p>
        <div>
          <a href="#" class="btn bg-orange px-4">Leer más...</a>
        </div>
      </div>
    </div>
   </div>
    <!--slider-->
 <footer class="container-fluid bg-black text-center text-white py-5">
    <p>Derechos Reservados 2019.</p>
  </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/AjaxRequest.js" type="text/javascript"></script>
<script src="js/CuentaUsuario.js" type="text/javascript"></script>	
</body>
</html>