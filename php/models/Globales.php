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

        $q = $pdo->prepare("SELECT * FROM resenas WHERE id_propiedad=:id ORDER BY fecha DESC LIMIT :lim");
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

    public function crearUsuario($nombre, $apellido='', $mail, $telefono='', $fecha_nacimiento='', $psw=''){
        global $pdo;

        $q = "INSERT INTO usuarios (nombre, apellido, mail, telefono, fecha_nacimiento, password) VALUES (?,?,?,?,?,?)";
        
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
   

    public function registrarCheckout($id_usuario, $id_propiedad, $check_in, $check_out, $importe_total){
        
        global $pdo;

        $q = "INSERT INTO checkouts (id_usuario, id_propiedad, check_in, check_out, importe_total) VALUES (?,?,?,?,?)";
        
        $stmt= $pdo->prepare($q);
        $stmt->execute([$id_usuario, $id_propiedad, $check_in, $check_out, $importe_total]);
        $last_insert_id = $pdo->lastInsertId();

        if($stmt){
            return '{"error": 0, "last_insert_id":'.$last_insert_id.'}';
        }else{
            return '{"error": 1}';
        }
    }

    public function checkoutCompletado($id){
        global $pdo;

        $sql = "UPDATE checkouts SET estado=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([1, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
    }

    public function verCheckout($id){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM checkouts WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q;
    }

    public function verDetalleReserva($id_reserva){

        global $pdo;

        $info_reserva = [];

        $r = $pdo->prepare("SELECT * FROM reservas WHERE id=:id");
        $r->execute(['id' => $id_reserva]); 
        $r = $r->fetch();

        $id_propiedad = $r['id_propiedad'];

        $p = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
        $p->execute(['id' => $id_propiedad]); 
        $p = $p->fetch();

        $info_reserva['check_in'] = $r['check_in'];
        $info_reserva['check_out'] = $r['check_out'];
        $info_reserva['importe_total'] = $r['importe_total'];
        $info_reserva['nombre_propiedad'] = $p['nombre'];
        $info_reserva['thumbnail'] = 'https://reformastays.co/imgs/propiedades_imgs/' . json_decode($p['galeria'])[0];
        $info_reserva['huespedes'] = $p['huespedes'];
        $info_reserva['camas'] = $p['camas'];
        $info_reserva['url'] = 'https://reformastays.co/apartado.php?id='.$id_propiedad;

        $id_localidad = $p['id_localidad'];

        $l = $pdo->prepare("SELECT * FROM localidades WHERE id=:id");
        $l->execute(['id' => $id_localidad]); 
        $l = $l->fetch();

        $info_reserva['localidad'] = $l['nombre'];
        $info_reserva['provincia'] = $l['provincia'];

        $id_usuario = $r['id_usuario'];

        $u = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $u->execute(['id' => $id_usuario]); 
        $u = $u->fetch();

        $info_reserva['nombre_usuario'] = $u['nombre'];
        $info_reserva['mail'] = $u['mail'];

        return $info_reserva;

    }

    public function enviarDetalleReserva($reserva){

        global $pdo;

        $nombre_usuario = $reserva['nombre_usuario'];
        $mail_usuario = $reserva['mail'];

        
        $mail = new PHPMailer;

        $mail->SMTPDebug=3;

        $mail->setFrom('noreply@reformastays.co', 'Reforma');
        $mail->addAddress($mail_usuario, $nombre_usuario);
        $mail->addReplyTo('noreply@reformastays.co', 'Reforma');

        $mail->isHTML(true);

        $mail->Subject=$nombre_usuario . ', acá están los detalles de tu reserva';

        // Armar un custom HTML para esta parte
        $mail->Body = '';

        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

        

    }

}

?>