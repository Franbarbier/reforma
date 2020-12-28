<?php

require '../php/connection.php';

//INICIO DE SESIÓN
session_start();


$_SESSION['message']="";

if(isset($_POST['login'])){
	$mail = $_POST['mail'];
	$psw = $_POST['password'];

	$user = $pdo->prepare("SELECT * FROM admins WHERE mail=:mail AND psw=:psw");
	$user->execute(['mail' => $mail, 'psw'=>$psw]); 
	$user = $user->fetch();

	if(sizeof($user)>0){
		$_SESSION['super_admin']=$user['mail'];
		header('location: index.php');
	}else{
		$_SESSION['message'] = 'Mail o contraseña incorrectos';
	}

}



?>


<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style>

@media (min-width: 800px) {
body{
	margin: 0;
	background-color: #121212;
	font-family: 'Montserrat';
}

#mother{
	width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    background-color: #121212;
    align-items: center;
}

#sub-mother-cont{
	display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
	z-index: 1;
}

#inputs-cont{
	display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}
#inputs-cont>div{
	margin: 5% auto;
    width: 200px;
    position: relative;
}

.button{
	background: #d4bfaa;
    border: 1px solid #d4bfaa;
    outline: none;
    color: #fafafa;
    font-family: 'Montserrat';
    border-radius: 3px;
    padding: 8px 16px;
    font-weight: 500;
    font-size: 0.8em;
    margin: 3% auto;
    display: block;
    transition: .2s cubic-bezier(0.13, 0.77, 0.33, 1);
    cursor: pointer;
}

.button:hover{
	background-color: transparent;
	color: #d4bfaa;
}

input{
	display: block;
    width: 100%;
    font-family: 'Montserrat';
    padding: 7px 10px;
    background: transparent;
    border: 1px solid #d4bfaa;
    border-radius: 3px;
    outline: none;
	color: #f0f0f0;

}
form label{
	font-size: 0.65em;
    font-weight: 200;
    color: #cacaca;
    position: absolute;
	background: #111111;
    padding: 0px 5px;
    top: 29%;
    left: 4px;
    transition: .2s cubic-bezier(0.13, 0.77, 0.33, 1);
    cursor: text;
}
form{
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

#logo{
	margin-bottom: 35px;
}
#logo>img{
    height: 80px;
    filter: brightness(0) invert(1);

}


.bg-memes{
	background-image: url('imgs/meme-bg.jpg');
	opacity: 0.015;
	position: absolute;
	width: 100%;
	height: 100%;
	z-index:0;
}

}


@media (max-width: 799px) {

body{
	margin: 0;
	background-color: #121212;
	font-family: 'Montserrat';
}

#mother{
	width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    background-color: #121212;
    align-items: center;
}

#sub-mother-cont{
	display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
	z-index: 1;
}

#inputs-cont{
	display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}
#inputs-cont>div{
	margin: 5% auto;
    width: 290px;
    position: relative;
}

.button{
	background: #d4bfaa;
    border: 1px solid #d4bfaa;
    outline: none;
    color: #fafafa;
    font-family: 'Montserrat';
    border-radius: 3px;
    padding: 13px 46px;
    font-weight: 500;
    font-size: 0.8em;
    margin: 3% auto;
    display: block;
    transition: .2s cubic-bezier(0.13, 0.77, 0.33, 1);
    cursor: pointer;
}

.button:hover{
	background-color: transparent;
	color: #d4bfaa;
}

input{
	display: block;
    width: 100%;
    font-family: 'Montserrat';
    padding: 12px 15px;
    background: transparent;
    border: 1px solid #d4bfaa;
    border-radius: 3px;
    outline: none;
	color: #f0f0f0;
	font-size: 1.3em;
}
form label{
	font-size: 0.8em;
    font-weight: 200;
    color: #cacaca;
    position: absolute;
	background: #111111;
    padding: 0px 5px;
    top: 35%;
    left: 6px;
    transition: .2s cubic-bezier(0.13, 0.77, 0.33, 1);
    cursor: text;
}
form{
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

#logo{
	margin-bottom: 35px;
}
#logo>img{
	width: 19vw
}


.bg-memes{
	background-image: url('imgs/meme-bg.jpg');
	opacity: 0.015;
	position: absolute;
	width: 100%;
	height: 100%;
	z-index:0;
}

}

</style>

<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

 <div id="mother">

	<div class="bg-memes"></div>
 	
 	<div id="sub-mother-cont">

		<div id="logo"><img src="../imgs/logo-chico.svg" alt=""></div>

 		
 		<form action="" method="post">
	 		<div id="inputs-cont">
				 <div>
					<label for="mail">Mail</label>
					 <input class="inputes" type="email" name="mail" id="mail">
				 </div>
				 <div>
					<label for="pass-log">Contraseña</label>
					<input class="inputes" type="password" name="password" id="pass-log">
				</div>
	 		</div>

	 		<div>
	 			<input type="submit" name="login" value="ACCEDER" class="button">
	 		</div>
	 		<div style="color: white; margin-top: 10px;"></div>
 		</form>

 	</div>

 </div>

<script>
$( document ).ready(function(){


if ( $(window).width() < 800) {

$('.inputes').focusin(function(){
	$("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-164%) scale(0.9)'})
})
$('.inputes').focusout(function(){
	if($(this).val()==""){
	    $("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-0%) scale(1)'})
	} 
})

$('.inputes').each(function() {
  if( $(this).val() != "" ){
    $("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-164%) scale(0.9)'})
  }
})

} else {

$('.inputes').focusin(function(){
	$("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-123%) scale(0.9)'})
})

$('.inputes').focusout(function(){
	if($(this).val()==""){
	    $("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-0%) scale(1)'})
	} 
})

$('.inputes').each(function() {
	if( $(this).val() != "" ){
		$("label[for="+$(this).attr("id")+"]").css({'transform':'translateY(-123%) scale(0.9)'})
	}
})

}



});
</script>

