<?php

session_start();

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['id_user'])){
	$logeado = 'si';
}

if(isset($_GET['logout'])){
	session_destroy();
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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/home.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/homeMobile.css?refrescate=1" />
    
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
<main>
	<div>
		<img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="alquiler de departamentos premium">
		<aside>
			<a href="#seccion-destinos">
				<img src="imgs/down-arrow.svg" alt="">
			</a>
		</aside>
	</div>
	<header>
		<hgroup>
			<h1>Reforma</h1>
			<h2>Modificando tu manera de viajar.</h2>
		</hgroup>
		<form action="">
			<div id="select-city">
				<label for="">
					<img src="imgs/location.svg" alt="ubicacion alquiler departamentos">
				</label>
				<!-- <input id="select-city" class="inputs" placeholder="Ciudad" disabled type="text"> -->
				<p class="inputs">Ciudad</p>
				<div id="ciudades">
					<ul>

					</ul>
				</div>
				<input type="hidden" id="ciudad">
			</div>
			
			<div>
				<?php include 'calendar-index.php'; ?>
			</div>
			<div>
				<label for="">
					<img src="imgs/huespedes-black.svg" alt="">
				</label>
				<img id="menos" src="imgs/minus.svg" alt="">
				<input id="huespedes" class="inputs" min="1" value="1" type="number">
				<img id="mas" src="imgs/more.svg" alt="">

			</div>
			<input type="submit" class="explore" value="EXPLORAR" id="explorar">
		</form>
	</header>

</main>

<section>
	<article id="seccion-destinos">
		<div class="cont90">
			<div class="contC">
				<header>
					<h3>Elegimos destinos que nos inspiran.</h3>
					<button>EXPLORAR DESTINOS</button>
				</header>
			</div>
			<div class="contG">
				<div id="destinos">
					<figure data-city="Buenos Aires">
						<div>
							<img src="imgs/destino-bsas.jpg" alt="alojamientos en Buenos Bires">
							<aside></aside>
						</div>
						<figcaption>Buenos Aires</figcaption>
					</figure>
					<figure data-city="San Antonio de Areco">
						<div>
							<img src="imgs/destino-areco.jpg" alt="alojamientos en Areco">
							<aside></aside>
						</div>
						<figcaption>San Antonio de Areco</figcaption>
					</figure>
					<figure data-city="Bariloche">
						<div>
							<img src="imgs/destino-bariloche.webp" alt="alojamientos en Bariloche">
							<aside></aside>
						</div>
						<figcaption>Bariloche</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</article>
	<article id="seccion-testimonios">
		<div class="cont90">
			<div class="contG">
				<div id="caritas-cont"> 
					<!-- <div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div> -->
				</div>
				<div id="quote-cont">
					<!-- <div>
						<span>‘‘</span>
						<div id="quote">
							<h6>Cuidan cada detalle, desde la atención hasta el orden y la prolijidad de la casa.</h6>
						</div>
						<div id="data-autor">
							<figure>
								<img src="imgs/user-marron.png" alt="">
								<figcaption>Emmet Brown</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-marron.png" alt="">
								<figcaption>Dirección 1234, Localidad - País</figcaption>
							</figure>
						</div>
					</div>	 -->
					<?php include 'testimonios.php'; ?>
				</div>

			</div>
			<div class="contC">
				<header>
					<h3>Hablan por ellos mismos.</h3>
					<button><a href="#seccion-amenities">VER AMINITIES</a></button>
				</header>
			</div>
		</div>
	</article>
	<article id="seccion-amenities">
		
		<div class="cont90">
			<div class="contC">
				<header>
					<h3>Si salís de casa, que sea a un hogar.</h3>
					<button>VER MAS AMENITIES</button>
				</header>
			</div>
			<div class="contG">
				<div id="amenities">
					<div class="row1">
						<div>
							<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
						</div>
						<p>Auto Check-in</p>
					</div>
					<div class="row1">
						<div>
							<img src="imgs/LimpiezaProfesional.jpg" alt="">
						</div>
						<p>Limpieza profesional</p>
					</div>
					<div class="row1">
						<div>
							<img src="imgs/ServicioWiFi.jpg" alt="">
						</div>
						<p>Wifi de alta velocidad</p>
					</div>
					<div class="row2">
						<div>
							<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
						</div>
						<p>Cocina totalmente equipada</p>
					</div>
					<div class="row2">
						<div>
							<img src="imgs/Toallas.jpg" alt="">
						</div>
						<p>Toallas frescas</p>
					</div>
					<div class="row2">
						<div>
							<img src="imgs/LimpiezaProfesional.jpg" alt="">
						</div>
						<p>Lavandería</p>
					</div>
					<!-- <div id="hide-amenities"> -->
					<div class="row3">
						<div>
							<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
						</div>
						<p>Camas confortables</p>
					</div>
					<div class="row3">
						<div>
							<img src="imgs/Soporte.jpg" alt="">
						</div>
						<p>Soporte 24/7</p>
					</div>
						<div class="row3">
							<div>
								<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
							</div>
							<p>Cafe artesanal</p>
						</div>
						<div class="row4">
							<div>
								<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
							</div>
							<p>Amenities de baño</p>
						</div>
						<div class="row4">
							<div>
								<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
							</div>
							<p>Guías locales</p>
						</div>
						<div class="row4">
							<div>
								<img src="https://images.sonder.com/image/upload/q_auto,f_auto,c_scale,dpr_auto,w_400,h_400/v1566420631/catalina/standards/check-in.jpg" alt="">
							</div>
							<p>Kit de bienvenida</p>
						</div>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</article>
	<article id="seccion-definicion">
		<div>
			<div>
				<img src="imgs/logo-chico.svg" alt="">
				<h2>Reforma</h2>
			</div>
			<div id="definicion-cont">
				<p>reformar</p>
				<span>[rre · for · <b>mar</b> ]</span> <span><i>verbo transitivo</i></span>
				<p>1. Hacer modificaciones en <span id="typing">una cosa con el fin de mejorarla.</span></p>
			</div>
		</div>
	</article>
	<article id="seccion-frases">
		<div>
			<div>
				<img src="https://a0.muscache.com/im/pictures/b7d28049-7fcf-46c9-a9da-5a0dc13a279c.jpg?im_w=1200" alt="alquileres hospedaje en Argentina">
			</div>
			<header>
				<span>‘‘</span>
				<div class="text-roll">
					<div class="text-roll-mask-wrapper">
						<!--  main part    -->
						<div class="text-roll-mask">
							<div class="texts">
								<div class="text-wrapper">
									<div class="text">
										<h5>Modificamos la forma de viajar, reformando los espacios.</h5>
										<div>
											<p>- Pedro Grampa</p>
											<i>Fundador y CEO</i>
										</div>
									</div>
								</div>
								<div class="text-wrapper">
									<div class="text">
										<!-- <span>‘‘</span> -->
										<h5>Somos un grupo de arquitectos, artistas y disedores que entiende como crear el espacio ideal para habitar.</h5>
										<div>
											<p>- Francisco Moro</p>
											<i>Arquitecto de Reforma</i>
										</div>
									</div>
								</div>
								<div class="text-wrapper">
									<div class="text">
										<!-- <span>‘‘</span> -->
										<h5>Nos reinventamos con tal de no adaptarnos.</h5>
										<div>
											<p>- Cristian A. Gil</p>
											<i>Analista de proyectos</i>
										</div>
									</div>
								</div>
								<div class="text-wrapper">
									<div class="text">
										<!-- <span>‘‘</span> -->
										<h5>Reforma te da la posibilidad de viajar al corazon de cada ciudad, modificando la experiencia del viajero mediante el diseño y el servicio.</h5>
										<div>
											<p>- Ramiro Fregonese</p>
											<i>Analista de marketing</i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
	</article>
</section>
<section id="seccion-proceso">
	<h2>Nuestro proceso para reformar.</h2>
	<article id="paso1">
		<header>
			<span>01.</span>
			<h4>Estudiamos la ciudad y el barrio.</h4>
			<p>Estamos constantemente en la búsqueda de nuevos vecindarios que despierten nuestra inspiración y curiosidad para ofrecerlos a nuestros clientes. Los caminamos, los observamos y una vez que los entendemos decidimos donde ubicarnos.</p>
		</header>
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
	</article>
	<article id="paso2">
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
		<header>
			<span>02.</span>
			<h4>Conocemos el inmueble.</h4>
			<p>Contamos con un grupo especializado en busqueda de inmbueles con potencial para habitarlos dentro de cada vecindario. Nuevos espacios que cumplan con nuestros requisitos y despierten nuestra inspiracion para reformarlos.</p>
		</header>
	</article>
	<article id="paso3">
		<header>
			<span>03.</span>
			<h4>Encontramos el diseñador ideal para cada espacio.</h4>
			<p>Buscamos los mejores y mas apasionados diseñadores y artistas del vecindario. Nos aseguramos que los mismos conozcan su barrio como la palma de su mano. Asi es como cada propiedad llega a ser un fiel reflejo de su entorno.</p>
		</header>
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
	</article>
	<article id="paso4">
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
		<header>
			<span>04.</span>
			<h4>Comenzamos el proceso de diseño junto al artista.</h4>
			<p>Acompañamos a cada artista en el proceso de diseño del espacio para asegurarnos que los mismos tengan la comodidad de un hogar, ademas de tener el toque y la identidad que cada artista plasma en ellos.</p>
		</header>
	</article>
	<article id="paso5">
		<header>
			<span>05.</span>
			<h4>Experimentamos el espacio habitándolo nosotros mismos.</h4>
			<p>Una vez finalizada la reforma, un integrante del equipo habita en el inmueble el tiempo necesario para asegurarnos de pulir hasta el ultimo detalle previo a la llegada de nuestro primer cliente.</p>
		</header>
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
	</article>
	<article id="paso6">
		<div>
			<!-- <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/1e/6e/82/the-colorful-street.jpg" alt=""> -->
		</div>
		<header>
			<span>06.</span>
			<h4>Lanzamos y esperamos la llegada de nuestros clientes.</h4>
			<p>Luego de un proceso largo, le damos la bienvenida a nuestro primer cliente. Ademas de las comodidades que ofrece el espacio de por si, nos aseguramos de acompañarlo con servicio y soporte 24/7 durante toda su estadia.</p>
		</header>
	</article>
	

	<button>LEER MAS</button>
</section>

<div id="cta-secc">
	<div class="cont90">
		<div class="contG">
			<div>
				<img src="https://a0.muscache.com/im/pictures/58e33f93-3b69-4d91-b0aa-8801b61cd059.jpg" alt="">
			</div>
		</div>
		<div class="contC">
			<header>
				<h3>Conocé tu próximo destino.</h3>
				<button>EXPLORAR DESTINOS</button>
			</header>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

</body>

<script src="js/index.js"></script>
<script>

$( document ).ready( function(){

	$('#explorar').click(function(e){
		e.preventDefault()
		ver_disponibles()
	})


window.addEventListener('click', function(e){   
  if (document.getElementById('select-city').contains(e.target)){
	  if( $('#ciudades').css('display') == "none" ){
	    $('#select-city').css('border-bottom','2px solid #d4bfaa')
		$('#ciudades').slideDown(125)
	  }
  } else{
		$('#ciudades').parents('div').css('border-bottom','2px solid transparent')
		$('#ciudades').slideUp(125)
  }
});

$(document).on("click", "#ciudades li", function(){
	$('#select-city p').text( $(this).text() )
	$('#select-city p').css('color','#272727')

	$(this).parents('div').css('border-bottom','2px solid #fafafa')
	$('#ciudades').slideUp(125)

	// Agregamos la ciudad seleccionada al input hidden ciudad
	$('#ciudad').val($(this).html())
})



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

$('#mas').click(function () {
	$('#huespedes').val( parseInt($('#huespedes').val()) + 1 )
})
$('#menos').click(function () {
	if ($('#huespedes').val() > 1) {
		$('#huespedes').val( parseInt($('#huespedes').val()) - 1 )
		
	}
})



// Scroll cuando cliquean la primer flechita
window.requestAnimationFrame = (function() {
    return  window.requestAnimationFrame       ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame    ||
            window.oRequestAnimationFrame      ||
            window.msRequestAnimationFrame     ||
            function( callback ){
              window.setTimeout(callback, 130 / 30);
            };
  })();
  
  var scrollEngine = function() {
    var amount = 0;
    var scrollInProgess = false;
    var tailOff = 12;
  
    function evaluate (functionName) {
      amount = amount - Math.ceil(amount / tailOff);
      if (amount > 0) {
        requestAnimationFrame(functionName);
      } else {
        scrollInProgess = false;
      }
    }
  
    function scroll(timestamp) {
      window.scrollBy(0, Math.ceil(amount / tailOff));
      evaluate(scroll);
    }
  
    function scrollUp(timestamp) {
      window.scrollBy(0, -Math.ceil(amount / tailOff));
      evaluate(scrollUp);
    }
  
    return {
      setTailoff: function(tailAmount) {
        tailOff = tailAmount;
      },
      scrollToElementById: function(id, offset) {
        if (!scrollInProgess) {
          if (offset === undefined) {
            offset = 0;
          }
          scrollInProgess = true;
          var alreadyScrolled = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
          amount = document.getElementById(id).offsetTop - alreadyScrolled;
          amount = amount - offset;
          if (amount >= 0) {
            requestAnimationFrame(scroll);
          } else {
            amount = -amount;
            requestAnimationFrame(scrollUp);
          }
        }
      }
    };
  }();
  function handleClick(e) {
    e.preventDefault();
    var idSplit = this.getAttribute('href').split('#');
    if (idSplit.length > 1) {
      scrollEngine.scrollToElementById(idSplit[1], 0);
    }
  }
  
  var links = document.querySelectorAll('[href^=\'#\']');
  var limit = links.length;
  for (var n = 0; n < limit; n++) {
    links[n].addEventListener('click', handleClick);
  }
  //termin el scroll on click




// para celu
if ($(window).width() < 800) {

setTimeout(() => {
	$('main h1, main h2, main form').css({'opacity':'1', 'transform':'translateX(0%)'})
	
	setTimeout(() => {
		$('main>div').css({'opacity':'1'})
	}, 1200);

}, 500);



let amenities_header = $("#seccion-amenities header").offset().top + $("#seccion-amenities header").outerHeight();
let destinos_bottom = $("#seccion-destinos header").offset().top + $("#seccion-destinos header").outerHeight() ;

// SI SCROLLEAN en mob
$(window).scroll( function(){
    
    let bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    let top_of_screen = $(window).scrollTop();   
	// console.log(bottom_of_screen)
	if (destinos_bottom + 200 < bottom_of_screen) {
		$('#destinos > figure').css({'transform':'translateX(0%)','opacity':'1'})
	}
	if (amenities_header +150 < bottom_of_screen) {
		$('.row1, .row2').css({'transform':'translateY(0%)','opacity':'1'})
	}


}); // termina el F() scroll


}


// para desk
else {

	$('main').css({'background':'#fafafa'})

setTimeout(() => {

	
	setTimeout(() => {
		$('main>div').css({'background-size':'100% 100%'})
		
		$('main h1, main h2').css({'opacity':'1', 'transform':'translateY(0%)'})
		setTimeout(() => {
			$('main>div').css({'width':'60%'})
			setTimeout(() => {
				$('main form').css({'opacity':'1', 'transform':'translateY(0%)'})
			}, 700);
		}, 1200);

	}, 500);

}, 500);



let destinos_top = $("#seccion-destinos").offset().top ;
let destinos_bottom = $("#seccion-destinos").offset().top + $("#seccion-destinos").outerHeight() ;
let amenities_header = $("#seccion-amenities header").offset().top + $("#seccion-amenities header").outerHeight();


// SI SCROLLEAN en desk
$(window).scroll( function(){
    
    let bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    let top_of_screen = $(window).scrollTop();   
	// console.log(bottom_of_screen)
	// console.log(bottom_of_screen)
	
    if (destinos_bottom - 200 < bottom_of_screen) {
		$('#destinos > figure').css({'transform':'translateX(0%)','opacity':'1'})
	}
	if (amenities_header +150 < bottom_of_screen) {
		$('.row1, .row2').css({'transform':'translateY(0%)','opacity':'1'})
	}


}); // termina el F() scroll



} //termina JS para desk


$('#seccion-amenities button').click( function () {
	$('.row3,.row4').css('display','block')
	setTimeout(() => {
		$('.row3, .row4').css({'transform':'translateY(0%)','opacity':'1'})
		
	}, 100);
	$(this).remove()
})

$('#seccion-proceso button').click( function(){
	$('#paso3, #paso4, #paso5, #paso6').slideDown(150)
	$('#paso3, #paso4, #paso5, #paso6').css({'display':'flex'})
	$(this).remove()
	$('html, body').animate({
    	scrollTop: $("#paso2").offset().top
    }, 1500);

})




// efecto typing portada
// get the element
const text = document.querySelector('#typing');



// make a words array

const words = [

  "una cosa con el fin de mejorarla.",

  "el espacio.",

  "la experiencia.",

  "la manera de viajar."

];


// start typing effect

setTyper(text, words);



function setTyper(element, words) {



  const LETTER_TYPE_DELAY = 75;

  const WORD_STAY_DELAY = 1800;



  const DIRECTION_FORWARDS = 0;

  const DIRECTION_BACKWARDS = 1;



  var direction = DIRECTION_FORWARDS;

  var wordIndex = 0;

  var letterIndex = 0;



  var wordTypeInterval;



  startTyping();



  function startTyping() {

    wordTypeInterval = setInterval(typeLetter, LETTER_TYPE_DELAY);

  }



  function typeLetter() {

    const word = words[wordIndex];



    if (direction == DIRECTION_FORWARDS) {

      letterIndex++;



      if (letterIndex == word.length) {

        direction = DIRECTION_BACKWARDS;

        clearInterval(wordTypeInterval);

        setTimeout(startTyping, WORD_STAY_DELAY);

      }



    } else if (direction == DIRECTION_BACKWARDS) {

      letterIndex--;



      if (letterIndex == 0) {

        nextWord();

      }

    }



    const textToType = word.substring(0, letterIndex);



    element.textContent = textToType;

  }



  function nextWord() {



    letterIndex = 0;

    direction = DIRECTION_FORWARDS;

    wordIndex++;



    if (wordIndex == words.length) {

      wordIndex = 0;

    }



  }

}


// Handler para hacer cliqueables los cuadrados de las ciudades
$('figure').click(function(){
	city = $(this).attr('data-city')
	window.location = 'explorar.php?ciudad=' + city + '&check_in=&check_out=&huespedes=1'
})


// roller text quotes
console.clear();
var texts = $('.text-roll-mask .text');
var indexText = -1;
var preIndexText;
var rollTextTimer;
var rollText = function() {
  if (indexText == -1 || indexText == texts.length-1 ) {
    indexText = 0;
    preIndexText = texts.length-1;
  } else {
    preIndexText = indexText;
    ++indexText;
  }
  
  texts.removeClass('rol');
  texts.parent()
    .removeClass('rol-active')
    .removeClass('rol-pre');
  
  texts.eq(indexText).addClass('rol');
  texts.eq(indexText).parent().addClass('rol-active');
  texts.eq(preIndexText).parent().addClass('rol-pre');
  
  var h = $('.text-roll-mask .rol').height();
  $('.text-roll-mask').css('height', h + 'px');
  rollTextTimer = setTimeout(rollText, 7000);
}
rollText();


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