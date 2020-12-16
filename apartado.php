<?php

session_start();

$check_in = 'Check-In';
$check_out = 'Check-Out';
if(isset($_GET['check_in'])){
    $check_in = $_GET['check_in'];
}
if(isset($_GET['check_out'])){
    $check_out = $_GET['check_out'];
}

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


    <!-- Libreria de Calendario -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/css/datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/js/datepicker-full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/js/DateRangePicker.min.js"></script> -->



	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/apartado.css" />
    <link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/apartadoMob.css" />
	<link rel="stylesheet" type="text/css" media="(min-width: 1450px)" href="css/megawidth.css" />
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <link rel="preload" href="https://assets.sonder.com/packs/media/Sonder-Icons/icons-720172e6.woff2" type="font/woff2" as="font" crossorigin="crossorigin"></link> -->
    <link rel="preload" href="icons-720172e6.woff2" type="font/woff2" as="font" crossorigin="crossorigin"></link>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>


<nav>
    <input type="hidden" value="<?php echo $logeado ?>" id="logeado">
    <input type="hidden" id="id_propiedad">
	<div class="cont90">
		<div>

			<div>

                <a href="/">
                    <img src="imgs/logo-chico.svg" alt="logo reforma alquiler de hospedajes premium">
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

<div id="galeria-great-cont">
    <div id="cont-carousel">
        <!-- <div id="primeras-tres">
            <div>
                <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/b7d28049-7fcf-46c9-a9da-5a0dc13a279c.jpg" alt="">
            </div>
            <div>
                <img src="https://a0.muscache.com/im/pictures/2d6c1d7a-e1ed-4e53-a2d4-ba0d2a3c79f9.jpg" alt="">
            </div>

            <aside class="left">
                <img src="https://image.flaticon.com/icons/svg/860/860790.svg" alt="">
            </aside>
            <aside class="right">
                <img src="https://image.flaticon.com/icons/svg/860/860790.svg" alt="">
            </aside>
        </div> -->
        

    </div>
</div>

