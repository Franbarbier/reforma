<?php
session_start();

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

	<title>Reforma | Modificando tu manera de viajar</title>
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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/arrendamiento.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/arrendamientoMob.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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


<header>
	<div>
		<div>
			<img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
		</div>
		<div>
			<h1>Arrendamiento con Reforma.</h1>
			<h2>Reforma firma distintos tipos de contratos de arrendamiento que se adapten mas a las necesitades de cada propietario.</h2>
			<button>CONTACTANOS</button>
		</div>
	</div>
</header>

<main>
	<div class="cont90">
		<div id="porque-reforma">
				<h3>Porque arrendar con Reforma?</h3>
				<p>Reforma cuenta con todos los requisitos para facilitar y agilizar la gestion de alquileres a los propietarios. Arrenda tu propiedad sin fechas vacantes, con la tranquilidad de estar respaldado por una aseguradora de renombre y cobrando tus rentas en tiempo y forma.</p>
			<div class="beneficios">
				<hr>
				<h5>SIN VACANTES</h5>
				<p>Elimine propiedades vacantes, perdidas de ingresos, mantenimiento continuo, comisiones de inmobiliarios y costos de rotacion.</p>
			</div>
			<div class="beneficios">
				<hr>
				<h5>CONFIANZA Y SEGURIDAD</h5>
				<p>Cada unidad firmada, cuenta con una cobertura de seguro de $ 8 millones.<br>$ 2 millones de cobertura de responsabilidad de locales.</p>
			</div>
			<div class="beneficios">
				<hr>
				<h5>EN TIEMPO Y FORMA</h5>
				<p>Nos adaptamos a la forma de cobro que mas se adapte a las necesidades de cada propietario. Recibi tu renta en el tiempo pactado todos los meses.</p>
			</div>
		</div>
		<div id="porque-img">
			<img src="https://images.pexels.com/photos/1125130/pexels-photo-1125130.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
		</div>
	</div>
</main>
<section>
	<article>
		<div class="cont90">
			<div id="clientes">
				<div>
					<h6>Nuestros clientes...</h6>
					<p>Contamos con un sistema de antecedentes y prevencion de fraude para examinar a cada cliente que se hospeda en nuestras propiedades.</p>
					<p>Oficina local con atencion al cliente 24/7.</p>
					<p>Toma de medidas inmediatas y desicivas cuando se rompen las reglas de la casa.</p>
					<button>CONTACTO</button>
				</div>
			</div>
			<div id="clientes-img">
				<div>
					<div>
						<img src="https://images.pexels.com/photos/2897883/pexels-photo-2897883.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Empresas</p>
				</div>
				<div>
					<div>
						<img src="https://images.pexels.com/photos/1648396/pexels-photo-1648396.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Familias</p>
				</div>
				<div>
					<div>
						<img src="https://images.pexels.com/photos/5225257/pexels-photo-5225257.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Turistas</p>
				</div>
				<div>
					<div>
						<img src="https://images.pexels.com/photos/1438072/pexels-photo-1438072.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Estudiantes</p>
				</div>
				<div>
					<div>
						<img src="https://images.pexels.com/photos/4050296/pexels-photo-4050296.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Freelancers</p>
				</div>
				<div>
					<div>
						<img src="https://images.pexels.com/photos/1267697/pexels-photo-1267697.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
					</div>
					<p>Millenials</p>
				</div>
			</div>
		</div>
	</article>
	<article>
		<div class="cont90">
			<div id="logo-cont">

				<div>
					<img src="imgs/logo-chico.svg" alt="">
					<h4>Reforma</h4>		
				</div>
				<p>Estamos constantemente en busqueda de nuevas propiedades para llevar la experiencia que ofrecemos desde Reforma a mas personas del mundo...</p>
				<a href = "mailto: administracion@reformastays.com"><button>CONTACTO</button></a>
				<span>administracion@reformastays.com</span>
			</div>
		</div>
	</article>
</section>


<?php include 'footer.php'; ?>

</body>


<script>

$( document ).ready( function(){
	



// clearInterval(interval); // thanks @Luca D'Amico

window.addEventListener('click', function(e){   
  if (document.getElementById('select-city-nav').contains(e.target)){
	  if( $('#ciudades-nav').css('display') == "none" ){
		$('#ciudades-nav').slideDown(125)
	  }
  } else{
		$('#ciudades-nav').slideUp(125)
  }
});
$('#ciudades-nav li').click(function () {
	$('#select-city-nav p').text( $(this).text() )
	$('#select-city-nav p').css('color','#272727')
	$('#ciudades-nav').slideUp(125)
	// Agregamos la ciudad seleccionada al input hidden ciudad
	$('#ciudad-nav').val($(this).html())
})
// SI SCROLLEAN
$(window).scroll(function () {

let bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
let top_of_screen = $(window).scrollTop();

if (top_of_screen > 200) {
	// console.log(top_of_screen)
	$('nav').css('background-image', ' linear-gradient( #fafafa 100%, transparent 0%)')
	$('#select-city-nav').fadeIn(200)
	if ($(window).width() > 800) {
		$('#select-city-nav').css('display', 'flex')
	}
} else {
	$('nav').css('background-image', ' linear-gradient( #fafafa 0%, transparent 0%)')
	$('#select-city-nav').fadeOut(200)
}

}); // termina el F() scroll


// Funcion que inyecta las ciudades disponibles a partir de la base de datos
function init_localidades() {

fetch('php/api/globales.php?func=verLocalidades')
	.then(function (response) {
		return response.json();
	})
	.then(function (localidades) {
		console.log(localidades);

		// Inicializamos las localidades en el desplegable
		var html = ''
		for(l in localidades){
			var loc = localidades[l]
			html += '<li>'+loc.nombre+'</li>'
		}

		$('#ciudades-nav ul').append(html)
		$('#ciudades ul').append(html)

	});

}

init_localidades()

// Handler para cuando cliquean alguna ciudad de #ciudades-nav
$(document).on("click", "#ciudades-nav ul li", function(){
	$('#f-ciudad-nav').html($(this).html())
	$('#ciudades-nav').slideUp(100)
})

$(document).on("click", "#select-city-nav button", function(e){
	e.preventDefault()
	e.stopPropagation()
	if($('#f-ciudad-nav').html()!='Seleccione una ciudad'){
		window.location = 'explorar.php?ciudad='+$('#f-ciudad-nav').html() + '&check_in=&check_out=&huespedes=1'
	}
})


});
</script>

</html>