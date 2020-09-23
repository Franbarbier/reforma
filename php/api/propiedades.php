<?php
header('Content-type: application/json');

require '../connection.php';
require '../models/Propiedades.php';

$propiedades = new Propiedades();

if($_GET['func'] == 'verPropiedades'){

	echo json_encode($propiedades->verPropiedades());

}

if($_GET['func'] == 'verPropiedad'){

	echo json_encode($propiedades->verPropiedad($_GET['id']));

}

if($_GET['func'] == 'verAmenities'){

	echo $propiedades->verAmenities($_GET['id']);

}

if($_GET['func']== 'verDisponibles'){

	$huespedes = $_GET['huespedes'];
	$ciudad = $_GET['ciudad'];
	$check_in = $_GET['check_in'];
	$check_out = $_GET['check_out'];

	echo json_encode($propiedades->verDisponibles($ciudad, $huespedes, $check_in, $check_out));

}


?>