<section class="cont90">
    <div class="contG">
        <main>
            <h1></h1>
            <div>
                <img src="imgs/location-brown.svg" alt=""><h3 id="localidad-provincia"></h3>
            </div>
            <div id="opciones">
                <div id="share">
                    <img src="imgs/share.png"> <p>Compartir</p>
                </div>
                <div id="save">
                    <img src="imgs/fav.png">
                    <p>Guardar</p>
                </div>
            </div>
            <div id="capacidad">
                <div>
                    <img src="imgs/users-handmade.svg" alt="">
                    <h5><span class="huespedes"></span> Huespedes</h5>
                </div>
                <div>
                    <img src="imgs/cama-handmade.svg" alt="">
                    <h5><span class="dormitorios"></span> Dormitorios</h5>
                </div>
                <div>
                    <img src="imgs/ducha-handmade.svg" alt="">
                    <h5><span class="banos"></span></h5>
                </div>
            </div>
        </main>

        <div id="artist-cont">
            <div>
                <div>
                    <img src="" alt="" id="disenador-img">
                </div>
                <div>
                    <h6>Diseñador: <span id="disenador-nombre">Andrew Warhola</span></h6>
                    <p id="disenador-descripcion">Andrew Warhola (Pittsburgh; 6 de agosto de 1928 - Nueva York; 22 de febrero de 1987), comúnmente conocido como Andy Warhol, fue un artista plástico y cineasta estadounidense que desempeñó un papel crucial en el nacimiento y desarrollo del pop art. Tras una exitosa carrera como ilustrador profesional, Warhol adquirió fama mundial por su trabajo en pintura, cine de vanguardia y literatura, notoriedad que vino respaldada por una hábil relación con los medios y por su rol como gurú de la modernidad. Warhol actuó como enlace entre artistas e intelectuales, pero también entre aristócratas, homosexuales, celebridades de Hollywood, drogadictos, modelos, bohemios y pintorescos personajes urbanos.</p>
                </div>
            </div>
            <div  class="ver-mas">
                <h6>Concepto detrás del espacio</h6>
                <p id="concepto-text">La composición es el planeamiento del arte, la colocación o el arreglo de elementos o de ingredientes en un trabajo de arte, o la selección y la colocación de elementos del diseño según principios del diseño dentro del trabajo. Contribuye a una respuesta del espectador; la obra de arte se considera dentro de lo estético (que satisface al ojo), si los elementos dentro del trabajo se ordenan en una composición equilibrada (Dunstan, 1979).1 No obstante, existen artistas que prefieren romper las reglas de la composición tradicional, desafiando a los espectadores a reconsiderar las nociones de equilibrio, y a diseñar elementos dentro de trabajos de arte, por ejemplo los como Salvador Dali. También puede ser pensado como la organización de los elementos del arte de acuerdo a los principios del arte. El término composición significa básicamente “organizar”. Cualquier obra de arte, de la música a la escritura, se arregla o se compone junto con el pensamiento consciente. Los diversos elementos en el total del diseño se relacionan generalmente entre sí.</p>
            </div>
        </div>

        <div id="camas">
            <h4>Distribución de camas</h4>
            <div id="distribucion_de_camas">
               
            </div>
        </div>

        <div id="features">
            <h4>Servicios</h4>
            <div>
                <ul id="amenities-list">
                    
                </ul>
            </div>
        </div>

        <div id="seccion-calendar">
            <h4>Selecciona la fecha de llegada</h4>
            <p>Podés ver el precio final y la disponibilidad seleccionando la fecha de llegada y de partida de tu hospedaje.</p>
            <div>
                <div id="calendar-cont">
                    <?php include 'calendar.php' ?>
                </div>
            </div>
        </div>

    </div>
    <div class="contC">
            <button>Comprobar disponibilidad</button>
        <div id="sticky-price">
            <span><strong>$<span id="tarifa"></span></strong> por noche</span>
            <h3 id="nombre-propiedad2">Nombre del Hospedaje</h3>
            <div>
                <img src="imgs/location-brown.svg" alt="">
                <p id="localidad-provincia2"></p>
            </div>
            <span><span class="huespedes"></span> huéspedes · <span class="dormitorios"></span> dormitorios · <span class="camas"></span> · <span class="banos"></span></span>
            
            <!-- <div class="info-box" id="sticky-calendar">
                <div>
                    <img src="imgs/calendar.svg" alt="">
                </div>
                <div>
                    <div id="checkin">
                        <?php //echo $check_in ?>
                    </div>
                    <div class="flechin">
                        <img src="imgs/left-arrow.png" alt="">
                    </div>
                    <div id="checkout">
                        <?php //echo $check_out ?>
                    </div>
                </div>
            </div> -->
            <div class="info-box" id="sticky-calendar">
                <div>
                    <img src="imgs/calendar.svg" alt="">
                </div>
                <div style="position: relative;">
                    <?php include 'calendarDesplegableApartado.php'; ?>
                </div>
            </div>
            <div class="info-box" id="sticky-huespedes">
                <div>
                    <img src="imgs/coin.svg" alt="">
                </div>
                <div id="precio-final-cont">
                    <div>
                        Precio final
                    </div>
                    <div class="flechin">
                        <img src="imgs/left-arrow.png" alt="">
                    </div>
                    <div id="precio-final">
                        
                    </div>
                    <input type="hidden"  id="precio-final-hidden">
                </div>
            </div>
            <!-- <div class="info-box">
                <div>
                    <img src="imgs/users-handmade.svg" alt="">
                </div>
                <div>
                    Huéspedes
                </div>
            </div> -->
            <div class="info-box">
                <div>
                    <img src="imgs/label.png" alt="">
                </div>
                <div id="descuentos">
                    <p>Descuentos por estadias largas:</p>
                    <ul>
                        <li>20% 14 + noches</li>
                        <li>40% 30 + noches</li>
                    </ul>
                </div>
            </div>
            <button id="sticky-reservar">RESERVAR</button>

        </div>
    </div>
