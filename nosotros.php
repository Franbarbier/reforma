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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/nosotros1.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/nosotrosMob.css" />
    
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
<!-- <header>
		<h5>Somos una empresa de jovenes que trabajan de manera apasionada y profesional, enfocados en brindar un servicio de excelencia.</h5>
    <div class="cont90">
		<div>
        	<h1><div>Porque</div><div>Reforma?</div></h1>
			<div>
				<div>
					<div id="definicion-cont">
						<h5>reformar</h5>
						<span>[rre · for · <b>mar</b> ]</span> <span><i>verbo transitivo</i></span>
						<p>1. Hacer modificaciones en <span id="typing">una cosa con el fin de mejorarla.</span></p>
					</div>
				</div>
			</div>
		</div>
		<main>
			<div>
				<div>
					<p>
					A diferencia del resto de las empresas de la industria del hospedaje y del turismo, el equipo de Reforma no solo está compuesto por emprendedores que entienden como administrar un negocio, sino que además cuentan con un amplio grupo de arquitectos, diseñadores y artistas apasionados por lo que hacen. Los mismos entienden como crear el espacio ideal para habitar y eso marca la direfencia entre una experiencia standard y la experiencia que ofrece Reforma en todos sus alojamientos.</p><p>El equipo primero estudia y analiza el sitio donde está implantado el inmueble, luego se asocia con los mejores arquitectos, artistas y diseñadores del vecindario y en conjunto diseñan no solo el espacio sino que además la experiencia que buscan revivir en cada lugar. La empresa cree que cada espacio tiene una esencia única y buscan sacarla a luz para ponerla al alcance de cada uno de sus clientes mediante este proceso.</p><p>Este fuerte enfoque en el diseño de cada parte del proceso que conforma una experiencia inolvidable son las bases y la filosofía sobre la cual se ha construido Reforma…</p>
				</div>
			</div>
		</main>
    </div>
</header>
<div id="franja-ofi">
</div> -->
<main class="historia hist2">
	<div class="cont90">
		<div>
			<img src="https://images.pexels.com/photos/3184357/pexels-photo-3184357.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
		</div>
		<header>
			<h3>Quienes somos</h3>
			<p>Somos una empresa de jovenes emprendedores que trabajan de manera apasionada y profesional, enfocados en brindar un servicio de excelencia.</p><p>Desde Reforma siempre buscamos salir del esquema tradicional de hospedaje mediante la creacion de espacios con un diseño moderno y minimalista, combinados con la consistencia en el servicio de un hotel de lujo.</p><p>Esto se da gracias al increible grupo de artistas, arquitectos y diseñadores con los que trabajamos dia a dia y al uso eficiente de tecnologia de vanguardia que utilizamos para administrar de manera eficiente todos los procesos involucrados dentro de cada estadia.</p>
		</header>

	</div>
</main>
<div class="historia">
	<div class="cont90">
		<header>
			<h3>Como empezamos</h3>
			<p>El verano de 2017, nuestro fundador Pedro Grampa, para ese entonces estudiante universitario de la carrera de Arquitectura, decidio subarrendar su apartamento en Buenos Aires.</p><p>Impulsado por el deseo de hacer valer y poner a prueba sus habilidades como diseñador de un espacio y una experiencia, paso sus dias recibiendo visitantes de todas partes del mundo con distintas visiones y perspectivas acerca de la experiencia que habian vivido en sus departamentos.</p><p>En este proceso, no solo encontro su verdadera pasion, sino que ademas aprendio y perfecciono la idea de lo que significa “ofrecer una buena experiencia”.</p><p>Con el paso de los meses fue adquiriendo propiedades y formando un grupo de trabajo excepcional, cuya unica mision es brindar una experiencia excepcional a todos las personas que se hospedan en las propiedades Reforma. Hoy, la start up ofrece sus propiedades mediante su propio sitio web, la experiencia esta al alcance de todos…</p>
		</header>
		<div>
			<img src="https://images.pexels.com/photos/2102416/pexels-photo-2102416.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
		</div>
	</div>
</div>
<div class="historia hist2">
	<div class="cont90">
		<div>
			<img src="https://images.pexels.com/photos/3184357/pexels-photo-3184357.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
		</div>
		<header>
			<h3>Hacia donde vamos</h3>
			<p>Desde Reforma siempre buscamos salir del esquema tradicional de hospedaje mediante la creacion de espacios con un diseño excepcional, combinados con la consistencia en el servicio de un hotel de lujo. Esto se da gracias al increible grupo de artistas, arquitectos y diseñadores con los que trabajamos dia a dia y al uso de tecnologia de vanguardia que utilizamos para manejar de manera mas eficientes todos los procesos involucrados en cada estadia.</p>
		</header>
	</div>
</div>

<div id="team">
	<div class="cont90">
		<div>
			<h3>Equipo</h3>
			<p>Conoce a las personas que conforman el equipo de Reforma</p>
			<div>
				<div class="member">
					<div>
						<img src="https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg" alt="">
					</div>
					<h5>Pedro Grampa</h5>
					<p>Fundador y CEO</p>
				</div>
				<div class="member">
					<div>
						<img src="https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg" alt="">
					</div>
					<h5>Francisco Moro</h5>
					<p>Arquitectura y diseño</p>
				</div>
				<div class="member">
					<div>
						<img src="https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg" alt="">
					</div>
					<h5>Cristian Gil</h5>
					<p>Analista de proyectos</p>
				</div>
				<div class="member">
					<div>
						<img src="https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg" alt="">
					</div>
					<h5>Juan Bautista Fernandez</h5>
					<p>Finananzas y Administración</p>
				</div>
				<div class="member">
					<div>
						<img id="frego" src="https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg" alt="">
					</div>
					<h5>Ramiro Fregonese</h5>
					<p>Marketing y Administración</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>

</body>


<script>

$( document ).ready( function(){
	
$('#leer-mas').click(function () {
	$('#mas-info').slideDown(200)
	$(this).remove()
})

const interval = setInterval(function() {
	$('#frego').attr('src','https://instagram.faep8-1.fna.fbcdn.net/v/t51.2885-15/e35/p1080x1080/123148535_221840519503431_1532435149639692857_n.jpg?_nc_ht=instagram.faep8-1.fna.fbcdn.net&_nc_cat=103&_nc_ohc=_zo6XaZlprEAX-_ziJG&tp=19&oh=80373e5149e39e1cde1b640e4271487a&oe=5FCBC724')
	$('#frego').addClass('frego')
	
	setTimeout(() => {
		$('#frego').attr('src','https://aws.glamour.es/prod/designs/v1/assets/620x620/655515.jpeg')
		$('#frego').removeClass('frego')

	   
   }, 100);
 }, 4000);

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