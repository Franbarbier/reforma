<?php
class Propiedades{

    public function verPropiedades(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM propiedades");
        $q->execute(); 
        $q = $q->fetch();

        return $q;
    }

    public function verPropiedad($id){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q;
    }

    public function verAmenities($id){
        global $pdo;

		$q = $pdo->prepare("SELECT amenities as 'amenities' FROM propiedades WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q['amenities'];
    }
    


    public function verDisponibles($ciudad, $huespedes, $check_in, $check_out){

        global $pdo;

        // Si ningun campo esta incompleto, hacemos la busqueda entera
        if($ciudad != '' && $huespedes != '' && $check_in != '' && $check_out != ''){
            
            $q = $pdo->prepare("SELECT * FROM propiedades WHERE localidad=:ciudad AND huespedes>=:huespedes");
            $q->execute(['ciudad' => $ciudad, 'huespedes'=>$huespedes]); 
            $q = $q->fetchAll();

            $propiedades_disponibles = [];

            $fechas_deseadas = [];

            $periodo_deseado = new DatePeriod(
                new DateTime($check_in),
                new DateInterval('P1D'),
                new DateTime($check_out)
            );

            foreach($periodo_deseado as $dia){
                array_push($fechas_deseadas, $dia->format('Y-m-d'));
            }

            // Por cada uno de los alojamientos devueltos, consultamos reservas activas
            foreach ($q as $propiedad) {
                $disponible = true;

                $id_propiedad = $propiedad['id'];

                $q = $pdo->prepare("SELECT * FROM reservas WHERE id_propiedad=:id_propiedad AND estado=1");
                $q->execute(['id_propiedad' => $id_propiedad]); 
                $q = $q->fetchAll();

                foreach($q as $reserva){
                    $check_in_r = $reserva['check_in'];
                    $check_out_r = $reserva['check_out'];

                    $period = new DatePeriod(
                        new DateTime($check_in_r),
                        new DateInterval('P1D'),
                        new DateTime($check_out_r)
                      );
                    
                    //   Iteramos cada dia del periodo y lo vamos pusheando a fechas_ocupadas
                    foreach($period as $key=>$value){
                        if(in_array($value->format('Y-m-d'), $fechas_deseadas)){
                            $disponible = false;
                            break;
                        };
                    }

                }
                
                // Si disponible es true, pusheamos esta propiedad al array de propiedades disponibles
                if($disponible){
                    array_push($propiedades_disponibles, $propiedad);
                }                
            }

            return $propiedades_disponibles;

        }else if($ciudad!='' || $huespedes!=''){

            $query = "SELECT * FROM propiedades WHERE localidad=:ciudad AND huespedes>=:huespedes";
            
            // Si huespedes esta vacio, su valor pasa a ser 0 
            if($huespedes==''){
                $huespedes = 0;
            }

            $q = $pdo->prepare($query);
            $q->execute(['ciudad' => $ciudad, 'huespedes'=>$huespedes]); 
            $q = $q->fetchAll();

            return $q;
        }

    }    

}

?>