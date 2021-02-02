<?php
//1. Import the PayPal SDK client
namespace Sample;

session_start();

require 'php/connection.php';
require 'php/models/Globales.php';
require 'php/models/Reservas.php';
require 'php/models/Usuarios.php';
// require 'php/models/Propiedades.php';


require __DIR__ . '/vendor/autoload.php';

$id_usuario = $_SESSION['id_user'];

$globales = new \Globales();
$reservas = new \Reservas();
$propiedades = new \Propiedades();
$usuarios = new \Usuarios($id_usuario);

use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

require 'paypal-client.php';

$orderID = $_GET['orderID'];

// Si usó una noche gratis, lo registramos
$noche_gratis = '';
if(isset($_GET['noche_gratis'])){

  $noche_gratis = $_GET['noche_gratis'];

  // Updateamos la columa 'noches_gratis_usadas' del usuario
  $usuario = $usuarios->verUsuario();
  $noches_usadas = $usuario['noches_gratis_usadas'];
  if($noches_usadas==''){
    $noches_usadas = '[]';
  }

  $noches_usadas = json_decode($noches_usadas);

  array_push($noches_usadas, $noche_gratis);

  $noches_usadas = json_encode($noches_usadas);
  
  $sql = "UPDATE usuarios SET noches_gratis_usadas=? WHERE id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$noches_usadas, $id_usuario]);

  if($stmt){
    echo 'Datos actualizados con éxito.';
  }

}

class GetOrder
{

  // 2. Set up your server to receive a call from the client
  public static function getOrder($orderId)
  {

    global $globales;
    global $reservas;
    global $propiedades;
    global $usuario;

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));
	
    // 4. Specify which information you want from the transaction details. For example:
    $orderID = $response->result->id;
    // $email = $response->result->payer->email_address;
    // $name = $response->result->purchase_units[0]->shipping->name->full_name;
    
    // Extremos el custom id para buscar a que row de "checkouts" corresponde
    $checkout_id = $response->result->purchase_units[0]->custom_id;
    echo 'CHECKOUT ID: ' . $checkout_id;

    // Actualizamos el row de checkouts correspondiente a este id, con el estado a "1"
    $update_checkout = $globales->checkoutCompletado($checkout_id);

    $update_checkout = json_decode($update_checkout);

    if($update_checkout->error==0){

        echo 'checkout completado!';
        var_dump($update_checkout);

        // Obtenemos la info del checkout
        $info_checkout = $globales->verCheckout($checkout_id);

        echo 'info del checkout! ';
        var_dump($info_checkout);

        $propiedad = $propiedades->verPropiedad($info_checkout['id_propiedad']);

        // Creamos la reserva a partir de la info del row de checkouts
        $crear_reserva = $reservas->crearReserva($info_checkout['check_in'], $info_checkout['check_out'], $info_checkout['importe_total'], $info_checkout['id_usuario'], $info_checkout['id_propiedad']);

        $crear_reserva = json_decode($crear_reserva);

        if($crear_reserva->error==0){

          echo 'Reserva creada con éxito!';

          $email = $usuario['mail'];
          $nombre = $usuario['nombre'];

          // Mandamos mail de nueva reserva creada
          // require "phpmailer/PHPMailerAutoload.php";
          // $mail = new PHPMailer;

          // $mail->SMTPDebug=3;
  
          // $mail->setFrom('noreply@reformastays.co', 'Reforma');
          // $mail->addAddress($email, $nombre);
          // $mail->addReplyTo('noreply@reformastays.co', 'Reforma');
  
          // $mail->isHTML(true);
  
          // $mail->Subject=$nombre . ', te acercamos los detalles de tu reserva.';

          // $contenido = 'Gracias por tu reserva ' . $nombre . '!
          //              <br><br>
          //              A continuación te acercamos los detalles: 
          //              <br>
          //              <b>Nombre del Alojamiento: </b>'.$propiedad['nombre'].'<br>;
          //              <b>Llegada: </b>'.$info_checkout['check_in'].'<br>;
          //              <b>Salida: </b>'.$info_checkout['check_out'].'<br>;
          //              <b>Importe total: </b>'.$info_checkout['importe_total'].'<br>;
          //              <b>Huéspedes permitidos: </b>'.$propiedad['huespedes'].'<br>;
          //              <b><a href="https://reformastays.co/apartado.php?id='.$info_checkout['id_propiedad'].'">VER PROPIEDAD</a></b><br>';
  
          // $mail->Body = $contenido;

          // echo $contenido;
  
          // if(!$mail->send()){
          //     echo 'Error al enviar mail al clientre!';
          //   }else{
          //     echo 'Mail al cliente enviado con exito!';
          //     return true;
          // }

          // Redirigimos a thank you page
          header("Location: gracias.php");


        }

    }else{
        echo 'Error al actualizar el checkout';
    }

    // echo '<pre>';
    // var_dump($response);
    // echo '</pre>';

  }
}

if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderID, true);
}
?>