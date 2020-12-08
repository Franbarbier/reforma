<?php

session_start();

$_SESSION['importe_total'] = $_GET['importe_total'];
$error=1;
if(isset($_SESSION['importe_total'])){
    $error= 0;
}

echo '{"error":'.$error.'}';

?>