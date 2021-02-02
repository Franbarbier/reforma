<?php
session_start();

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['id_user'])){
	$logeado = 'si';
}

require 'php/connection.php';
require 'php/models/Usuarios.php';
require 'php/models/Propiedades.php';

$usuarios = new Usuarios($_SESSION['id_user']);
$usuario = $usuarios->verUsuario();

?>

<!DOCTYPE html>

<html lang="es">

<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Gracias! | Reforma</title>
    <meta name="keywords" content="">
    <meta name="author" content="">
	<meta name="description" content="">		

	<meta name="robots" content="index,follow"/>

	<meta name="googlebot" content="index,follow"/>

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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/gracias.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/gracias-mob.css" />
    
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
				<div id="select-city-nav">
					<p id="f-ciudad-nav">Seleccione una ciudad</p>
					<article>

						<div id="ciudades-nav">
							<ul>
								<li>Todas</li>
							</ul>
						</div>
					</article>
					<button>BUSCAR</button>
				</div>
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

<main>

    <div id="heading">

        <div id="titles">
            <h1>Gracias por tu reserva!</h1>
            <!-- <h2>Enviamos los detalles a: <span id="mail-usuario"><?php echo $usuario['mail'] ?></span></h2> -->
            <a href="/"><div class="classic-btn">Regresar al Inicio</div></a>
        </div>
    
    </div>

</main>


<?php include 'footer.php'; ?>

</body>


<script>
</script>

</html>