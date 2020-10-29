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

// Funcion para ver propiedades disponibles desde el filtrador de la home
if($_GET['func']== 'verDisponibles'){

	$huespedes = $_GET['huespedes'];
	$ciudad = $_GET['ciudad'];
	$check_in = $_GET['check_in'];
	$check_out = $_GET['check_out'];

	echo json_encode($propiedades->verDisponibles($ciudad, $huespedes, $check_in, $check_out));

}

// Funcion para ver propiedades disponibles desde la barra compleja de filtros de "explorar"
if($_GET['func']=='filtrarResultados'){

	$huespedes = $_GET['huespedes'];
	$ciudad = $_GET['ciudad'];
	$check_in = $_GET['check_in'];
	$check_out = $_GET['check_out'];
	$minprice = $_GET['minprice'];
	$maxprice = $_GET['maxprice'];

	var_dump($propiedades->filtrarResultados($ciudad, $huespedes, $check_in, $check_out, $minprice, $maxprice));	


}

?>