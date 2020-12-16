<?php
class Usuarios{

    
    function __construct($id) {
		$this->id = $id;
	}

    public function verUsuarios(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM usuarios");
        $q->execute(); 
        $q = $q->fetch();

        return $q;
    }

    public function verUsuario(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $q->execute(['id' => $this->id]); 
        $q = $q->fetch();

        return $q;
    }

    public function verReservas(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
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

    
    public function verReservasActivas(){
        global $pdo;

        $fecha_actual = date('Y-m-d');

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario AND check_out>:fecha_actual");
        $q->execute(['id_usuario' => $this->id, 'fecha_actual' => $fecha_actual]); 
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

    public function verHistorialReservas(){
        global $pdo;

        $fecha_actual = date('Y-m-d');

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id_usuario=:id_usuario AND check_out <:fecha_actual");
        $q->execute(['id_usuario' => $this->id, 'fecha_actual' => $fecha_actual]); 
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
            $reservas_array[$c]['galeria'] =  $propiedad['galeria'];
            $reservas_array[$c]['importe_total'] =  $reserva['importe_total'];
            $reservas_array[$c]['huespedes'] =  $propiedad['huespedes'];
            $reservas_array[$c]['fecha_creada'] =  $reserva['fecha_creada'];
            $reservas_array[$c]['id_propiedad'] =  $reserva['id_propiedad'];
            $id_reserva = $reserva['id'];

            // Traemos la posible reseña
            $q = $pdo->prepare("SELECT * FROM resenas WHERE id_reserva=:id_reserva");
            $q->execute(['id_reserva' => $id_reserva]); 
            $resena = $q->fetch();

            if($resena){
                $reservas_array[$c]['resena'] = $resena['detalle'];
            }else{
                $reservas_array[$c]['resena'] = '';
            }


            $c++;

        }

        return $reservas_array;

    }


    public function verNivel(){
        global $pdo;

        // Calculamos el nivel del usuario

        // Traemos sus reservas para obtener el score
        $q = $pdo->prepare("SELECT SUM(importe_total) as score FROM reservas WHERE id_usuario=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
        $q = $q->fetch();

        $score = $q['score'];

        // Traemos los niveles para ver en que nivel cae el
        $q = $pdo->prepare("SELECT * FROM niveles");
        $q->execute(); 
        $q = $q->fetchAll();

        $nivel_usuario = '';
        $nivel_numero = 0;
        $next_level = null;

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

        $q = $pdo->prepare("SELECT noches_gratis_usadas FROM usuarios WHERE id=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
        $q = $q->fetch();
        $noches_usadas = $q['noches_gratis_usadas'];

        if($noches_usadas == ''){
            $noches_usadas = '[]';
        }

        return ["score"=>$score, "nivel"=>$nivel_usuario, "numero"=>$nivel_numero, "next_level_score"=>$next_level['score'], "noches_usadas"=>$noches_usadas];

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

    public function anadirFavorito($id_favorito, $action){

        global $pdo;

        // Traemos sus favoritos actuales
        $q = $pdo->prepare("SELECT favoritos FROM usuarios WHERE id=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
        $q = $q->fetch();

        if($q['favoritos']==''){
            $q['favoritos'] = '[]';
        }

        
        $favoritos = json_decode($q['favoritos']);

        // Por las dudas eliminamos duplicados
        $favoritos = array_unique($favoritos);

        if($action == 'add'){
            if(!in_array($id_favorito, $favoritos)){
                array_push($favoritos, $id_favorito);
            }
        }else{
            array_splice($favoritos, array_search($id_favorito, $favoritos), 1);
        }

        $favoritos = json_encode($favoritos);
        
        $sql = "UPDATE usuarios SET favoritos=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$favoritos, $this->id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }

    }

    public function checkFavorito($id_propiedad){
        global $pdo;
        
        $error = 0;
        $is_favorito = 0;

        $q = $pdo->prepare("SELECT favoritos FROM usuarios WHERE id=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
        $q = $q->fetch();

        if(!$q){
            $error = 1;
        }else{

            
            if($q['favoritos']==''){
                $q['favoritos'] = '';
            }
            
            $favoritos = json_decode($q['favoritos']);

            if(in_array($id_propiedad, $favoritos)){
                $is_favorito = 1;
            }
            
        }

        return '{"error":'.$error.', "favorito":'.$is_favorito.'}';

    }

    public function verFavoritos(){
        
        global $pdo;

        $q = $pdo->prepare("SELECT favoritos FROM usuarios WHERE id=:id_usuario");
        $q->execute(['id_usuario' => $this->id]); 
        $q = $q->fetch();

        $favoritos = $q['favoritos'];

        if($favoritos== ''){
            $favoritos = '[]';
        }

        $favoritos = json_decode($favoritos);

        $arr_fav_props = [];

        foreach ($favoritos as $key => $fav) {
        
            $q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
            $q->execute(['id' => $fav]); 
            $q = $q->fetch();

            // Traer la info de localidad y provincia a partir del id_localidad
            $id_localidad = $q['id_localidad'];
            $q_l = $pdo->prepare("SELECT * FROM localidades WHERE id=:id_localidad");
            $q_l->execute(['id_localidad' => $id_localidad]); 
            $q_l = $q_l->fetch();

            $q['localidad'] = $q_l['nombre'];
            $q['provincia'] = $q_l['provincia'];

            array_push($arr_fav_props, $q);

        }

        return $arr_fav_props;

    }

    public function dejarResena($id_propiedad, $resena, $id_reserva){
        global $pdo;

        $q = "INSERT INTO resenas (id_usuario, id_propiedad, id_reserva, detalle) VALUES (?,?,?,?)";
        $stmt= $pdo->prepare($q);
        $stmt->execute([$this->id, $id_propiedad, $id_reserva, $resena]);

        if($stmt){
            $error = 0;
        }else{
            $error = 1;
        }

        return '{"error": '.$error.'}';
        
    }



}

?>