</section>

<section class="cont90Block">
    <article id="ubicacion">
        <h4>Ubicación</h4>
        <div id="map-cont">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.466692245658!2d-58.40094708505265!3d-34.59235856440371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca99dfe77a49%3A0x5026b20ca691a995!2sJuncal%202201%2C%20C1125%20ABC%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1596725075572!5m2!1ses!2sar" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <h4>Recoleta, Buenos Aires - Argentina</h4>
        <p class="ver-mas">La composición es el planeamiento del arte, la colocación o el arreglo de elementos o de ingredientes en un trabajo de arte, o la selección y la colocación de elementos del diseño según principios del diseño dentro del trabajo. Contribuye a una respuesta del espectador; la obra de arte se considera dentro de lo estético (que satisface al ojo), si los elementos dentro del trabajo se ordenan en una composición equilibrada (Dunstan, 1979).1 No obstante, existen artistas que prefieren romper las reglas de la composición tradicional, desafiando a los espectadores a reconsiderar las nociones de equilibrio, y a diseñar elementos dentro de trabajos de arte, por ejemplo los como Salvador Dali. También puede ser pensado como la organización de los elementos del arte de acuerdo a los principios del arte.<br>El término composición significa básicamente “organizar”. Cualquier obra de arte, de la música a la escritura, se arregla o se compone junto con el pensamiento consciente. Los diversos elementos en el total del diseño se relacionan generalmente entre sí. La composición es el planeamiento del arte, la colocación o el arreglo de elementos o de ingredientes en un trabajo de arte, o la selección y la colocación de elementos del diseño según principios del diseño dentro del trabajo. Contribuye a una respuesta del espectador; la obra de arte se considera dentro de lo estético (que satisface al ojo), si los elementos dentro del trabajo se ordenan en una composición equilibrada (Dunstan, 1979).1 No obstante, existen artistas que prefieren romper las reglas de la composición tradicional, desafiando a los espectadores a reconsiderar las nociones de equilibrio, y a diseñar elementos dentro de trabajos de arte.</p>

    </article>
    <article id="mas-info">
        <h4>Qué deberias saber</h4>
        <div>
            <div>
                <h6>Normas de alojamiento</h6>
                <ul>
                    <li>
                        <img src="imgs/checkin.svg" alt="">
                        <span>Check in: Después de las 15:00hs</span>    
                    </li>
                    <li>
                        <img src="imgs/checkout.svg" alt="">
                        <span>Check out: Antes de las 11:00hs</span>
                    </li>
                    <li>
                        <img src="imgs/key.svg" alt="">
                        <span>Self check-in</span>    
                    </li>
                    <li>
                        <img src="imgs/nosmoke.svg" alt="">
                        <span>Prohibido fumar</span>    
                    </li>
                    <li>
                        <img src="imgs/nomeeting.svg" alt="">
                        <span>Prohibido fiestas o eventos</span>
                    </li>
                </ul>
            </div>
            <div>
                <h6>Seguridad</h6>
                <ul>
                    <li>
                        <img src="imgs/alarm.svg" alt="">
                        <span>Alarma de Monoxido de Carbono</span>    
                    </li>
                    <li>
                        <img src="imgs/alarm.svg" alt="">
                        <span>Alarma de humo</span>    
                    </li>
                    <li>
                        <img src="imgs/extintor.svg" alt="">
                        <span>Extintor de fuego</span>    
                    </li>
                </ul>
            </div>
            <div>
                <h6>Politicas de cancelación</h6>
                <ul>
                    <li>
                        <img src="imgs/prohibido.svg" alt="">
                        <span>Cancelación gratis durante 48hs</span>    
                    </li>
                    <li>
                        <img src="imgs/prohibido.svg" alt="">
                        <span>Cancelación gratis con 5 días de antelación, menos el cargo por el servicio.</span>    
                    </li>
                </ul>
            </div>
        </div>
    </article>
    <article id="reseñas">
        <h4>Ultimas reseñas</h4>
        <div id="resenas-cont">
            
            <!-- <div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div>
                        <p><b>Nicolas Brown</b></p>
                        <span>Junio 2019</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quae consectetur sequi distinctio quia neque consequatur eos maxime sint?</p>
            </div>
            <div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div>
                        <p><b>Nicolas Brown</b></p>
                        <span>Junio 2019</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quae consectetur sequi distinctio quia neque consequatur eos maxime sint?</p>
            </div>
            <div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div>
                        <p><b>Nicolas Brown</b></p>
                        <span>Junio 2019</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quae consectetur sequi distinctio quia neque consequatur eos maxime sint?</p>
            </div>
            <div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div>
                        <p><b>Nicolas Brown</b></p>
                        <span>Junio 2019</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quae consectetur sequi distinctio quia neque consequatur eos maxime sint?</p>
            </div> -->

        </div>
        <button>RESERVAR AHORA</button>
    </article>
    <article id="related">
        <h4>Otros alojamientos</h4>
        <div id="otros-alojamientos">

        </div>  
    </article>

