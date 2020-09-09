<?php
header('Content-type: application/json');

require '../connection.php';
require '../models/Reservas.php';

$reservas = new Reservas();

if($_GET['func'] == 'verReservas'){

	echo json_encode($reservas->verReservas());

}

if($_GET['func'] == 'verReserva'){

	echo json_encode($reservas->verReserva($_GET['id']));

}

if($_GET['func'] == 'crearReserva'){

	$check_in = $_POST['check_in'];
	$check_out = $_POST['check_out'];
	$huespedes = $_POST['huespedes'];
	$precio_final = $_POST['precio_final'];
	$id_usuario = $_POST['id_usuario'];
	$id_propiedad = $_POST['id_propiedad'];

	echo json_encode($reservas->crearReserva($check_in, $check_out, $huespedes, $precio_final, $id_usuario, $id_propiedad));

}



?>