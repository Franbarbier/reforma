<?php

require_once 'vendor/autoload.php';
require 'php/connection.php';
require 'php/models/Globales.php';

global $pdo;

$globales = new Globales();

$google_client = new Google_Client();

$google_client->setClientId('92245027168-u8nqp166ck2hs7rt9tr9t21toidereud.apps.googleusercontent.com');
$google_client->setClientSecret('JQ70A5nMJ0bPGHHjVc99EInP');
$google_client->setRedirectUri('http://localhost/reforma/oauth.php');
$google_client->addScope('email');
$google_client->addScope('profile');

session_start();

// Termina el CONFIG aca

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{

 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
   $mail = $data['email'];
  }

   //  Nos fijamos si ya tiene una cuenta creada con nosotros a partir de su mail

    // Buscamos el usuario a partir del mail y guardamos su ID en la sesion
    $q = $pdo->prepare("SELECT * FROM usuarios WHERE mail=:mail");
    $q->execute(['mail' => $mail]); 
    $user = $q->fetch();   


   if($user){

    var_dump($user);

    echo 'YA TIENE CUENTA!';

    $_SESSION['id_user'] = $user['id'];
    // header('location: index.php');

   }else{

        echo 'NO TIENE CUENTA. HAY QUE CREARSELA';

       //Below you can find Get profile data and store into $_SESSION variable
       if(!empty($data['given_name']))
       {
        $nombre = $data['given_name'];
       }
     
       if(!empty($data['family_name']))
       {
        $apellido = $data['family_name'];
       }

       if(!empty($data['email']))
       {
        $mail = $data['email'];
       }

        //    Por ahora telefono lo vamos a tener vacio
        $telefono = '';
        
        //    if(!empty($data['picture']))
        //    {
        //     $_SESSION['user_image'] = $data['picture'];
        //    }


        // Creamos el usuario
        var_dump($globales->crearUsuario($nombre, $apellido, $mail, $telefono));

   }

 }

}

// Para logoutear
if(isset($_GET['logout'])){
    session_destroy();
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>
 </body>
</html>
