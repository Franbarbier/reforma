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

if($_GET['func'] == 'anadirFavorito'){

    $favorito = $_GET['favorito'];
    $action = $_GET['action'];

    echo $usuarios->anadirFavorito($favorito, $action);
}

if($_GET['func'] == 'checkFavorito'){

    $id_propiedad = $_GET['id_propiedad'];

    echo $usuarios->checkFavorito($id_propiedad);

}

if($_GET['func'] == 'verFavoritos'){

    echo json_encode($usuarios->verFavoritos());

}


?>