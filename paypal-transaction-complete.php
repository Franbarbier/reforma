<?php
//1. Import the PayPal SDK client
namespace Sample;

require 'php/connection.php';
require 'php/models/Globales.php';
require 'php/models/Reservas.php';

require __DIR__ . '/vendor/autoload.php';

$globales = new \Globales();
$reservas = new \Reservas();

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
    global $reservas;

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

        // Creamos la reserva a partir de la info del row de checkouts
        $crear_reserva = $reservas->crearReserva($info_checkout['check_in'], $info_checkout['check_out'], $info_checkout['importe_total'], $info_checkout['id_usuario'], $info_checkout['id_propiedad']);

        $crear_reserva = json_decode($crear_reserva);

        if($crear_reserva->error==0){

          echo 'Reserva creada con éxito!';

          // Mandamos mail de nueva reserva creada

          // Redirigimos a thank you page
          header("Location: gracias.php");


        }

    }else{
        echo 'Error al actualizar el checkout';
    }

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