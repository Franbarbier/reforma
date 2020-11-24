<?php
class Globales{

    public function verAmenities(){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM amenities");
        $q->execute(); 
        $q = $q->fetchAll();

        return $q;
    }

    public function verDisenador($id){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM disenadores WHERE id=:id");
        $q->execute(['id' => $id]); 
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
    

    public function verResenas($id_propiedad, $limit){
        global $pdo;

        // Array que vamos a ir llenando con info de la resena e info del usuario
        $array_resenas = [];

        $q = $pdo->prepare("SELECT * FROM resenas WHERE id_propiedad=:id LIMIT :lim");
        $q->execute(['id' => $id_propiedad, 'lim'=>$limit]); 
        $q = $q->fetchAll();
    
        // Recorremos las resenas 
        foreach ($q as $key => $resena) {
    
            // Traemos la info del usuario de cada resena
            $usuario = $this->verUsuario($resena['id_usuario']);

            // Creamos el array de la resena
            $resena_completa = [];
            $resena_completa['usuario'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
            $resena_completa['detalle'] = $resena['detalle'];
            $resena_completa['fecha'] = $resena['fecha'];

            array_push($array_resenas, $resena_completa);
    
        }

        return $array_resenas;
    }

    public function verRecomendados($id, $localidad, $limit){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM propiedades WHERE id!=:id AND localidad=:localidad LIMIT :lim");
        $q->execute(['id' => $id, 'localidad'=>$localidad, 'lim'=>$limit]); 
        $q = $q->fetchAll();

        return $q;

    }

    public function verLocalidades(){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM localidades");
        $q->execute(); 
        $q = $q->fetchAll();

        return $q;
    }

    public function crearUsuario($nombre, $apellido='', $mail, $telefono=''){
        global $pdo;

        $q = "INSERT INTO usuarios (nombre, apellido, mail, telefono) VALUES (?,?,?,?)";
        
        $stmt= $pdo->prepare($q);
        $stmt->execute([$nombre, $apellido, $mail, $telefono]);
        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
    }

    public function loginRequest($mail, $psw){
        global $pdo;
        $psw = md5($psw);
        $q = $pdo->prepare("SELECT * FROM usuarios WHERE mail=:mail AND password=:psw");
        $q->execute(['mail' => $mail, 'psw'=>$psw]); 
        $q = $q->fetch();

        if($q){

            // Iniciamos la sesion
            session_start();

            $_SESSION['id_user'] = $q['id'];
            $_SESSION['nombre_user'] = $q['nombre'];
            $_SESSION['mail_user'] = $q['mail'];

            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }

    }
   
}

?>