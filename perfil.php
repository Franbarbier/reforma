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

$pp_img = 'imgs/no-user-pic.jpg';
if($usuario['pp_img']!=''){

	$pp_img = 'php/api/users_pps/'.$usuario['pp_img'];

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
<input type="hidden" value="<?php echo $nivel['next_level_score'] ?>" id="next_level_score">
<input type="hidden" id="id_usuario" value="<?php echo $id ?>">
<input type="hidden" id="numero_nivel" value="<?php echo $nivel['numero'] ?>">

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

<div id="datos-usuario">
	<div>
		<div id="foto-perfil">
			<img src="<?php echo  $pp_img ?>" alt="">
		</div>
		<div>
			<h1>Hola, <span><?php echo $usuario['nombre'] ?></span></h1>
			<ul id="info-perfil">
				<li><?php echo $usuario['mail'] ?></li>
				<li><?php echo $usuario['telefono'] ?></li>
				<li><?php echo $usuario['pais'] ?></li>
			</ul>
		</div>
	</div>
	<div id="opciones">
		<ul>
			<li id="chanhe-pass">
				<a href="cambiar-contrasena.php">
					<img src="imgs/lock.svg" alt=""><span>Cambiar contraseña</span>
				</a>
			</li>
			<li id="admin-config">
				<img src="imgs/configuracion.svg" alt=""><span>Configuración</span>
			</li>
			<li id="salir">
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
					<div class="actual-reserva-row" id="<?php echo $reserva['id'] ?>">
						<div class="foto-prop-cont">
							<img src="imgs/propiedades_imgs/<?php echo $reserva['thumbnail'] ?>" alt="">
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
	<button id="ver-favoritos">VER FAVORITOS</button>

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
				<h4>Beneficios por puntos</h4>
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

var global_nivel;

var global_info_usuario;

var global_paises = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

$( document ).ready( function(){

$('body').append(modal_reserva())

$(document).on('click', '#salir', function(){
	window.location = 'login.php?logout=1'
})

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


function ver_reserva(id) {
	abrir_reserva()
}

setTimeout(() => {
	$('.ciruclito-svg').css('stroke-dashoffset', score_left)
}, 250);


});
</script>

</html>