<?php
session_start();

$id = $_SESSION['id_user'];

header('Content-type: application/json');

require '../connection.php';
require '../models/Usuarios.php';

$usuarios = new Usuarios($id);

if($_GET['func'] == 'verHistorialReservas'){

    // $id = $_GET['id'];

    echo json_encode($usuarios->verHistorialReservas());

}

if($_GET['func'] == 'verNivel'){

    // $id = $_GET['id'];

    echo json_encode($usuarios->verNivel());

}


if($_GET['func'] == 'verNiveles'){

    echo json_encode($usuarios->verNiveles());

}


?>