<?php
//1. Import the PayPal SDK client
namespace Sample;

require 'php/connection.php';
require 'php/models/Globales.php';

require __DIR__ . '/vendor/autoload.php';

$globales = new \Globales();

use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

require 'paypal-client.php';

$orderID = $_GET['orderID'];

class GetOrder
{

  // 2. Set up your server to receive a call from the client
  public static function getOrder($orderId)
  {

    global $globales;

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

  if($update_checkout){

    echo 'checkout completado!';
    var_dump($update_checkout);

    // Obtenemos la info del checkout
    $info_checkout = $globales->verCheckout($checkout_id);

    echo 'info del checkout! ';
    var_dump($info_checkout);

    // Creamos la reserva a partir de la info del row de checkouts

  }else{
    echo 'Error al actualizar el checkout';
  }



		
    // header("Location:../success");
    echo '<pre>';
    var_dump($response);
    echo '</pre>';
  }
}

if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderID, true);
}
?>