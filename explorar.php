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

<nav>
	<div class="cont90">
		<div>

			<div>
                <a href="/">
                    <img src="imgs/logo-chico.svg" alt="logo reforma alquiler de hospedajes premium">
                </a>
			</div>
            <ul id="filtros-cont">
                <aside><img src="imgs/filter.svg" alt=""><div>FILTROS</div></aside>
                <div>
                    <li>
                        <img src="imgs/location-brown.svg" alt="">
                        <p id="f-ciudad">Ciudad</p>
                    </li>
                    <li>
                        <div class="checkin">    
                            <img src="imgs/calendar-brown.svg" alt="">
                            <p id="f-check-in">Check-in</p>
                        </div>
                        <div>
                        <img src="imgs/arrow.svg" alt="">
                            <p id="f-check-out">Check-out</p>
                        </div>
                    </li>
                    <li>
                        <img src="imgs/cant-huespedesBrown.svg" alt="">
                        <p>Huespedes</p>
                        <img src="imgs/minusBrown.svg" id="filter-minus" alt="">
                        <input type="number" id="filter-cant-hues" value="1">
                        <img src="imgs/moreBrown.svg" id="filter-more" alt="">

                    </li>
                    <li>
                        <aside>$</aside>
                        <p id="f-precio">Precio</p>
                    </li>
                    <li>
                        <img src="imgs/filters-brown.svg" alt="">
                        <p>Más filtros</p>
                    </li>
                    <li>
                        <img src="imgs/listBrown.svg" alt="">
                        <p>Ordenar Por</p>
                    </li>

                    <button id="aplicar">APLICAR</button>
                </div>
            </ul>
			<div id="menu-cont">
				<div>
					<div id="linea-menu1"></div>
					<div id="linea-menu1"></div>
				</div>
				
			</div>
		</div>
	</div>
</nav>



<section>
    <article>
        <div id="propiedades">
        <a class="propiedad" href="#">
                <div class="foto-cont">
                    <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
                </div>
                <div class="prop-info">
                    <div>
                        <h4>Loft entero en Recoleta</h4>
                        <h2>En el medio del Todo</h2>
                        <hr>
                        <p>2 huéspedes - 1 dormitorio - 1 cama - 1 baño</p>
                        <p>Wifi - Cocina - Calefaccion</p>
                    </div>
                    <div> 
                        <p class="btn-precio"><strong>$95</strong><span>/noche</span></p>
                    </div>
                </div>
            </a>
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

$('#filter-more').click(function () {
	$('#filter-cant-hues').val( parseInt($('#filter-cant-hues').val()) + 1 )
})
$('#filter-minus').click(function () {
	if ($('#filter-cant-hues').val() > 1) {
		$('#filter-cant-hues').val( parseInt($('#filter-cant-hues').val()) - 1 )
		
	}
})


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



});



</script>
</html>
