<!-- Renderizamos lo mas importante  -->
<?php
session_start();

$id = $_SESSION['id_user'];
// $id = 2;

if(isset($_GET['logout'])){
	session_destroy();
	header('location: login.php');
}


require 'php/connection.php';
require 'php/models/Usuarios.php';

$usuarios = new Usuarios($id);

$usuario = $usuarios->verUsuario();

$reservas_activas = $usuarios->verReservasActivas();

$nivel = $usuarios->verNivel();

// Descomentar esto de abajo una vez que se active el login
// if(!isset($_SESSION['user'])){
// 	header('location: http://localhost/reforma');
// }

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

	<title>Reforma | Tu perfil</title>
    <meta name="keywords" content="">
    <meta name="author" content="">
	<meta name="description" content="">		

	<meta name="robots" content="noindex,nofollow"/>

	<meta name="googlebot" content="noindex,nofollow"/>

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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/perfil-desk.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/perfil-mob.css?refrescate=4" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<style>

	.to-be-filled{
		border: 2px solid #d4bfaa!important;
	}

	#msj{
		text-align: center;
	}

	#msj a{
		font-weight: bold!important;
		color: #d4bfaa!important;
	}
	
	</style>

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


<main class="cont90"> 
	<div id="cambiar-cont">
		<h2>Cambiar contraseña</h2>
		<form action="">
			<!-- <div>
				<label for="mail">Mail de la cuenta</label>
				<input type="email">
			</div> -->
			<div>
				<label for="mail">Contraseña actual</label>
				<input type="password" id="psw-actual">
			</div>
			<div>
				<label for="mail">Nueva contraseña</label>
				<input type="password" id="psw1">
			</div>
			<div>
				<label for="mail">Repetir nueva contraseña</label>
				<input type="password" id="psw2">
			</div>
			<input type="submit" value="CAMBIAR" id="ok-cambiar">
			<div id="msj" style="display:none"></div>
		</form>
	</div>
</main>


</body>

<script>
$( document ).ready( function(){


	$(document).on('click', '#ok-cambiar', function(e){
		console.log('holue!')
		e.preventDefault();
		e.stopPropagation();

		var empty_fields = false

		$('#cambiar-cont input').each(function(){

			if($(this).val()==''){
				empty_fields = true
				$(this).addClass('to-be-filled')
			}else{
				$(this).removeClass('to-be-filled')
			}
		})

			if(empty_fields){
				$('#msj').html('Campos incompletos.')
				$('#msj').slideDown(100)
			}else{

				psw_actual = $('#psw-actual').val()
				psw1 = $('#psw1').val()
				psw2 = $('#psw2').val()

				if(psw1!=psw2){
					$('#msj').html('Las contraseñas introducidas no coinciden')
					$('#msj').slideDown(100)
					$('#psw1').addClass('to-be-filled')
					$('#psw2').addClass('to-be-filled')
				}else{
					
					$.ajax({
						url:'php/api/usuarios.php?func=changePassword',
						method:'POST',
						cache: false,
						data:{
							psw_actual:psw_actual,
							psw_nueva:psw1
						},
						dataType:'text',
						success:function(data){
							console.log(data)
							data=JSON.parse(data)
							
							if(data.error==2){
								$('#msj').html('La contraseña introducida no coincide con la actual.')
								$('#psw-actual').addClass('to-be-filled')
							}else if(data.error==1){
								$('#msj').html('Ocurrio un error al intentar actualizar la contraseña.')
							}else if(data.error==0){
								$('#msj').html('Contraseña actualizada con éxito! <a href="perfil.php">Regresar al perfil</a>')
								$('#psw1, #psw2, #psw-actual').val('')
							}
							$('#msj').slideDown(100)
						}
					});

				}

			}

	})



});
</script>

</html>