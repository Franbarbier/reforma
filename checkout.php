<?php

session_start();

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['id_user'])){
	$logeado = 'si';
}

$importe_total = $_SESSION['checkout_importe_total'];

if(isset($_GET['logout'])){
	session_destroy();
}

require 'php/connection.php';
require 'php/models/Usuarios.php';
require 'php/models/Propiedades.php';

$usuarios = new Usuarios($_SESSION['id_user']);
$usuario = $usuarios->verUsuario();

$propiedades = new Propiedades();
$propiedad = $propiedades->verPropiedad($_SESSION['checkout_id_propiedad']);

// var_dump($propiedad);

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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/checkout.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/checkoutMob.css" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<!-- SDK de cliente para PayPal -->
	<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>

</head>

<body>


<nav>
    <input type="hidden" value="<?php echo $logeado ?>" id="logeado">	
    <input type="hidden" value="<?php echo $importe_total ?>" id="importe_total">	
	<div class="cont90">
		<div>

			<div>
				<a href="/">
					<img src="imgs/logo-chico.svg" alt="logo reforma alquile de inmuebles">
				</a>
				<!-- <div id="select-city-nav">
					<p id="f-ciudad-nav">Seleccione una ciudad</p>
					<article>

						<div id="ciudades-nav">
							<ul>
								<li>Todas</li>
							</ul>
						</div>
					</article>
					<button>BUSCAR</button>
				</div> -->
			</div>
			<div id="menu-cont">
				<!-- <div>
					<div id="linea-menu1"></div>
					<div id="linea-menu2"></div>
				</div> -->
				
			</div>
		</div>
	</div>
</nav>
<?php include 'menu.php' ?>



<main>
	<section class="cont90">
		<div class="contG">
			<header>
				<div>
					<div><img class="icons" src="imgs/user.svg" alt=""></div>
					<div id="info-personal-cont">
						<h4>Información personal</h4>
						<div>

							<div class="row-fields">

								<div class="field-cont">
									<div class="info-label">Nombre</div>
									<div class="field-value"><?php echo $usuario['nombre']; ?></div>
								</div>
								
								<div>
									<div class="info-label">Apellido</div>
									<div class="field-value"><?php echo $usuario['apellido']; ?></div>
								</div>

							</div>
							
							<div class="row-fields">

								<div class="field-cont">
									<div class="info-label">Mail</div>
									<div class="field-value"><?php echo $usuario['mail']; ?></div>
								</div>
								
								<div>
									<div class="info-label">Teléfono</div>
									<div class="field-value"><?php echo $usuario['telefono']; ?></div>
								</div>

							</div>

						</div>
					</div>
				</div>
				<div id="tipo-reserva" style="display:none">
					<div><img class="icons" src="imgs/label.png" alt=""></div>
					<div>
						<h4>Elegí la reserva</h4>
						<div>
							<div class="cartas">
								<h5>Nombre de la reserva</h5><h6>$81</h6>
								<ul>
									<li>Beneficio de este tipo de reservas</li>
									<li>Beneficio de este tipo de reservas</li>

								</ul>
							</div>
							<div class="cartas">
								<h5>Nombre de la reserva</h5><h6>$81</h6>
								<ul>
									<li>Beneficio de este tipo de reservas</li>
									<li>Beneficio de este tipo de reservas</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div><img class="icons" src="imgs/credit-card.svg" alt=""></div>
					<div>
						<h4>Finalizá el pago</h4>
						<div>
							<h6 id="pay-info">Te redireccionaremos a PayPal para que finalices tu pago de forma segura. Recordá que puedes utilizar cualquier tarjeta, o dinero en tu cuenta.</h6>
							<!-- <button id="completar-pago">COMPLETAR PAGO</button> -->
							<div id="paypal-button-container"></div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<div class="contC">
				<button>VER DETALLE</button>
				<div id="sticky-price">
					<div>
						<img src="imgs/propiedades_imgs/la-buena-choza-835139.jpg" alt="">
					</div>
					<h3 id="nombre-propiedad2"><?php echo $propiedad['nombre']; ?></h3>
					<div>
						<img src="imgs/location-brown.svg" alt="">
						<p id="localidad-provincia2"><?php echo $propiedad['localidad'] . ', ' . $propiedad['provincia']; ?></p>
					</div>
					<span><span class="huespedes"><?php echo $propiedad['huespedes']; ?></span> huéspedes · <span class="dormitorios"><?php echo $propiedad['num_dormitorios']; ?></span> dormitorios · <span class="camas"><?php echo $propiedad['camas']; ?></span> camas · <span class="banos"><?php echo $propiedad['banos']; ?></span> baños</span>

					<div class="info-box" id="sticky-calendar">
						<div>
							<img src="imgs/calendar.svg" alt="">
						</div>
						<div style="position: relative;">

							<div id="checkin"><?php echo $_SESSION['checkout_checkin'] ?></div>
							<img src="imgs/left-arrow.png" alt="" id="period-arrow">
							<div id="checkout"><?php echo $_SESSION['checkout_checkout'] ?></div>

						</div>
					</div>
					<table>
						<tr>
							<td><span id="por-noche">$114</span><span>x</span><span id="cant-noches">5 noches</span></td>
							<td id="precio-bruto"><?php echo $importe_total ?></td>
						</tr>
						<tr>
							<td><span>Descuento semanal (%10)</span></td>
							<td id="dcto">-57</td>
						</tr>
						<tr>
							<td><span>Tarifa Reforma</td>
							<td id="fee">15</td>
						</tr>
					</table>
					<div id="total-cont">
						<strong>Total</strong>
						<strong id="total"></strong>
					</div>
				</div>
		</div>
	</section>

</main>



<?php include 'footer.php'; ?>

</body>

<script src="js/checkout.js"></script>
<script>

const importe_total = document.getElementById('importe_total').value
console.log('importe total: ', importe_total)

paypal.Buttons({
  createOrder: function(data, actions) {
	// This function sets up the details of the transaction, including the amount and line item details.
	return actions.order.create({
	  purchase_units: [{
		amount: {
		  value: importe_total
		}
	  }]
	});
  },
  onApprove: function(data, actions) {
return actions.order.capture().then(function() {
	console.log('data: ')
	console.log(data)
//   window.location = "paypal-transaction-complete.php?&orderID="+data.orderID;				
});
}
}).render('#paypal-button-container');
//This function displays Smart Payment Buttons on your web page.


$( document ).ready( function(){







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



var bruto = parseFloat($('#precio-bruto').text())
var dcto = parseFloat($('#dcto').text())
var fee = parseFloat($('#fee').text())
var total = parseFloat($('#total').text())
$('#total').text(bruto+dcto+fee)

$('.cartas').click(function(){
	$('.cartas').removeClass('active-carta')
	$(this).addClass('active-carta')
})


$('.contC>button').click(function () {

if ( $('.contC>button').text() == "VER DETALLE") {
	$('.contC').css({'transform':"translateY(0%)"})
	$('.contC>button').text('Cerrar')
}else{
	$('.contC').css({'transform':"translateY(87%)"})
	$('.contC>button').text('VER DETALLE')
}
})    


});
</script>

</html>