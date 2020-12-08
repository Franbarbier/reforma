<?php 

require 'oauth_login.php';

// Chequeando si está logeado
if(isset($_SESSION['id_user'])){
	header('location: index.php');
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

	<link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/login.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/loginMob.css" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>


<nav>
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

<main>
    <header>
			<div>
				<!-- <img src="imgs/logo-chico.svg" alt=""> -->
				<h4>Iniciar sesión</h4>		
			</div>

		<form action="">
			<label for="mail">Mail</label>
			<input class="inputes" type="text" id="mail">
			<label for="psw">Contraseña</label>
			<input class="inputes" type="password" id="psw">
			<input id="loginear" type="submit" value="INGRESAR">
		</form>
		<a href="<?php echo $login_url ?>">
			<button id="google-init">
				<img src="imgs/search.svg" alt="">
				<span>Inicia sesion con Google</span>
			</button>
		</a>
		<p>¿Olvidaste tu contraseña?</p>
    </header>
    <div>
		<img src="https://a0.muscache.com/im/pictures/58e33f93-3b69-4d91-b0aa-8801b61cd059.jpg" alt="">
		<div>
			<div>

				<div>
					<img src="imgs/logo-chico.svg" alt="">
					<h4>Reforma</h4>		
				</div>
				<p>Modificando tu manera de viajar.</p>
			</div>
		</div>
    </div>
</main>


<?php // include 'footer.php'; ?>

</body>
<script>

$( document ).ready( function(){



$('.inputes').focusin(function(){
	$("label[for="+$(this).attr("id")+"]").css({'transform':'scale(1) translate(0)','color':'#d4bfaa'})
	$(this).css({  'color': '#d4bfaa', 'border-color': '#d4bfaa'})
})

$('.inputes').focusout(function(){
	if($(this).val()==""){
		$("label[for="+$(this).attr("id")+"]").css({'transform':'translate(12% , 160%) scale(1.2)','color':'#b5b5b5'})
		$(this).css({  'color': '#d4bfaa', 'border-color': '#b5b5b5'})
	}
})

// Listener para cuando cliquean en loginear (login sin el ouath)
$(document).on("click", "#loginear", function(e){

	e.preventDefault()

	var mail = $('#mail').val()
	var psw = $('#psw').val()

	$.ajax({
            url:'php/api/globales.php?func=loginRequest',
            method:'POST',
            cache: false,
            data:{
                mail,
				psw
            },
            dataType:'text',
            success:function(data){
			 var res = JSON.parse(data)
			 if(res.error==0){
				 window.location = 'index.php'
			 }else{
				 console.log('Error al iniciar sesión.')
			 }
             console.log(data)
            }
        });

})

});
</script>

</html>