</section>


<?php include 'footer.php';?>

<div id="galeria-expanded-cont" class="noaparece">
    <aside><img src="imgs/letter-x.svg" alt=""></aside>
    <div class="carousel" data-flickity='{ "groupCells": 1 }'>

    </div>
</div>

</body>

<script src="js/apartado.js"></script>
<script>

const logeado = $('#logeado').val()

$(document).ready(function(){

$('body').append(comp_main_modal())


$('#mas').click(function () {
	$('#cantidad-huespedes input').val( parseInt($('#cantidad-huespedes input').val()) + 1 )
})
$('#menos').click(function () {
	if ($('#cantidad-huespedes input').val() > 1) {
		$('#cantidad-huespedes input').val( parseInt($('#cantidad-huespedes input').val()) - 1 )
		
	}
})


let servicios = {
    'Cocina completa': 'imgs/icons/kitchen.svg',
    'Lavadora': 'imgs/icons/lavanderia.svg',
    'Secadora': 'imgs/icons/secador.svg',
    'Ascensor': 'imgs/icons/ascensor.svg',
    'Calefaccion': 'imgs/icons/heater.svg',
    'Aire Acondicionado': 'imgs/icons/air-conditioner.svg',
    'Bañera': 'imgs/icons/bath.svg',
    'Smart TV': 'imgs/icons/smart-tv.svg',
    'Pileta': 'imgs/icons/swimming.svg',
    'Gimnasio': 'imgs/icons/gym.svg',
    'Wifi': 'imgs/icons/wifi.svg',
    'Espacio para estudio/trabajo': 'imgs/icons/work-space.svg',
    'Aparcamiento gratuito en la calle':'imgs/icons/parking.svg',
    'Aparcamiento de pago fuera de las instalaciones':'imgs/icons/barrier.svg'
}


Object.entries(servicios).forEach(([key, value]) => $('#features ul').append('<li><img src="'+ value +'" alt=""><p>'+ key +'</p></li>') )

// $('#features ul').append('<li><img src="'+ servicios +'" alt=""><p>'+ features +'</p></li>')




$('#precio-final').click(function(){
    $('#descripcion-precio').slideToggle(150)
    $('#precio-final>img').toggleClass('rotation')
})



// para celu
if ($(window).width() < 800) {


$('.contC>button').click(function () {

    if ( $('.contC>button').text() == "Comprobar disponibilidad") {
        $('.contC').css({'transform':"translateY(0%)"})
        $('.contC>button').text('Cerrar')
    }else{
        $('.contC').css({'transform':"translateY(87%)"})
        $('.contC>button').text('Comprobar disponibilidad')
    }
})    

$('.ver-mas').each(function(){
    $(this).append('<aside>LEER MAS</aside>')
    // $(this).append('<aside>LEER MAS</aside>')

})

$( ".ver-mas" ).delegate( "aside", "click", function() {
  $( this ).parent().css({'height':'fit-content'})
  $( this ).remove();
// //   .css({'height':'fit-content'})
//     console.log(padresin)

});


}
// para desk
else {
} //termina JS para desk

})

