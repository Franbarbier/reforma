<?php

header('Content-type: application/json');

require '../connection.php';
require '../models/Usuarios.php';

$usuarios = new Usuarios();

if($_GET['func'] == 'verHistorialReservas'){

    $id = $_GET['id'];

    echo json_encode($usuarios->verHistorialReservas($id));

}

if($_GET['func'] == 'verNivel'){

    $id = $_GET['id'];

    echo json_encode($usuarios->verNivel($id));

}


if($_GET['func'] == 'verNiveles'){

    echo json_encode($usuarios->verNiveles());

}


?>