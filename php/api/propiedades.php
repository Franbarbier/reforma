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

	$huespedes = $_POST['huespedes'];
	$ciudad = $_POST['ciudad'];
	$check_in = $_POST['check_in'];
	$check_out = $_POST['check_out'];

	echo json_encode($propiedades->verDisponibles($ciudad, $huespedes, $check_in, $check_out));

}


?>