<?php

require 'Propiedades.php';
$propiedades = new Propiedades();

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
        global $propiedades;

        // Traemos las fechas tomadas
        $fechas_tomadas = $propiedades->verFechasOcupadas($id_propiedad);

        echo 'RESERVADAS: ';
        var_dump($fechas_tomadas);

        $fechas_a_reservar = [];

        $period = new DatePeriod(
            new DateTime($check_in),
            new DateInterval('P1D'),
            new DateTime($check_out)
            );
        
        //   Iteramos cada dia del periodo y lo vamos pusheando a fechas_ocupadas
        foreach($period as $key=>$value){
            $fecha = $value->format('Y-n-j');
            array_push($fechas_a_reservar, $fecha);
        }

        // Y por ultimo pusheamos la del checkout que no entra en el intervalo
        $checkout_formateada = new DateTime($check_out);
        $checkout_formateada = $checkout_formateada->format('Y-n-j');
        array_push($fechas_a_reservar, $checkout_formateada);

        echo 'A RESERVAR: ';
        var_dump($fechas_a_reservar);

        $se_pisan_fechas = false;

        // Nos fijamos que no se estén pisando fechas
        foreach($fechas_a_reservar as $key=>$fecha){
            
            if(in_array($fecha, $fechas_tomadas)){
                echo 'La fecha ' . $fecha . ' Se pisa!';
                $se_pisan_fechas = true;
            }
            
        }

        if(!$se_pisan_fechas){
            echo 'No se pisan las fechas con otra reserva, se puede crear la reserva';
        }else{
                echo 'Las fechas se pisan. No se puede crear esta reserva';
                
                // Si no se estan pisando, procedemos con la reserva
                
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
    
}

?>