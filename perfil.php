<!-- Renderizamos lo mas importante  -->
<?php
session_start();

$id = $_SESSION['id_user'];

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
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/perfil-mob.css?refrescate=1" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
<input type="hidden" value="<?php echo $nivel['next_level_score'] ?>" id="next_level_score">
<input type="hidden" id="id_usuario" value="<?php echo $id ?>">
<input type="hidden" id="numero_nivel" value="<?php echo $nivel['numero'] ?>">

<nav>
	<div class="cont90">
		<div>

			<div>
				<a href="http://67.222.7.138/~reforma/">
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

<div id="datos-usuario">
	<div>
		<div id="foto-perfil">
			<img src="https://cdn.urgente24.com/sites/default/files/2020-08/lionel-messi-manchester-city.jpg" alt="">
		</div>
		<div>
			<h1>Hola, <span><?php echo $usuario['nombre'] ?></span></h1>
			<ul id="info-perfil">
				<li><?php echo $usuario['mail'] ?></li>
				<li><?php echo $usuario['telefono'] ?></li>
				<li>Argentina</li>
			</ul>
		</div>
	</div>
	<div id="opciones">
		<ul>
			<li>
				<img src="imgs/configuracion.svg" alt=""><span>Configuración</span>
			</li>
			<li>
				<img src="imgs/logout.svg" alt=""><span>Salir</span>
			</li>
		</ul>
	</div>
</div>

<div id="datos-reservas-cont">
	
	<div id="reservas-cont">

		<div id="reservas-actuales">
			<div>
				<div>
					<h2>Reservas activas</h2><span>(<?php echo count($reservas_activas) ?>)</span>
				</div>
				<div>
			
			<?php
			foreach($reservas_activas as $key=>$reserva){
			
			?>
					<div class="actual-reserva-row">
						<div class="foto-prop-cont">
							<img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
						</div>
						<div class="nombre-prop">
							<h4><?php echo $reserva['nombre_propiedad'] ?></h4>
						</div>
						<div class="fechas-reserva">
							<p><?php echo $reserva['check_in'] ?></p> <img src="imgs/down-arrow.svg" alt=""> <p><?php echo $reserva['check_out'] ?></p>
						</div>
						<button class="ver-reserva">VER MAS</button>
					</div>

			<?php
			}
			?>

				</div>
			</div>
		</div>
		<div id="historial-reservas">
			<div>
				<div>
					<h2>Historial de reservas</h2>
				</div>
				<div id="reservas-historicas">
					<div id="historial-vacio">
						<div>
							<img src="imgs/historial-vacio.png" alt="">						<img src="" alt="">
						</div>
						<b>Aún no hiciste reservas</b>
						<p>Podés ver todos los destinos para comenzar tu experiencia:</p>
						<button>EXPLORAR</button>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div id="puntos-cont">

	<a href="index.php"><button>IR AL EXPLORADOR</button></a>
		<div>
			<div id="puntuacion">
				<div>
					<img src="imgs/logo-chico.svg" alt="">
					<div id="progreso">
						<!-- Generator: Adobe Illustrator 23.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg class="circulito-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
<style type="text/css">
	.st0{fill:none;stroke:#D4BFAA;stroke-width:13;stroke-miterlimit:10;}
	.ciruclito-svg{
	    stroke-dashoffset: 615;
		stroke-dasharray: 615;
		transition: .7s;
		transform: rotateZ(-90deg);
		transform-origin: 50% 50%;
	}
</style>
<circle  class="st0 ciruclito-svg" cx="100" cy="100" r="92.6"/>
</svg>
					</div>
				</div>
				<div>
					<p id="value2"><?php echo $nivel['score'] ?></p>
					<span id="nivel"><?php  echo $nivel['nivel'] ?></span>
				</div>
			</div>
			<div id="beneficios-cont">
				<h4>Beneficios por niveles</h4>
				<div>
					
				</div>
			</div>
		</div>
	</div>


</div>



</main>


</body>

<script src="js/perfil.js"></script>
<script>
$( document ).ready( function(){

// Esta variable corresponde a el valor que lleva .circulito-svg en algunas de sus propiedades de CSS
var base = 615
// Este es un valor hardcodeado necesario para que el fill del circulito svg sea preciso
var residual = 34

var next_level = $('#next_level_score').val()
var score = parseInt($('#value2').html())

var score_left = next_level - score

var perc_left = (score_left * 100) / next_level
console.log('perc left: ', perc_left)

var multiplier = parseFloat(perc_left / 100)
console.log('multiplier: ', multiplier)

score_left = (615 * multiplier) + residual


// function foo(){
// var cnt = 0;
// var obj1 = document.getElementById("value2");
  
// var timerMy = setInterval(function(){
//   cnt++;
//   obj1.innerHTML = cnt;

//   if(cnt == score){
//     clearInterval(timerMy);
//   }
  
// },20
// );
//  }

//  foo()

setTimeout(() => {
	$('.ciruclito-svg').css('stroke-dashoffset', score_left)
}, 250);


});
</script>

</html>