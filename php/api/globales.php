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

    echo json_encode($globales->crearUsuario($nombre, $apellido, $mail, $telefono, $fecha_nacimiento, $psw));

}

if($_GET['func']=='loginRequest'){

    $mail = $_POST['mail'];
    $psw = $_POST['psw'];

    echo $globales->loginRequest($mail, $psw);

}

if($_GET['func']=='verDisenadores'){

    echo json_encode($globales->verDisenadores());

}

if($_GET['func']=='verUsuarios'){

    echo json_encode($globales->verUsuarios());

}

if($_GET['func']=='eliminarUsuario'){

    $id = $_GET['id'];

    echo json_encode($globales->eliminarUsuario($id));

}

if($_GET['func']=='crearLocalidad'){

    $nombre = $_POST['nombre'];
    $provincia = $_POST['provincia'];

    echo $globales->crearLocalidad($nombre, $provincia);

}

if($_GET['func']=='eliminarLocalidad'){

    $id = $_GET['id'];

    echo $globales->eliminarLocalidad($id);

}

if($_GET['func']=='actualizarLocalidad'){

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $provincia = $_POST['provincia'];

    echo $globales->actualizarLocalidad($id, $nombre, $provincia);

}

if($_GET['func']=='actualizarDisenador'){

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $img_name = $_POST['img_name'];

    echo $globales->actualizarDisenador($id, $nombre, $descripcion, $img_name);

}

if($_GET['func']=='crearArtista'){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $img_name = $_POST['img_name'];

    echo $globales->crearArtista($nombre, $descripcion, $img_name);

}


if($_GET['func']=='eliminarArtista'){

    $id = $_GET['id'];

    echo $globales->eliminarArtista($id);

}

// if($_GET['func'] == 'delete_file'){
//     $file_path = $_GET['file_path'];
    

//     if (file_exists($file_path)) {
//         unlink($file_path);
//         echo '{"error": 0}'; 
//     }else{
//         echo '{"error": 1}'; 
//     }
// }

// if($_GET['func']=='verLocacion'){

//     // Obtenemos estos parametros ya que los recomendados tienen que ser de la misma localidad y no pueden ser el mismo que esta viualizando al momento presente
//     $locacion = $_GET['locacion'];

//     echo json_encode($globales->verLocacion($locacion));
// }

?>