<?php

session_start();

$_SESSION['checkout_importe_total'] = $_GET['importe_total'];
$_SESSION['checkout_checkin'] = $_GET['checkin'];
$_SESSION['checkout_checkout'] = $_GET['checkout'];
$_SESSION['checkout_id_propiedad'] = $_GET['id_propiedad'];

$error=1;

if(isset($_SESSION['checkout_importe_total'])){
    $error= 0;
}

echo '{"error":'.$error.'}';

?>