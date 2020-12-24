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
			
		</div>
	</main>
</div>

</body>

<script src="panel.js"></script>
<script>

$( document ).ready( function(){


active_propiedades()


function active_propiedades() {
	$('main>div').html(ver_propiedades())	
}
function active_usuarios() {
	$('main>div').html(ver_usuarios())
}
function active_localidades() {
	$('main>div').html(ver_localidades())	
}
function active_artistas() {
	$('main>div').html(ver_artistas())	
}

$('aside #propiedades').click(function(){
	active_propiedades()
})
$('aside #usuarios').click(function(){
	active_usuarios()
})
$('aside #localidades').click(function(){
	active_localidades()
})
$('aside #artistas').click(function(){
	active_artistas()
})

$(document).on('click', '#crear-propiedad', function () {	
	$('main>div').html(nueva_propiedad())	
})
$(document).on('click', '.editar-prop', function () {	
	let id = $(this).parent().parent().attr('id')
	$('main>div').html(nueva_propiedad(id))
})


$('body').append( modal_edit_artista() )
$('body').append( modal_edit_localidad() )
$('body').append( modal_ver_usuario() )




});
</script>

</html>