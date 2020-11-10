<?php
class Usuarios{

    public function verUsuarios(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM usuarios");
        $q->execute(); 
        $q = $q->fetch();

        return $q;
    }

    public function verUsuario($id){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q;
    }

    public function verReservas($id_usuario){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario");
        $q->execute(['id_usuario' => $id_usuario]); 
        $q = $q->fetchAll();

        $reservas_array = [];

        $c = 0;
        // Buscamos la info de esa propiedad a partir del id de la propiedad obtenido
        foreach($q as $key=>$reserva){

            $id = $reserva['id_propiedad'];

            $q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
            $q->execute(['id' => $id]); 
            $propiedad = $q->fetch();

            $reservas_array[$c]['id'] =  $reserva['id'];
            $reservas_array[$c]['nombre_propiedad'] =  $propiedad['nombre'];
            $reservas_array[$c]['check_in'] =  substr($reserva['check_in'], 5);
            $reservas_array[$c]['check_out'] =  substr($reserva['check_out'], 5);

            $c++;

        }

        return $reservas_array;

    }

    
    public function verReservasActivas($id_usuario){
        global $pdo;

        $fecha_actual = date('Y-m-d');

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario AND check_out>:fecha_actual");
        $q->execute(['id_usuario' => $id_usuario, 'fecha_actual' => $fecha_actual]); 
        $q = $q->fetchAll();

        $reservas_array = [];

        $c = 0;
        // Buscamos la info de esa propiedad a partir del id de la propiedad obtenido
        foreach($q as $key=>$reserva){

            $id = $reserva['id_propiedad'];

            $q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
            $q->execute(['id' => $id]); 
            $propiedad = $q->fetch();

            $reservas_array[$c]['id'] =  $reserva['id'];
            $reservas_array[$c]['nombre_propiedad'] =  $propiedad['nombre'];
            $reservas_array[$c]['check_in'] =  substr($reserva['check_in'], 5);
            $reservas_array[$c]['check_out'] =  substr($reserva['check_out'], 5);

            $c++;

        }

        return $reservas_array;

    }

    public function verHistorialReservas($id_usuario){
        global $pdo;

        $fecha_actual = date('Y-m-d');

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario AND check_out <:fecha_actual");
        $q->execute(['id_usuario' => $id_usuario, 'fecha_actual' => $fecha_actual]); 
        $q = $q->fetchAll();

        $reservas_array = [];

        $c = 0;
        // Buscamos la info de esa propiedad a partir del id de la propiedad obtenido
        foreach($q as $key=>$reserva){

            $id = $reserva['id_propiedad'];

            $q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
            $q->execute(['id' => $id]); 
            $propiedad = $q->fetch();

            $reservas_array[$c]['id'] =  $reserva['id'];
            $reservas_array[$c]['nombre_propiedad'] =  $propiedad['nombre'];
            $reservas_array[$c]['check_in'] =  substr($reserva['check_in'], 5);
            $reservas_array[$c]['check_out'] =  substr($reserva['check_out'], 5);

            $c++;

        }

        return $reservas_array;

    }


    public function verNivel($id_usuario){
        global $pdo;

        // Calculamos el nivel del usuario

        // Traemos sus reservas para obtener el score
        $q = $pdo->prepare("SELECT SUM(precio_final) as score FROM reservas WHERE id_usuario=:id_usuario");
        $q->execute(['id_usuario' => $id_usuario]); 
        $q = $q->fetch();

        $score = $q['score'];

        // Traemos los niveles para ver en que nivel cae el
        $q = $pdo->prepare("SELECT * FROM niveles");
        $q->execute(); 
        $q = $q->fetchAll();

        $nivel_usuario = '';
        $nivel_numero = 0;

        foreach($q as $key=>$nivel){
            if($score>=$nivel['score']){

                $nivel_usuario = $nivel['nivel'];
                $nivel_numero += 1;
            }else{
                $next_level = $q[$key];
            break;
            }
        }

        if($score == null){
            $score = 0;
        }

        return ["score"=>$score, "nivel"=>$nivel_usuario, "numero"=>$nivel_numero, "next_level_score"=>$next_level['score']];


    }

    public function verNiveles(){
        global $pdo;

        // Traemos sus reservas para obtener el score
        $q = $pdo->prepare("SELECT * FROM niveles");
        $q->execute(); 
        $q = $q->fetchAll();

        foreach ($q as $key => $value) {
            $q[$key]['numero'] = $key + 1;
            // $q[$key]['nombre_clean'] = str_replace($key + 1, "", $q[$key]['nivel']);
        }

        return $q;

    }



}

?>