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
	$amenities = json_decode($_GET['amenities']);

	echo json_encode($propiedades->filtrarResultados($ciudad, $huespedes, $check_in, $check_out, $minprice, $maxprice, $amenities));	


}

if($_GET['func']=='verFechasOcupadas'){

	$id = $_GET['id'];

	echo json_encode($propiedades->verFechasOcupadas($id));

}


if($_GET['func']=='actualizarPropiedad'){

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$id_localidad = $_POST['id_localidad'];
	$huespedes = $_POST['huespedes'];
	$banos = $_POST['banos'];
	$camas = $_POST['camas'];
	$concepto_espacio = $_POST['concepto_espacio'];
	$distribucion_camas = $_POST['distribucion_camas'];
	$amenities = $_POST['amenities'];
	$id_disenador = $_POST['id_disenador'];
	$coordenadas = $_POST['coordenadas'];
	$tarifa = $_POST['tarifa'];
	

	echo $propiedades->actualizarPropiedad($id, $nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa);

}

if($_GET['func']=='subirPropiedad'){

	$nombre = $_POST['nombre'];
	$id_localidad = $_POST['id_localidad'];
	$huespedes = $_POST['huespedes'];
	$banos = $_POST['banos'];
	$camas = $_POST['camas'];
	$concepto_espacio = $_POST['concepto_espacio'];
	$distribucion_camas = $_POST['distribucion_camas'];
	$amenities = $_POST['amenities'];
	$id_disenador = $_POST['id_disenador'];
	$coordenadas = $_POST['coordenadas'];
	$tarifa = $_POST['tarifa'];
	

	echo $propiedades->subirPropiedad($nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa);

}

?>