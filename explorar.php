<?php

require 'php/connection.php';
require 'php/models/Propiedades.php';

// Agarramos los posibles filtros de busqueda. 
$ciudad = $_GET['ciudad'];
$huespedes = $_GET['huespedes'];
$check_in = $_GET['check_in'];
$check_out = $_GET['check_out'];

// $propiedades = new Propiedades();
// $disponibles = $propiedades->verDisponibles($ciudad, $huespedes, $check_in, $check_out);
// var_dump($disponibles);

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['access_token'])){
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

	<link rel="icon" href="" type="image/x-icon"/>

	<link rel="shortcut icon" href="" type="image/x-icon"/>

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





	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/explorar.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/explorarMob.css" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- CDN Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8Qo1frNfH6ocqoAIjuiygiTvzwJ8R7tI"></script>

    <link rel="preload" href="icons-720172e6.woff2" type="font/woff2" as="font" crossorigin="crossorigin"></link>

</head>
<body>

<input type="hidden" value="<?php echo $logeado ?>" id="logeado">

<nav>
	<div class="cont90">
		<div>

			<div>
                <a href="/">
                    <img src="imgs/logo-chico.svg" alt="logo reforma alquiler de hospedajes premium">
                </a>
			</div>
            <ul id="filtros-cont">
                <!-- Boton para filtros en celu  -->
                <aside><img src="imgs/filter.svg" alt=""><div>FILTROS</div></aside>
                <?php include 'filtros.php' ?>
            </ul>
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

<section>
    <article>
        <div id="propiedades">
        
        </div>
    </article>
    <article>
        <div id="map-cont">
            <div id="map"></div>
        </div>
    </article>
</section>


</body>
<script src="js/explorar.js"></script>
<script>

$( document ).ready( function(){

// para celu
if ($(window).width() < 800) {


$('#map-cont>#ver-mapa').click(function () {

if ( $('#map-cont>#ver-mapa').text() == "VER MAPA") {
    $('#map-cont').css({'height':"75vh"})
    $('#map-cont>#ver-mapa').text('CERRAR MAPA')
}else{
    $('#map-cont').css({'height':"10vh"})
    $('#map-cont>#ver-mapa').text('VER MAPA')
}
})    



$('#filtros-cont>aside').click(function () {

    if ($('#filtros-cont>aside').css('opacity') == '1') {
        
        $('#filtros-cont>aside').css('opacity','.7')
        $('#filtros-cont>div').slideDown(350)
        $('#filtros-cont li').css({'opacity':'1','transform':'translateX(0)'})
    }else{
        $('#filtros-cont>aside').css('opacity','1')
        $('#filtros-cont>div').slideUp(200)
        $('#filtros-cont li').css({'opacity':'0','transform':'translateX(-10%)'})
    }

})



}
//termina js celu


// Si hoverean sobre una propiedad, se resalta en el mapa
$(document).on("mouseover", ".propiedad", function(){
    $("#map-cont #"+$(this).attr('id')).addClass('hovered')
})
$(document).on("mouseleave", ".propiedad", function(){
    $("#map-cont #"+$(this).attr('id')).removeClass('hovered')
})



});
</script>
</html>
