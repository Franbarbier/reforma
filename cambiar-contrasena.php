<!-- Renderizamos lo mas importante  -->
<?php
session_start();

$id = $_SESSION['id_user'];
// $id = 2;

if(isset($_GET['logout'])){
	session_destroy();
	header('location: login.php');
}


require 'php/connection.php';
require 'php/models/Usuarios.php';

$usuarios = new Usuarios($id);

$usuario = $usuarios->verUsuario();

$reservas_activas = $usuarios->verReservasActivas();

$nivel = $usuarios->verNivel();

// Descomentar esto de abajo una vez que se active el login
// if(!isset($_SESSION['user'])){
// 	header('location: http://localhost/reforma');
// }

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['id_user'])){
	$logeado = 'si';
}


?>

<!DOCTYPE html>

<html lang="es">

<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Reforma | Tu perfil</title>
    <meta name="keywords" content="">
    <meta name="author" content="">
	<meta name="description" content="">		

	<meta name="robots" content="noindex,nofollow"/>

	<meta name="googlebot" content="noindex,nofollow"/>

	<!-- no scalable -->		 

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fav Icon -->

	<link rel="icon" href="imgs/logo-chico.svg" type="image/x-icon"/>

	<link rel="shortcut icon" href="imgs/logo-chico.svg" type="image/x-icon"/>

	<!-- que link prioriza google -->

	<link href="" rel="canonical">

	<!-- Redes sociales -->

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Reforma">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
	<meta property="og:image" content="">
	<meta property="og:url" content=""/>
    <meta property="og:image:type" content="image/jpg">
    <!--<meta property="og:image:width" content="1024">-->
    <!--<meta property="og:image:height" content="1024">-->
    <!--<meta property="fb:app_id" content="">-->

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/perfil-desk.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/perfil-mob.css?refrescate=4" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>

<nav>
<input type="hidden" value="<?php echo $logeado ?>" id="logeado">
	<div class="cont90">
		<div>

			<div>
				<a href="/">
					<img src="imgs/logo-chico.svg" alt="logo reforma alquile de inmuebles">
				</a>
			</div>
			<div id="menu-cont">
				<div>
					<div id="linea-menu1"></div>
					<div id="linea-menu2"></div>
				</div>
				
			</div>
		</div>
	</div>
</nav>
<?php include 'menu.php' ?>


<main class="cont90"> 
	<div id="cambiar-cont">
		<h2>Cambiar contraseña</h2>
		<form action="">
			<div>
				<label for="mail">Mail de la cuenta</label>
				<input type="email">
			</div>
			<div>
				<label for="mail">Contraseña actual</label>
				<input type="password">
			</div>
			<div>
				<label for="mail">Nueva contraseña</label>
				<input type="password">
			</div>
			<div>
				<label for="mail">Repetir nueva contraseña</label>
				<input type="password">
			</div>
			<input type="submit" value="CAMBIAR" id="ok-cambiar">
		</form>
	</div>
</main>


</body>

<script src="js/perfil.js"></script>
<script>
$( document ).ready( function(){





});
</script>

</html>