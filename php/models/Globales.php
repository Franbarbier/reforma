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

    public function verDisenadores(){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM disenadores");
        $q->execute(); 
        $q = $q->fetchAll();

        return $q;
    }

    public function verUsuario($id){
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $q->execute(['id' => $id]); 
        $q = $q->fetch();

        return $q;
    }

    public function verUsuarios(){
      global $pdo;

      $q = $pdo->prepare("SELECT * FROM usuarios");
      $q->execute(); 
      $q = $q->fetchAll();

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
            $resena_completa['pp_img'] = $usuario['pp_img'];
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

        // Nos aseguramos de que no exista:
        $q = $pdo->prepare("SELECT * FROM usuarios WHERE mail=:mail");
        $q->execute(['mail' => $mail]); 
        $q = $q->fetch();

        if($q){
            return '{"error": 2}';
        }

        // Encriptamos la psw
        if($psw!=''){
            $psw = md5($psw);
        }

        $q = "INSERT INTO usuarios (nombre, apellido, mail, telefono, fecha_nacimiento, password) VALUES (?,?,?,?,?,?)";
        
        $stmt= $pdo->prepare($q);
        $stmt->execute([$nombre, $apellido, $mail, $telefono, $fecha_nacimiento, $psw]);
        if($stmt){
            $last_id = $pdo->lastInsertId();
            return '{"error": 0, "id":'.$last_id.'}';
        }else{
            return '{"error": 1, "id":""}';
        }
    }

    public function loginRequest($mail, $psw){
        global $pdo;
        $psw = md5($psw);
        $q = $pdo->prepare("SELECT * FROM usuarios WHERE mail=:mail AND password=:psw AND estado=:estado");
        $q->execute(['mail' => $mail, 'psw'=>$psw, 'estado'=>1]); 
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

        $cuerpo_mail = `<style>
        @font-face {
            font-family: Century Gothic;
            src: url(../GOTHIC.TTF)
          }
          @font-face {
            font-family: Century Gothic;
            src: url(../GOTHICB.TTF);
            font-weight: bold;
          }
          
          /*marron #d4bfaa*/
          ::selection {
            background: #d4bfaa;
            color: white;
          }
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          a {
            text-decoration: none;
            color: inherit;
          }
          li {
            list-style: none;
          }
          body {
            font-family: "Century Gothic";
            overflow-x: hidden;
            color: #272727;
          }
          button,
          input {
            font-family: "Century Gothic";
            outline: none;
          }
          .cont90 {
            width: 90%;
            display: flex;
            margin: auto;
            justify-content: space-between;
          }
          .contC {
            width: 33.33%;
          }
          .contG {
            width: 60%;
            padding-left: 10%;
          }
          
          nav {
            position: fixed;
            top: 0vh;
            left: 0;
            width: 100%;
            padding-top: 2vh;
            padding-bottom: 1vh;
            z-index: 99;
            background-image: linear-gradient( #fafafa 0%, transparent 0%);
            transition: .7s cubic-bezier(0.13, 0.77, 0.33, 1);
          }
          nav > div > div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
          }
          nav > div > div > div {
            width: 4%;
            cursor: pointer;
            z-index: 99;
            position: relative;
            z-index: 99;
          }
          nav > div > div > div:first-child{
            display: flex;
            align-items: center;
          }
          nav > div > div > div > a > img {
            width: 3vw;
          }
          #menu-cont>div{
            display: flex;
              flex-direction: column;
              align-items: flex-end;
          }
          #linea-menu1,
          #linea-menu2 {
            width: 30px;
            float: right;
            background: #272727;
            height: 4px;
            margin: 3px 0%;
            border-radius: 35px;
            display: block;
            transition: 0.5s cubic-bezier(0.13, 0.77, 0.33, 1);
            transition-delay: 0.15s;
          }
          main {
            display: flex;
            transition: 0.2s;
            padding-top: 10%;
            background: #fafafa;
          }
          main > div {
            width: 0%;
          
            transition: 1s;
            transition-timing-function: cubic-bezier(0.13, 0.77, 0.33, 1);
            height: 100vh;
            position: relative;
            overflow: hidden;
            border-bottom-right-radius: 2px;
          
            background-repeat: no-repeat;
            
          }
          
          
          
          /* sticky con el precio y la info */
          
          #sticky-price{
            padding: 4% 7%;
            border-left: 1px solid #ddd;
            position: sticky;
            top:2%;
          }
          .contC>button{
            display: none;
          }
          #sticky-price>div:first-child{
            width: 100%;
            height: 25vh;
            overflow: hidden;
            border-radius: 2px;
          }
          #sticky-price>div:first-child img{
            object-fit: cover;
            width: 100%;
            height: 100%;
          }
          
          .info-box{
            /* width: 91%; */
              display: flex;
              justify-content: space-between;
              align-items: center;
              margin: auto;
              border-radius: 2px;
              padding: 2% 4%;
              border: 1px solid #ddd;
              margin: 5% auto;
          }
          
          .info-box>div:first-child{
              width: 7%;
              display: block;
              margin: 0% 4% 0 1.5%;    
          }
          .info-box>div:first-child img{
            display: block;
            width: 100%;
            
          }
          
          .info-box>div:last-child{
              width: 80%;
              padding: 4% 0;
              padding-left: 5%;
              padding-right: 1%;
              border-left: 1px #ddd solid;
              font-size: .85em;
              align-items: center;
              display: flex;
              justify-content: space-between;
          }
          #descuentos{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            
          }
          #sticky-price h3{
            opacity: 0.85;
            margin-top: 2.5%;
          }
          #sticky-price>div:nth-child(3){
            display: flex;
            align-items: center;
            margin: 3% 0;
            margin-left: -2px;
          }
          #sticky-price>div:nth-child(3) img{
            width: 14px;
            padding-right: 1%;
          
          }
          
          #sticky-price>div:nth-child(3) p{
            font-size: .95em;
            color: #757575;
          
          }
          #sticky-price>span{ 
            font-size: 0.8em;
            color: #757575;
          }
          
          #sticky-reservar{
            
            background: #d4bfaa;
            border: 2px solid #d4bfaa;
            color: white;
            margin-top: 10%;
            font-weight: 600;
            font-size: 0.9em;
            letter-spacing: 0.5px;
            padding: 10px 0;
            width: 100%;
            border-radius: 2px;
            cursor: pointer;
            transition: 0.15s;
            display: block;
          }
          #sticky-reservar:hover{
            background: transparent;
            color: #d4bfaa;
          }
          #sticky-price table{
            width: 100%;
            font-size: 0.9em;
            border-bottom: 1px #ddd solid;
            /* border-top: 1px #ddd solid; */
            margin-bottom: 5%;
            padding: 3% 0;
          }
          #precio-bruto, #fee, #dcto, #total {
            text-align: right;
          }
          #precio-bruto:before, #fee:before, #dcto:before, #total:before {
            content: "$";
            margin-right: 2px;
          }
          #sticky-price table td{
            padding: 7px 0;
          }
          
          #por-noche ~ span{
            margin: 0 3px;
          }
          #total-cont{
            width: 100%;
            display: flex;
            justify-content: space-between;
          }
          
          #checkin{
           width: 40%; 
          }
          .flechin{
            margin-bottom: -5px;
            width: 20px;
          }
          
          #checkout{
            width: 40%;
          }
          
          
          #checkin>input, #checkout>input{
            width: 100%;
            border: none;
            background: transparent;
          }
          
          .flechin>img{
            transform: rotate(180deg);
            width: 16px;
          }
          #precio-final-cont{
            display: flex;
            justify-content: space-between;
          }
          #precio-final{
            width: 40%;
            text-align: right;
            position: relative;
            cursor: pointer;
          }
          #precio-final>span{ 
            display: block;
            margin-right: 4px;
          }
          #precio-final>img{
            width: 12px;
            transition: .2s cubic-bezier(00, 0.77, 0.33, 1)
          }
          .rotation{
            transform: rotate(180deg);
          }
          #descripcion-precio{
            top: 180%;
            position: absolute;
            padding: 9px;
            background: #fafafa;
            border: 1px #ddd solid;
            width: 200%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.85em;
            border-radius: 2px;
            display: none;
          }
          #descripcion-precio li{
            margin: 7px 0;
          }
          .icons{
            width: 100%;
          }
          main header>div{
            display: flex;
            justify-content: space-between;
            margin-bottom: 17%;
          }
          main header>div>div:first-child{
            width: 7%;
          }
          main header>div>div:last-child{
            width: 89%;
          }
          main header h4{
            font-size: 1.5em;
          }
          #login-cont{
            display: flex;
              margin: 5% 0;
              align-items: center;
          }
          #login-cont button{
            background: #d4bfaa;
              border: 2px solid #d4bfaa;
              color: white;
              transition: .2s;
              font-size: 0.8em;
              letter-spacing: 0.5px;
              padding: 7px 17px;
              border-radius: 2px;
              cursor: pointer;
              transition: 0.15s;
              margin-left: 5%;
          }
          form>div {
            width: 49%;
            display: inline-block;
            margin: 2% 0;
          }
          
          form>div label {
            display: block;
            font-size: 0.8em;
            color: dimgrey;
            margin-top: 1.9%;
          }
          
          form>div input, form>div select{
            background: none;
            border: 1px solid #a4a4a4;
            padding: 4% 6%;
            border-radius: 3px;
            margin-top: 2%;
            width: 87%;
            font-size: 0.8em;
          }
          .cartas{
            padding: 5%;
            border: 1px solid #929292;
            border-radius: 5px;
            margin: 5% 0;
            opacity: 0.7;
            cursor: pointer;
            transition: .1s;
          }
          .cartas:hover{
            opacity: 1;
          }
          .active-carta{
            border: 2px solid #d4bfaa ;
            opacity: 1;
            background: #f3ebe3;
          }
          .cartas h5{
            font-size: 1.2em;
              display: inline-block;
              width: 80%;
          }
          .cartas h6{
            display: inline-block;
              font-size: 1.4em;
              color: #3c3c3c;
              width: 10%;
              margin-left: 10%;
          }
          
          .cartas li{
            margin: 3% 0;
            font-size: 0.9em;
            color: dimgray;
            margin-left: 3%;
          }
          #pay-info{
            margin-top: 5%;
            font-size: .9em;
            color: dimgray;
          }
          #completar-pago{
            background: #d4bfaa;
              border: 2px solid #d4bfaa;
              color: white;
              transition: .2s;
              font-size: 0.8em;
              letter-spacing: 0.5px;
              padding: 7px 17px;
              border-radius: 2px;
              cursor: pointer;
              transition: 0.15s;
              display: block;
              margin: 15% auto;
          }
          #completar-pago:hover{
            background: transparent;
            color: #d4bfaa;
          }
          
          #paypal-button-container{
            margin-top: 20px;
          }
          
          
          /* Campos de info personal */
          .row-fields{
            display: flex;
            margin-bottom: 10px;
          }
          
          .info-label{
            font-size: 0.7em;
            text-transform: uppercase;
            color: #929292;
          }
          
          #info-personal-cont h4{
            margin-bottom: 20px;
          }
          
          .field-cont{
            width: 250px;
            margin-right: 20px;
          }
          
          .field-value{
            font-size: 0.9em;
          }
          
          /* Termina info personal */
          
          #period-arrow{
            transform: rotate(180deg);
              width: 16px;
          }
        </style>
        
        
        <div class="contC">
                            <div id="sticky-price">
                                <div>
                                    <img src="imgs/propiedades_imgs/<?php echo $thumbnail ?>" alt="">
                                </div>
                                <h3 id="nombre-propiedad2"><?php echo $propiedad[nombre]; ?></h3>
                                <div>
                                    <img src="imgs/location-brown.svg" alt="">
                                    <p id="localidad-provincia2"><?php echo $propiedad[localidad] .  . $propiedad[provincia]; ?></p>
                                </div>
                                <span><span class="huespedes"><?php echo $propiedad[huespedes]; ?></span> huéspedes · <span class="dormitorios"><?php echo $propiedad[num_dormitorios]; ?></span> dormitorios · <span class="camas"><?php echo $propiedad[camas]; ?></span> camas · <span class="banos"><?php echo $propiedad[banos]; ?></span> baños</span>

                                <div class="info-box" id="sticky-calendar">
                                    <div>
                                        <img src="imgs/calendar.svg" alt="">
                                    </div>
                                    <div style="position: relative;">

                                        <div id="checkin"><?php echo $_SESSION[checkout_checkin] ?></div>
                                        <img src="imgs/left-arrow.png" alt="" id="period-arrow">
                                        <div id="checkout"><?php echo $_SESSION[checkout_checkout] ?></div>

                                    </div>
                                </div>
                                <table>
                                    <tr>
                                        <td><span id="por-noche">$<?php echo $propiedad[tarifa] ?></span><span>x</span><span id="cant-noches"><?php echo $days_to_stay ?> noches</span></td>
                                        <td id="precio-bruto"><?php echo $importe_total ?></td>
                                    </tr>
                                    <?php

                                    if($descuento!=''){

                                    ?>
                                    <tr>
                                        <td><span>Descuento <?php echo $tipo_descuento ?> (<?php echo $descuento ?>%)</span></td>
                                        <td id="dcto">-<?php echo $se_ahorra ?></td>
                                    </tr>
                                    <?php

                                    }

                                    ?>
                                    <tr>
                                        <td><span>Tarifa Limpieza</td>
                                        <td id="fee">15</td>
                                    </tr>
                                </table>
                                <div id="total-cont">
                                    <strong>Total</strong>
                                    <strong id="precio-final">$<?php echo $precio_final ?></strong>
                                </div>
                            </div>
                    </div>`;

        // Armar un custom HTML para esta parte
        $mail->Body = $cuerpo_mail;

        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

        

    }


    public function eliminarUsuario($id){
    
      global $pdo;

        $sql = "UPDATE usuarios SET estado=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([0, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
		
    }

    public function activarUsuario($id){
    
      global $pdo;

        $sql = "UPDATE usuarios SET estado=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([1, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
		
    }

    public function crearLocalidad($nombre, $provincia){
      global $pdo;
      $q = "INSERT INTO localidades (nombre, provincia) VALUES (?,?)";
            
      $stmt= $pdo->prepare($q);
      $stmt->execute([$nombre, $provincia]);
      if($stmt){
          return '{"error": 0}';
      }else{
          return '{"error": 1}';
      }
    }

    public function eliminarLocalidad($id){
      global $pdo;

		  $q = $pdo->prepare("DELETE FROM localidades WHERE id =:id");
      $q->execute(['id' => $id]); 
      
      if($q){
          return '{"error": 0}';
      }else{
          return '{"error": 1}';
      }

    }

    public function actualizarLocalidad($id, $nombre, $provincia){
      global $pdo;

        $sql = "UPDATE localidades SET nombre=?, provincia=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nombre, $provincia, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
    }

    public function actualizarDisenador($id, $nombre, $descripcion, $img_name){
      global $pdo;

        $sql = "UPDATE disenadores SET nombre=?, descripcion=?, img=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nombre, $descripcion, $img_name, $id]);

        if($stmt){
            return '{"error": 0}';
        }else{
            return '{"error": 1}';
        }
    }

    public function crearArtista($nombre, $descripcion, $img_name){
      
      global $pdo;
      $q = "INSERT INTO disenadores (nombre, descripcion, img) VALUES (?,?,?)";
        
        $stmt= $pdo->prepare($q);
        $stmt->execute([$nombre, $descripcion, $img_name]);
        if($stmt){
            $last_id = $pdo->lastInsertId();
            return '{"error": 0, "id":'.$last_id.'}';
        }else{
            return '{"error": 1, "id":""}';
        }

    }

    public function eliminarArtista($id){
      global $pdo;

      // Eliminamos la foto vieja
      // $q = $pdo->prepare("SELECT * FROM disenadores WHERE id=:id");
      // $q->execute(['id' => $id]); 
      // $q = $q->fetch();
      // $prev_img = $q['img'];
      // echo 'prev img: '. $prev_img;
      // $path = 'http://localhost/reforma/imgs/disenadores/'.$prev_img;

      // if (file_exists($path)) {
      //     unlink($path);
      //     echo '{"error": 10}'; 
      // }else{
      //     echo '{"error": 11}'; 
      // }

      $q = $pdo->prepare("DELETE FROM disenadores WHERE id =:id");
      $q->execute(['id' => $id]); 
      
      if($q){
          return '{"error": 0}';
      }else{
          return '{"error": 1}';
      }

    }


}

?>