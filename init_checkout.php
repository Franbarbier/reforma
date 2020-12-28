<?php

session_start();

require 'php/connection.php';
require 'php/models/Globales.php';

$globales = new Globales();

$_SESSION['checkout_importe_total'] = $_GET['importe_total'];
$_SESSION['checkout_checkin'] = $_GET['checkin'];
$_SESSION['checkout_checkout'] = $_GET['checkout'];
$_SESSION['checkout_id_propiedad'] = $_GET['id_propiedad'];
$_SESSION['checkout_days_to_stay'] = $_GET['days_to_stay'];
$_SESSION['checkout_descuento'] = $_GET['descuento'];
$_SESSION['checkout_tarifa_limpieza'] = $_GET['tarifa_limpieza'];

// Formateamos checkin y checkout para poder meterlas en la base de datos
$check_in = DateTime::createFromFormat('d/m/Y', $_GET['checkin']);
$check_in = $check_in->format('Y-m-d');
$check_out = DateTime::createFromFormat('d/m/Y', $_GET['checkout']);
$check_out = $check_out->format('Y-m-d');

// Registramos el checkout en la base de datos
$insert = $globales->registrarCheckout($_SESSION['id_user'], $_SESSION['checkout_id_propiedad'], $check_in, $check_out, $_SESSION['checkout_importe_total']);

$insert = json_decode($insert);

$error=1;
$last_insert_id = '';

if($insert->error==0){
    $error= 0;
    $_SESSION['checkout_id'] = $insert->last_insert_id;
}

echo '{"error":'.$error.'}';

?>