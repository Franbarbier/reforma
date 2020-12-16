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

	<link rel="icon" href="../imgs/logo-chico.svg" type="image/x-icon"/>

	<link rel="shortcut icon" href="../imgs/logo-chico.svg" type="image/x-icon"/>

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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/admin-panel.css" />
	<!-- <link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/homeMobile.css?refrescate=1" /> -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>

<nav>
    <input type="hidden" value="<?php echo $logeado ?>" id="logeado">
    <input type="hidden" id="id_propiedad">
	<div class="cont90">
		<div>

			<div>

                <a href="/">
                    <img src="../imgs/logo-chico.svg" alt="logo reforma alquiler de hospedajes premium">
                </a>
			</div>
			<div id="menu-cont"></div>
		</div>
	</div>
</nav>

<div id="body-2">
	<aside>
		<div>
			<ul>
				<li id="propiedades">Propiedades</li>
				<li id="usuarios">Usuarios</li>
				<li id="localidades">Localidades</li>
				<li id="artistas">Artistas</li>
			</ul>
		</div>
	</aside>
	<main>
		<div>
			<div id="crear_propiedad">
				<div>
					<h2>Nueva propiedad</h2>
					<button id="subir-propiedad">SUBIR PROPIEDAD</button>
				</div>
				<div>
					<div id="n-nombre">
						<label for="">Nombre</label>
						<input class="grey-input" type="text">
					</div>
					<div id="n-provincia">
						<label for="">Provincia</label>
						<select name="" class="grey-input" id="">
							<option value="">Argentin</option>
							<option value="">Argentin</option>
							<option value="">Argentin</option>
						</select>
					</div>
					<div id="n-localidad">
						<label for="">Localidad</label>
						<select disabled name="" class="grey-input" id="">
							<option value="">Argentin</option>
							<option value="">Argentin</option>
							<option value="">Argentin</option>
						</select>
					</div>
					<div class="house-display">
						<div>
							<img src="../imgs/users-handmade.svg" alt="">
							<p>Huespedes</p>
							<input class="grey-input" type="number">
						</div>
						<div>
							<img src="../imgs/ducha-handmade.svg" alt="">
							<p>Baños</p>
							<input class="grey-input" type="number">
						</div>
						<div>
							<img src="../imgs/cama-handmade.svg" alt="">
							<p>Dormitorios</p>
							<input class="grey-input" type="number">
						</div>
						<div id="n-camas">
							<div class="dormitorio">
								<p>Dormitorio 1</p>
								<div class='camas-en-dormis'>
									<select class="grey-input" name="" id="">
										<option value="">Matrimonial</option>
										<option value="">Individual</option>
										<option value="">Sofa/Colchón</option>
									</select>
									<input class="grey-input" type="number">
								</div>
							</div>
							
						</div>
					</div>
					<div id="amenities">
						<p>Amenities</p>
						<ul>

						</ul>
					</div>
					<div id="concepto">
						<p>Concepto</p>
						<textarea class="grey-input"></textarea>
					</div>
					<div class="lasts">
						<div>
							<p>Diseñador</p>
							<input class="grey-input" type="text">
						</div>
						<div>
							<p>Ubicacion</p>
							<input class="grey-input" type="text">
						</div>
					</div>
					<div class="lasts">
						<div>
							<p>Tarifa por Limpieza</p>

							<div>
								<span>$</span>
								<input class="grey-input" type="number">
							</div>
						</div>
						<div>
							<p>Tarifa por noche</p>

							<div>
								<span>$</span>
								<input class="grey-input" type="number">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

</body>

<script src="panel.js"></script>
<script>

$( document ).ready( function(){

// $('main>div').append(ver_propiedades())

});
</script>

</html>