var global_propiedades;
var global_disenadores;
var global_localidades;
var global_usuarios;

// for (img in galeria) {
//     html += comp_img_carrousel(galeria[img])
//     htmlGaleriaExpand += imgs_galeria_grande(galeria[img])
// }
// function imgs_galeria_grande(img) {
//     return '<div class="galeria-grande carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
// }

function get_object_by_id(id, objects){
    for(obj in objects){
        if(id == objects[obj].id){
            return objects[obj]
        }
    }
}



function row_propiedad(p) {

    if(p.galeria!=''){
        var thumbnail = JSON.parse(p.galeria)[0]
    }else{
        var thumbnail = ''
    }

    return `<div id="id-prop" class="row-propiedad" data-id="${p.id}">
                <div>
                    <div class="foto-prop">
                        <img src="../imgs/propiedades_imgs/${thumbnail}">
                    </div>
                    <div class="nombre-prop">
                        <h3>${p.nombre}</h3>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-prop" href="../apartado.php?id=2">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="editar-prop">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="delete-prop">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}

function ver_propiedades(html) {
    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')

    return `<div id="ver_propiedades">
                <div>
                    <h2>Propiedades</h2>
                    <button id="crear-propiedad">SUBIR PROPIEDAD</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

// FUNCIONES DE DELETE

$(document).on('click', '.delete-prop', function () {
    let id = $(this).parents('.row-propiedad').attr('id')
    delete_prop(id)
})

function delete_prop(id) {
    var r = confirm("Desea eliminar esta propiedad?");
        if (r == true) {
            console.log('eliminado')
            fetch('../php/api/globales.php?func=eliminarUsuario') 
            .then(function (response) {
                return response.text();
            })
            .then(function (res) {
                console.log(res)
                
            });
        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.delete-user', function () {
    let id = $(this).parents('.row-usuario').attr('id')
    delete_user(id)
})

function delete_user(id) {
    var r = confirm("Desea eliminar este usuario?");
        if (r == true) {
            console.log('eliminado')

            fetch('../php/api/globales.php?func=eliminarUsuario&id='+id) 
            .then(function (response) {
                return response.text();
            })
            .then(function (res) {
                console.log(res)
                
            });



        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.eliminar-loc', function () {
    let id = $(this).parents('.row-propiedad').attr('id')
    delete_localidad(id)
})

function delete_localidad(id) {
    var r = confirm("Desea eliminar esta localidad?");
        if (r == true) {
            console.log('eliminado')
        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.eliminar-artista', function () {
    let id = $(this).parents('.row-propiedad').attr('id')
    delete_artist(id)
})

function delete_artist(id) {
    var r = confirm("Desea eliminar este artista?");
        if (r == true) {
            console.log('eliminado')
        } else {
            console.log('cancelado')
        }
}

// TERMINA FUNCIONES DE DELETE


function li_ameniti(key, value, id, selected) {
    var clase = ''
    if(selected){
        clase = 'ameniti-selected'
    }
    return `<li class="${clase}" data-id="${id}"><img src="../${value}" alt=""><p>${key}</p></li>`
}

function nueva_propiedad(id) {

    var prop = {"amenities":"[]","banos":"","camas":"","concepto_espacio":"","coordenadas":"","distribucion_camas": "","galeria":"","huespedes":"","id":"", "id_disenador": "","id_localidad":"","localidad":"", "nombre":"","normas":"","politica":"","provincia":"","seguridad":"","tarifa":""}
    var btn_text = 'subir';
    var amenities = JSON.parse(prop.amenities)
    var latitud = ''
    var longitud = ''


    if (id != undefined) {
        prop = get_object_by_id(id, global_propiedades)
        console.log('Propiedad, la tenemos! ', prop)
        btn_text = 'actualizar'
        if(prop.amenities==''){
            prop.amenities = '[]'
        }
        amenities = JSON.parse(prop.amenities)
        // Parseamos a int el array
        for(val in amenities){
            amenities[val] = parseInt(amenities[val])
        }

        if(prop.coordenadas==''){
            prop.coordenadas = '[]'
        }
        var coordenadas = JSON.parse(prop.coordenadas)
        latitud = coordenadas[0]
        longitud = coordenadas[1]

        var html_dormitorios = '';
        var dormitorios = JSON.parse(prop.distribucion_camas)

        var c = 0;
        for(d in dormitorios){
            html_dormitorios += camas_dormitorios(c, dormitorios[d].descripcion, dormitorios[d].img)
            c+=1
        }

        // {"dormitorio": "Dormitorio 1", "descripcion": "Cama matrimonial", "img": "double-bed"}
    }


    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')
    let servicios = {
        'Cocina completa': 'imgs/icons/kitchen.svg',
        'Lavadora': 'imgs/icons/lavanderia.svg',
        'Secadora': 'imgs/icons/secador.svg',
        'Ascensor': 'imgs/icons/ascensor.svg',
        'Calefaccion': 'imgs/icons/heater.svg',
        'Aire Acondicionado': 'imgs/icons/air-conditioner.svg',
        'Bañera': 'imgs/icons/bath.svg',
        'Smart TV': 'imgs/icons/smart-tv.svg',
        'Pileta': 'imgs/icons/swimming.svg',
        'Gimnasio': 'imgs/icons/gym.svg',
        'Wifi': 'imgs/icons/wifi.svg',
        'Espacio para estudio/trabajo': 'imgs/icons/work-space.svg',
        'Aparcamiento gratuito en la calle':'imgs/icons/parking.svg',
        'Aparcamiento de pago fuera de las instalaciones':'imgs/icons/barrier.svg'
    }
    
    var html_amenities = '';

    var c = 0;
    for(s in servicios){
        c+=1;
        var selected = false;
        if(amenities.includes(c)){
            selected = true
        }
        html_amenities += li_ameniti(s, servicios[s], c, selected)
    }

    // 
    var html_localidades = ''
    for(l in global_localidades){
        var selected = ''
        loc = global_localidades[l]
        if(loc.id==prop.id_localidad){
            selected = 'selected'
        }
        html_localidades += `<option value="${loc.id}" ${selected}>${loc.nombre } (${loc.provincia})</option>`
    }

    var html_disenadores = ''
    for(d in global_disenadores){
        var selected = ''
        dis = global_disenadores[d]
        if(dis.id==prop.id_disenador){
            selected = 'selected'
        }
        html_disenadores += `<option value="${dis.id}" ${selected}>${dis.nombre}</option>`
    }
    
    // Object.entries(servicios).forEach(([key, value]) =>  html += li_ameniti( key, value ))
    
    // $('#amenities ul').append('<li><img src="../'+ value +'" alt=""><p>'+ key +'</p></li>')


    return `<div id="crear_propiedad">
                <div>
                    <h2>Nueva propiedad</h2>
                    <input id="p-id" value="${prop.id}" type="hidden">
                </div>
                <div>
                    <div id="n-nombre">
                        <label for="">Nombre</label>
                        <input class="grey-input" type="text" value="${prop.nombre}" id="p-nombre">
                    </div>
                    <div id="n-localidad">
                        <label for="">Localidad</label>
                        <select name="" class="grey-input" id="p-localidad">
                            ${html_localidades}
                        </select>
                    </div>
                    <div class="house-display">
                        <div>
                            <img src="../imgs/users-handmade.svg" alt="">
                            <p>Huespedes</p>
                            <input class="grey-input" min="1" type="number" value="${prop.huespedes}" id="p-huespedes">
                        </div>
                        <div>
                            <img src="../imgs/ducha-handmade.svg" alt="">
                            <p>Baños</p>
                            <input class="grey-input" min="1" type="number" value="${prop.banos}" id="p-banos">
                        </div>
                        <div id="dorms">
                            <img src="../imgs/cama-handmade.svg" alt="">
                            <p>Camas</p>
                            <input class="grey-input" min="1" type="number" value="${prop.camas}" id="p-camas">
                        </div>
                        <div id="n-camas">
                            ${html_dormitorios}                            
                        </div>
                    </div>
                    <div id="amenities">
                        <p>Amenities</p>
                        <ul>
                            ${html_amenities}
                        </ul>
                    </div>
                    <div id="concepto">
                        <p>Concepto</p>
                        <div class="grey-input" contenteditable="true" id="p-concepto_espacio">${prop.concepto_espacio}</div>
                    </div>
                    <div class="lasts">
                        <div>
                            <p>Diseñador</p>
                            <select class="grey-input" name="" id="p-disenador">
                            ${html_disenadores}
                            </select>
                        </div>
                        <div>
                            <p>Latitud</p>
                            <input class="grey-input" type="text" value="${latitud}" id="p-latitud">
                            <p>Longitud</p>
                            <input class="grey-input" type="text" value="${longitud}" id="p-longitud">
                            
                        </div>
                    </div>
                    <div class="lasts">

                       <!-- <div>
                            <p>Tarifa por Limpieza</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number">
                            </div>
                        </div> -->

                        <div>
                            <p>Tarifa por noche</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number" value="${prop.tarifa}" id="p-tarifa">
                            </div>
                        </div>
                    </div>
                    <div id="buttons-cont">
                        <button class="grey-input" id="descartar-cambios">DESCARTAR CAMBIOS</button>
                        <button id="${btn_text}-propiedad">${btn_text} propiedad</button>
                    </div>
                </div>
            </div>`
}



$(document).on('click', '#amenities li', function () {
    $(this).toggleClass('ameniti-selected')
})

function camas_dormitorios(index, descripcion='', img='') {
    return `<div class="dormitorio">
                <p id="dormitorio${index+1}">Dormitorio ${index+1}</p>
                <div>
                    ${tipo_de_cama(descripcion, img)}
                </div>
                <!-- <span>Agregar cama en el dormitorio...</span> -->
            </div>`
}

function tipo_de_cama(descripcion='', img='') {

    var imgs = ['double-bed', 'single-bed', 'sofa']
    var html_imgs = ''
    for(i in imgs){
        var selected = ''
        if(imgs[i]==img){
            selected = 'selected'
        }
        html_imgs += `<option value="${imgs[i]}" ${selected}>${imgs[i]}</option>`
    }

    return `<div class="camas-en-dormis">
                <div class="delete-bed"><img src="../imgs/letter-x.svg"></div>
                <input class="grey-input dormi-descri" style="width:155px" value="${descripcion}">
                <select class="grey-input cama-img" name="">
                ${html_imgs}
                </select>
            </div>`
}


$(document).on('change', '#dorms input', function () {
    console.log(parseInt($(this).val()))
    var rooms = parseInt($(this).val())
    rooms -= $('.dormitorio').length
    var html = '';
    for (let c = 0; c < rooms; c++) {
        var index = $('.dormitorio').length
        $('#n-camas').append(camas_dormitorios(index))
    }
    console.log(html)

})
$(document).on('click', '.dormitorio>span', function () {
    $(this).parent().find('>div').append(tipo_de_cama()   )
 }) 


$(document).on('click', '.delete-bed', function () {
    $(this).closest('.dormitorio').remove();
    $('.dormitorio').each(function(){
        var num_dorm = $(this).index()+1
        $(this).find('p').html('Dormitorio ' + num_dorm)
    })
})



function row_usuario(user) {

    var clase = ''
    if(user.estado==0){
        clase = 'us-inactive'
    }

    return `<div id="${user.id}" class="row-usuario ${clase}">
                <div>
                    <div class="id-usuario">
                        <p>${user.id}</p>
                    </div>
                    <div class="nombre-usuario">
                        <p>${user.nombre} ${user.apellido}</p>
                    </div>
                    <div class="mail-usuario">
                        <p>${user.mail}</p>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-usuario">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="delete-user">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}

function ver_usuarios(html) {
    $('aside li').removeClass('activeLi')
    $('#usuarios').addClass('activeLi')

    return `<div id="ver_usuarios">
                <div>
                    <h2>Usuarios</h2>
                    <!-- <button id="crear-usuario">CREAR USUARIO</button> -->
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

function row_localidad(id) {
    return `<div id="${id}" class="row-localidad">
                <div>
                    <div class="id-loc">
                        <p>1</p>
                    </div>
                    <div class="nombre-loc">
                        <p>Nombre Localidad</p>
                    </div>
                    <div class="nombre-prov">
                        <p>Provincia asignada</p>
                    </div>
                </div>
                <div class="options">
                    <a class="editar-loc">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="eliminar-loc">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}


function ver_localidades() {
    $('aside li').removeClass('activeLi')
    $('#localidades').addClass('activeLi')
    var html = '';
    for (let index = 0; index < 5; index++) {
        html += row_localidad()
    }

    return `<div id="ver_localidades">
                <div>
                    <h2>Localidades</h2>
                    <button id="crear-nueva-localidad">NUEVA LOCALIDAD</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}


// Componente main modal editar artistas
function modal_crear_localidad(){

    $(document).on('click', '#crear-nueva-localidad', function(){
        $('#crear-localidad-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-localidad-modal .descartar-cambios, #crear-localidad-modal .mm-cerrar', function(){
        $('#crear-localidad-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-localidad-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="crear-localidad-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <h5>Crear localidad</h5>
                        <input class="grey-input" type="text" placeholder="Nueva localidad">
                        <select class="grey-input">
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                        </select>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}



function row_artista(id) {
    return `<div id="${id}" class="row-artista">
                <div>
                    <div class="id-artista">
                        <p>1</p>
                    </div>
                    <div class="foto-artista">
                        <img src="https://www.agora-gallery.com/advice/wp-content/uploads/Robert-Ellison.jpg">
                    </div>
                    <div class="nombre-artista">
                        <p>Nombre Artista</p>
                    </div>
                </div>
                <div class="options">
                    <a class="editar-artista">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="eliminar-artista">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}


function ver_artistas() {
    $('aside li').removeClass('activeLi')
    $('#artistas').addClass('activeLi')
    var html = '';
    for (let index = 0; index < 5; index++) {
        html += row_artista()
    }

    return `<div id="ver_artistas">
                <div>
                    <h2>Artistas</h2>
                    <button id="crear-artista">NUEVO ARTISTA</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}


// Componente main modal editar artistas
function modal_edit_artista(){

    $(document).on('click', '.editar-artista', function(){
        $('#edit-artista-modal').fadeIn(100)
    })
    $(document).on('click', '#edit-artista-modal .descartar-cambios, #edit-artista-modal .mm-cerrar', function(){
        $('#edit-artista-modal').fadeOut(100)
    })

    $(document).on('click', '#edit-artista-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="edit-artista-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div class="profile-img">
                            <input type="file" id="myFile" onchange="loadFile(event)" name="filename" accept="image/*">
                            <img src="../imgs/no-user-pic.jpg" alt="" id="p-pic" class="p-pic">
                            <label for="myFile"></label>
                        </div>
                        <h4 contenteditable class="mm-titulo">Nombre Artista</h4>
                    </div>
                    <div>
                        <textarea placeholder="Sobre el artista..."></textarea>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}

// Componente main modal crear artistas
function modal_crear_artista(){

    $(document).on('click', '#crear-artista', function(){
        $('#crear-artista-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-artista-modal .descartar-cambios, #crear-artista-modal .mm-cerrar', function(){
        $('#crear-artista-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-artista-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="crear-artista-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div class="profile-img">
                            <input type="file" id="myFile2" onchange="loadFile2(event)" name="filename" accept="image/*">
                            <img src="../imgs/no-user-pic.jpg" alt="" id="p-pic2" class="p-pic">
                            <label for="myFile2"></label>
                        </div>
                        <input type="text" class="grey-input" placeholder="Nombre del artista">
                    </div>
                    <div>
                        <textarea placeholder="Sobre el artista..."></textarea>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}


// Componente main modal editar lcoalidades
function modal_edit_localidad(){

    $(document).on('click', '.editar-loc', function(){
        $('#edit-localidad-modal').fadeIn(100)
    })
    $(document).on('click', '#edit-localidad-modal .descartar-cambios, #edit-localidad-modal .mm-cerrar', function(){
        $('#edit-localidad-modal').fadeOut(100)
    })

    $(document).on('click', '#edit-localidad-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="edit-localidad-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <h5>Editar localidad</h5>
                        <input class="grey-input" type="text" value="Localidad actual">
                        <select class="grey-input">
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                            <option>Argentina</option>
                        </select>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                </div>
            </div>` 
}

function actualizar_propiedad(){

    var id = $('#p-id').val()
    var nombre = $('#p-nombre').val()
    var id_localidad = $('#p-localidad').val()
    var huespedes = $('#p-huespedes').val()
    var banos = $('#p-banos').val()
    var camas = $('#p-camas').val()
    
    var concepto_espacio = $('#p-concepto_espacio').html()
    var distribucion_camas = []
    $('.dormitorio').each(function(){
        var des = $(this).find('.dormi-descri').val()
        var img = $(this).find('.cama-img').val()
        distribucion_camas.push({"descripcion":des,"img":img})
    })
    distribucion_camas = JSON.stringify(distribucion_camas)
    var amenities = []
    $('#amenities li').each(function(){
        if($(this).hasClass('ameniti-selected')){
            amenities.push($(this).attr('data-id'))
        }
    })
    amenities = JSON.stringify(amenities)
    
    var id_disenador = $('#p-disenador').val()
    var latitud = $('#p-latitud').val()
    var longitud = $('#p-longitud').val()
    var tarifa = $('#p-tarifa').val()
    var coordenadas = [latitud, longitud]
    coordenadas = JSON.stringify(coordenadas)

    console.log('nombre: ', nombre, ', id_localidad: ', id_localidad, ', huespedes: ', huespedes, ', banos: ', banos, ', camas: ', camas, ', concepto espacio: ', concepto_espacio, ', id_disenador: ', id_disenador, ', latitud: ', latitud, ', longitud: ', longitud, ', tarifa: ', tarifa, ', distribucion camas: ', distribucion_camas, ', amenities: ', amenities)

    $.ajax({
        url:'../php/api/propiedades.php?func=actualizarPropiedad',
        method:'POST',
        cache: false,
        data:{
            id,
            nombre,
            id_localidad,
            huespedes,
            banos,
            camas,
            concepto_espacio,
            distribucion_camas,
            amenities,
            id_disenador,
            coordenadas,
            tarifa
        },
        dataType:'json',
        success:function(res){
            console.log(res)
            if(res.error==0){
                window.location = ''
            }
        }
    });

}


function subir_propiedad(){

    var nombre = $('#p-nombre').val()
    var id_localidad = $('#p-localidad').val()
    var huespedes = $('#p-huespedes').val()
    var banos = $('#p-banos').val()
    var camas = $('#p-camas').val()
    
    var concepto_espacio = $('#p-concepto_espacio').html()
    var distribucion_camas = []
    $('.dormitorio').each(function(){
        var des = $(this).find('.dormi-descri').val()
        var img = $(this).find('.cama-img').val()
        distribucion_camas.push({"descripcion":des,"img":img})
    })
    distribucion_camas = JSON.stringify(distribucion_camas)
    var amenities = []
    $('#amenities li').each(function(){
        if($(this).hasClass('ameniti-selected')){
            amenities.push($(this).attr('data-id'))
        }
    })
    amenities = JSON.stringify(amenities)
    
    var id_disenador = $('#p-disenador').val()
    var latitud = $('#p-latitud').val()
    var longitud = $('#p-longitud').val()
    var tarifa = $('#p-tarifa').val()
    var coordenadas = [latitud, longitud]
    coordenadas = JSON.stringify(coordenadas)

    console.log('nombre: ', nombre, ', id_localidad: ', id_localidad, ', huespedes: ', huespedes, ', banos: ', banos, ', camas: ', camas, ', concepto espacio: ', concepto_espacio, ', id_disenador: ', id_disenador, ', latitud: ', latitud, ', longitud: ', longitud, ', tarifa: ', tarifa, ', distribucion camas: ', distribucion_camas, ', amenities: ', amenities)

    $.ajax({
        url:'../php/api/propiedades.php?func=subirPropiedad',
        method:'POST',
        cache: false,
        data:{
            nombre,
            id_localidad,
            huespedes,
            banos,
            camas,
            concepto_espacio,
            distribucion_camas,
            amenities,
            id_disenador,
            coordenadas,
            tarifa
        },
        dataType:'json',
        success:function(res){
            console.log(res)
            if(res.error==0){
                window.location = ''
            }
        }
    });

}

// Componente main modal editar artistas
function modal_ver_usuario(){

    $(document).on('click', '.ver-usuario', function(){

        // Inicializamos el modal
        var id_usuario = $(this).closest('.row-usuario').attr('id')
        console.log('idusuario: ', id_usuario)
        var este_usuario = get_object_by_id(id_usuario, global_usuarios)
        console.log('este usuario: ', este_usuario)
        $('#mu-id').val(este_usuario.id)
        $('#mu-nombre').val(este_usuario.nombre)
        $('#mu-apellido').val(este_usuario.apellido)
        $('#mu-telefono').val(este_usuario.telefono)
        $('#mu-mail').val(este_usuario.mail)
        $('#mu-pais').val(este_usuario.pais)
        $('#mu-fecha-nacimiento').val(este_usuario.fecha_nacimiento)
        var estado = 'Activo'
        if(este_usuario.estado==0){
            estado = 'Inactivo'
        }
        $('#mu-estado').val(estado)

        $('#ver-usuario-modal').fadeIn(100)
    })
    $(document).on('click', '#ver-usuario-modal .descartar-cambios, #ver-usuario-modal .mm-cerrar', function(){
        $('#ver-usuario-modal').fadeOut(100)
    })

    $(document).on('click', '#ver-usuario-modal', function(e){
        e.stopPropagation()
    })

    

    return `<div id="ver-usuario-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div class="datos-inputs-cont">
                            <label>ID</label>
                            <input disabled type="text" value="" id="mu-id">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Nombre</label>
                            <input disabled type="text" value="Nombre" id="mu-nombre">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Apellido</label>
                            <input disabled type="text" value="Apellido" id="mu-apellido">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Fecha de nacimiento</label>
                            <input disabled type="text" value="03/03/1198" id="mu-fecha-nacimiento">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Telefono</label>
                            <input disabled type="text" value="11 3453-6398" id="mu-telefono">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Mail</label>
                            <input disabled type="text" value="ejemplo@email.com" id="mu-mail">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>País</label>
                            <input disabled type="text" value="Argentina" id="mu-pais">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Estado</label>
                            <input disabled type="text" value="" id="mu-estado">
                        </div>
                    </div>
                    <div>
                        
                    </div>
                    
                </div>
            </div>` 
}

// Componente main modal editar artistas
function modal_crear_usuario(){

    $(document).on('click', '#crear-usuario', function(){
        $('#crear-usuario-modal').fadeIn(100)
    })
    $(document).on('click', '#crear-usuario-modal .descartar-cambios, #crear-usuario-modal .mm-cerrar', function(){
        $('#crear-usuario-modal').fadeOut(100)
    })

    $(document).on('click', '#crear-usuario-modal', function(e){
        e.stopPropagation()
    })

    
    return `<div id="crear-usuario-modal" class="m-modal">
                <div>
                    <div class="mm-cerrar">x</div>

                    
                    <div class="mm-heading">
                        <div>
                            <label>Nombre</label>
                            <input class="grey-input" type="text">
                        </div>
                        <div>
                            <label>Apellido</label>
                            <input class="grey-input" type="text">
                        </div>
                        <div>
                            <label>Fecha de nacimiento</label>
                            <input class="grey-input" type="date">
                        </div>
                        <div>
                            <label>Telefono</label>
                            <input class="grey-input" type="tel">
                        </div>
                        <div>
                            <label>Mail</label>
                            <input class="grey-input" type="email">
                        </div>
                        <div>
                            <label>País</label>
                            <select class="grey-input">
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                                <option>Argentina</option>
                            </select>
                        </div>
                        <div>
                            <label>Contraseña</label>
                            <input class="grey-input" type="password">
                        </div>
                        <div>
                            <label>Repetir contraseña</label>
                            <input class="grey-input" type="password">
                        </div>
                    </div>
                    <aside class="save-buttons">
                        <button class="descartar-cambios">DESCARTAR</button>
                        <button class="guardar-cambios">GUARDAR</button>
                    </aside>
                    
                </div>
            </div>` 
}


var loadFile2 = function(event) {
	$('#p-pic2').attr('src', URL.createObjectURL(event.target.files[0])) ;
    console.log(URL.createObjectURL(event.target.files[0]))
};
var loadFile = function(event) {
	$('#p-pic').attr('src', URL.createObjectURL(event.target.files[0])) ;
    console.log(URL.createObjectURL(event.target.files[0]))
}; 