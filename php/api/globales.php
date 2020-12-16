<?php
header('Content-type: application/json');

require '../connection.php';
require '../models/Globales.php';

$globales = new Globales();

if($_GET['func']=='verAmenities'){

    echo json_encode($globales->verAmenities());

}

if($_GET['func']=='verDisenador'){

    $id = $_GET['id'];

    echo json_encode($globales->verDisenador($id));

}

if($_GET['func']=='verResenas'){

    $id_propiedad = $_GET['id_propiedad'];
    
    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }else{
        $limit = 10;
    }

    echo json_encode($globales->verResenas($id_propiedad, $limit));

}

if($_GET['func']=='verRecomendados'){

    // Obtenemos estos parametros ya que los recomendados tienen que ser de la misma localidad y no pueden ser el mismo que esta viualizando al momento presente
    $id_propiedad = $_GET['id_propiedad'];
    $localidad = $_GET['localidad'];

    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }else{
        $limit = 10;
    }

    echo json_encode($globales->verRecomendados($id_propiedad, $localidad, $limit));
}

if($_GET['func']=='verLocalidades'){
    echo json_encode($globales->verLocalidades());
}

if($_GET['func']=='crearUsuario'){
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $psw = $_POST['psw'];
    $psw2 = $_POST['psw2'];

    echo json_encode($globales->crearUsuario($nombre, $apellido, $mail, $telefono, $fecha_nacimiento, $psw, $psw2));

}

if($_GET['func']=='loginRequest'){

    $mail = $_POST['mail'];
    $psw = $_POST['psw'];

    echo $globales->loginRequest($mail, $psw);

}

// if($_GET['func']=='verLocacion'){

//     // Obtenemos estos parametros ya que los recomendados tienen que ser de la misma localidad y no pueden ser el mismo que esta viualizando al momento presente
//     $locacion = $_GET['locacion'];

//     echo json_encode($globales->verLocacion($locacion));
// }

?>