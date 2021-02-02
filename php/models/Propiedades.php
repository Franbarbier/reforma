<?php

class Propiedades{

    public function verPropiedades(){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM propiedades");
        $q->execute(); 
        $q = $q->fetchAll();

        // Traemos la info de sus localidades en funcion del  id_localidad
        foreach ($q as $key => $prop) {

            // Traer la info de localidad y provincia a partir del id_localidad
            $id_localidad = $prop['id_localidad'];
            $q_l = $pdo->prepare("SELECT * FROM localidades WHERE id=:id_localidad");
            $q_l->execute(['id_localidad' => $id_localidad]); 
            $q_l = $q_l->fetch();

            $q[$key]['localidad'] = $q_l['nombre'];
            $q[$key]['provincia'] = $q_l['provincia'];
            
        }

        return $q;
    }

    public function verPropiedad($id){
        global $pdo;

		$q = $pdo->prepare("SELECT * FROM propiedades WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        $dormitorios = json_decode($q['distribucion_camas']);
        $dormitorios = sizeof($dormitorios);
        $q['num_dormitorios'] = $dormitorios;

        // Traer la info de localidad y provincia a partir del id_localidad
        $id_localidad = $q['id_localidad'];
        $q_l = $pdo->prepare("SELECT * FROM localidades WHERE id=:id_localidad");
        $q_l->execute(['id_localidad' => $id_localidad]); 
        $q_l = $q_l->fetch();

        $q['localidad'] = $q_l['nombre'];
        $q['provincia'] = $q_l['provincia'];

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

        // Obtenemos el id de la localidad a partir de la ciudad
        $q = $pdo->prepare("SELECT * FROM localidades WHERE nombre=:ciudad");
        $q->execute(['ciudad' => $ciudad]); 
        $localidad = $q->fetch();

        $id_localidad = $localidad['id'];

        // Si ningun campo esta incompleto, hacemos la busqueda entera
        if($ciudad != '' && $huespedes != '' && $check_in != '' && $check_out != ''){

            
            $q = $pdo->prepare("SELECT * FROM propiedades WHERE id_localidad=:id_localidad AND huespedes>=:huespedes");
            $q->execute(['id_localidad' => $id_localidad, 'huespedes'=>$huespedes]); 
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
            foreach ($q as $key => $propiedad) {
                $disponible = true;

                $id_propiedad = $propiedad['id'];

                // Asignamos localidad y provincia en funcion a la row de localidad traida al principio
                $q[$key]['localidad'] = $localidad['nombre'];
                $q[$key]['provincia'] = $localidad['provincia'];
                $propiedad['localidad'] = $localidad['nombre'];
                $propiedad['provincia'] = $localidad['provincia'];

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

        }else if($ciudad!=''){

            $query = "SELECT * FROM propiedades WHERE id_localidad=:id_localidad AND huespedes>=:huespedes";
        
            // Si huespedes esta vacio, su valor pasa a ser 0 
            if($huespedes==''){
                $huespedes = 0;
            }

            $q = $pdo->prepare($query);
            $q->execute(['id_localidad' => $id_localidad, 'huespedes'=>$huespedes]); 
            $q = $q->fetchAll();

            // Asignamos provincia y localidad en fucion de los datos obtenidos a partir del id localidad
            foreach ($q as $key => $prop) {
                $q[$key]['localidad']=$localidad['nombre'];
                $q[$key]['provincia']=$localidad['provincia'];
            }


            return $q;

        }else if($ciudad==''){

            $query = "SELECT * FROM propiedades WHERE huespedes>=:huespedes";
        
            // Si huespedes esta vacio, su valor pasa a ser 0 
            if($huespedes==''){
                $huespedes = 0;
            }

            $q = $pdo->prepare($query);
            $q->execute(['huespedes'=>$huespedes]); 
            $q = $q->fetchAll();

            // Asignamos provincia y localidad en fucion de los datos obtenidos a partir del id localidad
            foreach ($q as $key => $prop) {
                $q_l = $pdo->prepare("SELECT * FROM localidades WHERE id=:id_localidad");
                $q_l->execute(['id_localidad' => $prop['id_localidad']]); 
                $localidad = $q_l->fetch();
                $q[$key]['localidad']=$localidad['nombre'];
                $q[$key]['provincia']=$localidad['provincia'];
            }


            return $q;


        }

    }    


    public function filtrarResultados($ciudad, $huespedes, $check_in, $check_out, $minprice, $maxprice, $amenities){

        global $pdo;

        // Buildeamos el query
        $filters = array();

        $filters[] = 'localidad = "'.$ciudad . '"';

        if ($huespedes != '')
        { $filters[] = 'huespedes >= '.$huespedes;}

        if ($minprice != '')
        { $filters[] = 'tarifa  >= '.$minprice;}

        if ($maxprice != '')
        { $filters[] = 'tarifa <= '.$maxprice;}

        // Realizamos el filtrado inicial
        $query = 'SELECT * FROM propiedades WHERE '.implode(' AND ', $filters);
            
        $q = $pdo->prepare($query);
        $q->execute(); 
        $q = $q->fetchAll();

        $propiedades_disponibles = [];
        
        // Procedemos a filtrar por fecha
        if($check_in != '' && $check_out != ''){

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

            $this_amenities = json_decode($propiedad['amenities']);

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

            // Por cada uno de los global amenities, nos fijemos que este presente en "this amenities"
            foreach ($amenities as $a) { 

                // Si uno de los amenities del filtro, no esta en la propiedad, pasamos el disponible a false
                if(!in_array($a, $this_amenities)){
                    $disponible = false;
                }
            }
            
            // Si disponible es true, pusheamos esta propiedad al array de propiedades disponibles
            if($disponible){
                array_push($propiedades_disponibles, $propiedad);
            }                
        }

    }else{

        // Por cada uno de los alojamientos devueltos,consultmaos sus amenities
        foreach ($q as $propiedad) { 

            $disponible = true;

            $this_amenities = json_decode($propiedad['amenities']);

            // Por cada uno de los global amenities, nos fijemos que este presente en "this amenities"
            foreach ($amenities as $a) { 

                // Si uno de los amenities del filtro, no esta en la propiedad, pasamos el disponible a false
                if(!in_array($a, $this_amenities)){
                    $disponible = false;
                }
            }

            if($disponible){
                array_push($propiedades_disponibles, $propiedad);
            }
        }


    }


        return $propiedades_disponibles;

    }

    public function verFechasOcupadas($id){

        global $pdo;

        $fechas_ocupadas = [];

        $fecha_actual = date('Y-m-d');

        $q = $pdo->prepare("SELECT * FROM reservas WHERE id_propiedad=:id_propiedad AND estado=1 AND check_out>:fecha_actual");
        $q->execute(['id_propiedad' => $id, 'fecha_actual' => $fecha_actual]); 
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
                $fecha = $value->format('Y-n-j');
                array_push($fechas_ocupadas, $fecha);
            }

            // Y por ultimo pusheamos la del checkout que no entra en el intervalo
            $checkout_formateada = new DateTime($check_out_r);
            $checkout_formateada = $checkout_formateada->format('Y-n-j');
            array_push($fechas_ocupadas, $checkout_formateada);


        }

