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
                <!-- Boton para filtros en celu  -->
                <aside><img src="imgs/filter.svg" alt=""><div>FILTROS</div></aside>

                <?php include 'filtros.php'; ?>
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
            <aside id="ver-mapa">VER MAPA</aside>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.564358979692!2d-58.39355818505271!3d-34.589888064272934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaa3293e5c59%3A0xb88e1847ae2b3cce!2sAyacucho%201741%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1597668968631!5m2!1ses!2sar" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
            <iframe src="https://snazzymaps.com/embed/255390" width="100%" height="100%" style="border:none;"></iframe>
        </div>
    </article>
</section>


</body>
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