// Calculando el precio final a partir de las fechas de checkin y checkout
function tarifa_final(){

console.log('function tarifa_final')

var checkin = $('#checkin input').val()
var checkout = $('#checkout input').val()

checkin = checkin.replace(/\//g,'-')
checkout = checkout.replace(/\//g,'-')

// Convirtiendo el d-m-y a Y-m-d
var checkin = checkin.split("-").reverse().join("-");
var checkout = checkout.split("-").reverse().join("-");

console.log('checkinn ', checkin, ' checkout ', checkout)

if(!checkin.includes('Check') && !checkout.includes('Check')){
    console.log('Calculamos las fechas')
    
    var day_in_milli = 86400 * 1000
    checkin = new Date(checkin)
    checkout = new Date(checkout)
    console.log('created checkin checkout: ', checkin, checkout)
    var days_to_stay = Math.abs(checkout - checkin);
    days_to_stay = days_to_stay / day_in_milli

    console.log('Days to stay: ', days_to_stay)
    
    var tarifa = $('#tarifa').html()
    console.log('tarifa: '+ tarifa)

    var tarifa_final = tarifa * days_to_stay

    console.log('Precio final: ', tarifa_final)

    if(isNaN(tarifa_final)){
        console.log('not a number')
        tarifa_final = ""
    }

    $('#precio-final').html('$'+tarifa_final)
    $('#precio-final-hidden').val(tarifa_final)

}else{
    console.log('Se debe introducir una fecha de checkin y checkout')
}

}



$(window).scroll(function() {   
    $('body>.lightpick').css({'top':  $("#sticky-calendar").offset().top + $("#sticky-calendar").innerHeight() + 'px'})
});

$('#save').click(function() {
    favear($(this));

    if($(this).find('img').hasClass('fav')){
        action = 'add'
    }else{
        action = 'delete'
    }

    var id_favorito = $('#id_propiedad').val()

    anadirFavorito(id_favorito, action)



})

// Cuando cliquean en reservar
$(document).on('click', '#sticky-reservar', function(){

    console.log('holu!')

    // Nos fijamos si esta logeado
    if(logeado=='no'){

        // Si no está logeado, le abrimos el modal para logearse
    
    }else if(logeado=='si'){

        // Si está logeado, nos fijamos si tiene seteada una fecha
        if($('#checkin input').val()=='' || $('#checkout input').val()==''){
            console.log('checkin o checkout vacios')
            $('#sticky-calendar').css('border', '2px solid #d4bfaa')
            render_modal('Campos incompletos', 'Por favor, introducí una fecha de Check-in y una fecha de Check-out para poder calcular el importe total de tu estadía.')
        }else{

            const importe_total = $('#precio-final-hidden').val() 
            console.log('importe total: ', importe_total)

            const checkin = $('#checkin input').val()
            const checkout = $('#checkout input').val()

            // Lo llevamos al checkout pasando los parametros checkin, checkout y precio final
            fetch('init_checkout.php?importe_total=' + importe_total + '&checkin=' + checkin + '&checkout=' + checkout + '&id_propiedad='+id_propiedad)
            .then(function (response) {
                return response.json();
            })
            .then(function (res) {
                console.log(res)

                if(res.error==0){
                    console.log('redirigir')
                    window.location.replace("checkout.php");

                }

            });


        }
        
    }




})

</script>
</html>