        return $fechas_ocupadas;

    }

    public function actualizarPropiedad($id, $nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa, $galeria, $tarifa_limpieza){
        
        global $pdo;

        $sql = "UPDATE propiedades SET nombre=?, id_localidad=?, huespedes=?, banos=?, camas=?, concepto_espacio=?, distribucion_camas=?, amenities=?, id_disenador=?, coordenadas=?, tarifa=?, galeria=?, tarifa_limpieza=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa, $galeria, $tarifa_limpieza, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }

    }

    public function subirPropiedad($nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa, $galeria, $tarifa_limpieza){
        
        global $pdo;

        $q = "INSERT INTO propiedades (nombre, id_localidad, huespedes, banos, camas, concepto_espacio, distribucion_camas, amenities, id_disenador, coordenadas, tarifa, galeria, tarifa_limpieza) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt= $pdo->prepare($q);
        $stmt->execute([$nombre, $id_localidad, $huespedes, $banos, $camas, $concepto_espacio, $distribucion_camas, $amenities, $id_disenador, $coordenadas, $tarifa, $galeria, $tarifa_limpieza]);
        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }

    }

    public function eliminarPropiedad($id){

        global $pdo;

        // Eliminamos las fotos asociadas
        $q = $pdo->prepare("SELECT galeria FROM propiedades WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();
        if($q['galeria']==''){
            $q['galeria'] = '[]';
        }
        $galeria = json_decode($q['galeria']);
        foreach ($galeria as $key => $value) {
            $path = $_SERVER['DOCUMENT_ROOT'].'/reforma/imgs/propiedades_imgs/'.$value;
            if (file_exists($path)) {
                unlink($path);
            }
        }


        $q = $pdo->prepare("DELETE FROM propiedades WHERE id =:id");
        $q->execute(['id' => $id]); 
        
        if($q){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }

    }



}

?>