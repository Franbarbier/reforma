<?php

if($_GET['func']=='subirImgArtista'){
    echo 'llegaste aca';
    // Intentamos subir la imagen
    try{
	
        // Mover el archivo subido al directorio correspondiente
        $target_path = 'imgs/disenadores/'. basename($_FILES['file']['name']);
       
            move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        
        echo 'subido con exito';
    
    }catch(Excaption $e){
        echo $e;	
        echo 'error al subir';
    }
}

if($_GET['func']=='subirImgPropiedad'){

    echo 'llegaste aca';
    // Intentamos subir la imagen
    try{
	
        // Mover el archivo subido al directorio correspondiente
        $target_path = 'imgs/propiedades_imgs/'. basename($_FILES['file']['name']);
       
            move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        
        echo 'subido con exito';
    
    }catch(Excaption $e){
        echo $e;	
        echo 'error al subir';
    }

}

?>