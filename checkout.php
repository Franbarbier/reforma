<?php

session_start();

// Chequeando si el usuario esta logeado o no
$logeado = 'no';
if(isset($_SESSION['id_user'])){
	$logeado = 'si';
}

$importe_total = $_SESSION['importe_total'];

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
					<div>
						<h4>Información personal</h4>
						<div id="login-cont">
							<p>Ya tenés una cuenta?</p><button>INGRESAR</button>
						</div>
						<form action="">
							<div>
								<label for="">Mail</label>
								<input type="email">
							</div>
							<div>
								<label for="">Confirmar Mail</label>
								<input type="email">
							</div>
							<div>
								<label for="">Nombre</label>
								<input type="text">
							</div>
							<div>
								<label for="">Apellido</label>
								<input type="text">
							</div>
							<div>
								<label for="">Pais</label>
								<select id="country" name="country" class="form-control">
									<option value="" selected disabled></option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Åland Islands">Åland Islands</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Bouvet Island">Bouvet Island</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote D'ivoire">Cote D'ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="French Southern Territories">French Southern Territories</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guernsey">Guernsey</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-bissau">Guinea-bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
									<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Isle of Man">Isle of Man</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jersey">Jersey</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
									<option value="Korea, Republic of">Korea, Republic of</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macao">Macao</option>
									<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
									<option value="Moldova, Republic of">Moldova, Republic of</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montenegro">Montenegro</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Northern Mariana Islands">Northern Mariana Islands</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Pitcairn">Pitcairn</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russian Federation">Russian Federation</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Helena">Saint Helena</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
									<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia">Serbia</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syrian Arab Republic">Syrian Arab Republic</option>
									<option value="Taiwan, Province of China">Taiwan, Province of China</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
									<option value="Thailand">Thailand</option>
									<option value="Timor-leste">Timor-leste</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States">United States</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Viet Nam">Viet Nam</option>
									<option value="Virgin Islands, British">Virgin Islands, British</option>
									<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
									<option value="Wallis and Futuna">Wallis and Futuna</option>
									<option value="Western Sahara">Western Sahara</option>
									<option value="Yemen">Yemen</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>	
							</div>
							<div>
								<label for="">Teléfono</label>
								<input type="tel" placeholder="Ej: +54 9 11 1234-5678">
							</div>
							<div>
								<label for="">Contraseña</label>
								<input type="password">
							</div>
							<div>
								<label for="">Confirmar ontraseña</label>
								<input type="password">
							</div>
							<div>
								<label for="">Fecha de nacimiento</label>
								<input type="date">
							</div>
						</form>
					</div>
				</div>
				<div>
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
					<h3 id="nombre-propiedad2">Nombre del Hospedaje</h3>
					<div>
						<img src="imgs/location-brown.svg" alt="">
						<p id="localidad-provincia2">San Carlos de Bariloche</p>
					</div>
					<span><span class="huespedes">3</span> huéspedes · <span class="dormitorios">1</span> dormitorios · <span class="camas">5</span> camas<span class="banos"></span></span>

					<div class="info-box" id="sticky-calendar">
						<div>
							<img src="imgs/calendar.svg" alt="">
						</div>
						<div style="position: relative;">
							<?php include 'calendarDesplegableApartado.php'; ?>
						</div>
					</div>
					<table>
						<tr>
							<td><span id="por-noche">$114</span><span>x</span><span id="cant-noches">5 noches</span></td>
							<td id="precio-bruto">570</td>
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

<!-- <script src="js/index.js"></script> -->
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