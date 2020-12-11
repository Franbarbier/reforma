<?php
class Reservas{

    public function verReservas(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM reservas");
        $q->execute(); 
        $q = $q->fetch();

        return $q;
    }

    public function verReserva($id){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM reservas WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q;
    }


    public function crearReserva($check_in, $check_out, $importe_total, $id_usuario, $id_propiedad){
        global $pdo;

		$q = "INSERT INTO reservas (check_in, check_out, importe_total, id_usuario, id_propiedad) VALUES (?,?,?,?,?)";
        
        $stmt= $pdo->prepare($q);
        $stmt->execute([$check_in, $check_out, $importe_total, $id_usuario, $id_propiedad]);
        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
    }
    
}

?>