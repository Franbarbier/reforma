var global_propiedades;
var global_disenadores;
var global_localidades;

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

    var thumbnail = JSON.parse(p.galeria)[0]

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

function li_ameniti(key, value, id, selected) {
    var status = ''
    if(selected){
        status = 'ameniti-selected'
    }
    return `<li data-id="${id}" class="${status}"><img src="../${value}" alt=""><p>${key}</p></li>`
}

function nueva_propiedad(id) {

    var prop = {"amenities":"[]","banos":"","camas":"","concepto_espacio":"","coordenadas":"","distribucion_camas": "","galeria":"","huespedes":"","id":"", "id_disenador": "","id_localidad":"","localidad":"", "nombre":"","normas":"","politica":"","provincia":"","seguridad":"","tarifa":""}
    var btn_text = 'SUBIR PROPIEDAD';
    var amenities = JSON.parse(prop.amenities)
    var latitud = ''
    var longitud = ''


    if (id != undefined) {
        prop = get_object_by_id(id, global_propiedades)
        console.log('Propiedad, la tenemos! ', prop)
        btn_text = 'ACTUALIZAR PROPIEDAD'

        amenities = JSON.parse(prop.amenities)

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
    
    var html = '';

    var c = 0;
    for(s in servicios){
        c+=1;
        var selected = false;
        if(amenities.includes(c)){
            selected = true
        }
        html += li_ameniti(s, servicios[s], c, selected)
    }

    // 
    var html_localidades = ''
    for(l in global_localidades){
        var selected = ''
        loc = global_localidades[l]
        if(loc.id==prop.id_localidad){
            selected = 'selected'
        }
        html_localidades += `<option value="${loc.nombre}" data-id="${loc.id}" ${selected}>${loc.nombre } (${loc.provincia})</option>`
    }
    
    Object.entries(servicios).forEach(([key, value]) =>  html += li_ameniti( key, value ))
    
    // $('#amenities ul').append('<li><img src="../'+ value +'" alt=""><p>'+ key +'</p></li>')


    return `<div id="crear_propiedad">
                <div>
                    <h2>Nueva propiedad</h2>
                </div>
                <div>
                    <div id="n-nombre">
                        <label for="">Nombre</label>
                        <input class="grey-input" type="text" value="${prop.nombre}">
                    </div>
                    <div id="n-localidad">
                        <label for="">Localidad</label>
                        <select name="" class="grey-input" id="">
                            ${html_localidades}
                        </select>
                    </div>
                    <div class="house-display">
                        <div>
                            <img src="../imgs/users-handmade.svg" alt="">
                            <p>Huespedes</p>
                            <input class="grey-input" min="1" type="number" value="${prop.huespedes}">
                        </div>
                        <div>
                            <img src="../imgs/ducha-handmade.svg" alt="">
                            <p>Baños</p>
                            <input class="grey-input" min="1" type="number" value="${prop.banos}">
                        </div>
                        <div id="dorms">
                            <img src="../imgs/cama-handmade.svg" alt="">
                            <p>Dormitorios</p>
                            <input class="grey-input" min="1" type="number" value="${prop.camas}">
                        </div>
                        <div id="n-camas">
                            ${html_dormitorios}                            
                        </div>
                    </div>
                    <div id="amenities">
                        <p>Amenities</p>
                        <ul>
                            ${html}
                        </ul>
                    </div>
                    <div id="concepto">
                        <p>Concepto</p>
                        <div class="grey-input" contenteditable="true">${prop.concepto_espacio}</div>
                    </div>
                    <div class="lasts">
                        <div>
                            <p>Diseñador</p>
                            <select class="grey-input" name="" id="">
                                <option value="">Diseñador 1</option>
                                <option value="">Diseñador 2</option>
                                <option value="">Diseñador 3</option>
                            </select>
                        </div>
                        <div>
                            <p>Latitud</p>
                            <input class="grey-input" type="text" value="${latitud}">
                            <p>Longitud</p>
                            <input class="grey-input" type="text" value="${longitud}">
                            
                        </div>
                    </div>
                    <div class="lasts">

                        <div style="display:none">
                            <p>Tarifa por Limpieza</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number">
                            </div>
                        </div>

                        <div>
                            <p>Tarifa por noche</p>

                            <div>
                                <span>$</span>
                                <input class="grey-input" min="1" type="number" value="${prop.tarifa}">
                            </div>
                        </div>
                    </div>
                    <div id="buttons-cont">
                        <button class="grey-input" id="descartar-cambios">DESCARTAR CAMBIOS</button>
                        <button id="subir-propiedad">${btn_text}</button>
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
                <input class="grey-input" style="width:155px" value="${descripcion}">
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



function row_usuario() {
    return `<div id="id-us" class="row-usuario">
                <div>
                    <div class="id-usuario">
                        <p>1</p>
                    </div>
                    <div class="nombre-usuario">
                        <p>Nombre Usuario</p>
                    </div>
                    <div class="mail-usuario">
                        <p>ejemplo@gmail.com</p>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-prop">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="editar-prop">
                        <img src="../imgs/delete.svg">
                    </a>
                </div>
            </div>`
}

function ver_usuarios() {
    $('aside li').removeClass('activeLi')
    $('#usuarios').addClass('activeLi')
    var html = '';
    for (let index = 0; index < 5; index++) {
        html += row_usuario()
    }

    return `<div id="ver_usuarios">
                <div>
                    <h2>Usuarios</h2>
                    <button id="crear-usuario">CREAR USUARIO</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

function row_localidad() {
    return `<div id="loc-us" class="row-localidad">
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
                    <button id="crear-usuario">NUEVA LOCALIDAD</button>
                </div>
                <div>
                    ${html}
                </div>
            </div>`
}

function row_artista() {
    return `<div id="artista-us" class="row-artista">
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
                    <button id="crear-usuario">NUEVO ARTISTA</button>
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
                        <div class="foto-artist">
                            <img src="https://www.agora-gallery.com/advice/wp-content/uploads/Robert-Ellison.jpg">
                        </div>
                        <h4 class="mm-titulo">Nombre Artista</h4>
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

// Componente main modal editar artistas
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