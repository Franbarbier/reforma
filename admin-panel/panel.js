
// for (img in galeria) {
//     html += comp_img_carrousel(galeria[img])
//     htmlGaleriaExpand += imgs_galeria_grande(galeria[img])
// }
// function imgs_galeria_grande(img) {
//     return '<div class="galeria-grande carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
// }



function row_propiedad(id) {
    return `<div id="6" class="row-propiedad">
                <div>
                    <div class="foto-prop">
                        <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg">
                    </div>
                    <div class="nombre-prop">
                        <h3>Nombre de la prop</h3>
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

function ver_propiedades() {
    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')
    var html = '';
    for (let index = 0; index < 5; index++) {
        html += row_propiedad()
    }

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
        } else {
            console.log('cancelado')
        }
}

$(document).on('click', '.delete-user', function () {
    let id = $(this).parents('.row-propiedad').attr('id')
    delete_user(id)
})

function delete_user(id) {
    var r = confirm("Desea eliminar este usuario?");
        if (r == true) {
            console.log('eliminado')
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


function li_ameniti(key, value) {
    return `<li><img src="../${value}" alt=""><p>${key}</p></li>`
}

function nueva_propiedad(id) {

    if (id == undefined) {
        // ir a buscar los datos de la propiedad y rellenar los campos
        // cambiar el boton de confirmacion a "guardar cambios"
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
    
    Object.entries(servicios).forEach(([key, value]) =>  html += li_ameniti( key, value ))

    // $('#amenities ul').append('<li><img src="../'+ value +'" alt=""><p>'+ key +'</p></li>')


    return `<div id="crear_propiedad">
                <div>
                    <h2>Nueva propiedad</h2>
                </div>
                <div>
                    <div id="n-nombre">
                        <label for="">Nombre</label>
                        <input class="grey-input" type="text">
                    </div>
                    <div id="n-localidad">
                        <label for="">Localidad</label>
                        <select name="" class="grey-input" id="">
                            <option value="">Argentin</option>
                            <option value="">Argentin</option>
                            <option value="">Argentin</option>
                        </select>
                    </div>
                    <div class="house-display">
                        <div>
                            <img src="../imgs/users-handmade.svg" alt="">
                            <p>Huespedes</p>
                            <input class="grey-input" min="1" type="number">
                        </div>
                        <div>
                            <img src="../imgs/ducha-handmade.svg" alt="">
                            <p>Baños</p>
                            <input class="grey-input" min="1" type="number">
                        </div>
                        <div id="dorms">
                            <img src="../imgs/cama-handmade.svg" alt="">
                            <p>Dormitorios</p>
                            <input class="grey-input" min="1" type="number">
                        </div>
                        <div id="n-camas">
                            <!-- <div class="dormitorio">
                                <p>Dormitorio 1</p>
                                <div class='camas-en-dormis'>
                                    <select class="grey-input" name="" id="">
                                        <option value="">Matrimonial</option>
                                        <option value="">Individual</option>
                                        <option value="">Sofa/Colchón</option>
                                    </select>
                                    <select class="grey-input" name="" id="">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                    </select>
                                </div>
                                
                            </div> -->
                            
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
                        <textarea class="grey-input"></textarea>
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
                            <p>Ubicacion</p>
                            <input class="grey-input" type="text">
                            
                        </div>
                    </div>
                    <div class="lasts">
                        <div>
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
                                <input class="grey-input" min="1" type="number">
                            </div>
                        </div>
                    </div>
                    <div id="buttons-cont">
                        <button class="grey-input" id="descartar-cambios">DESCARTAR CAMBIOS</button>
                        <button id="subir-propiedad">SUBIR PROPIEDAD</button>
                    </div>
                </div>
            </div>`
}



$(document).on('click', '#amenities li', function () {
    $(this).toggleClass('ameniti-selected')
})

function camas_dormitorios(index) {
    return `<div class="dormitorio">
                <p id="dormitorio${index+1}">Dormitorio ${index+1}</p>
                <div>
                    ${tipo_de_cama()}
                </div>
                <span>Agregar cama en el dormitorio...</span>
            </div>`
}

function tipo_de_cama() {
    return `<div class="camas-en-dormis">
                <div class="delete-bed"><img src="../imgs/letter-x.svg"></div>
                <select class="grey-input" name="" id="">
                    <option value="">Matrimonial</option>
                    <option value="">Individual</option>
                    <option value="">Sofa/Colchón</option>
                </select>
                <select class="grey-input" name="" id="">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                    <option value="">6</option>
                    <option value="">7</option>
                    <option value="">8</option>
                    <option value="">9</option>
                </select>
            </div>`
}

// function tipo_de_cama() {
//     return `<div class="camas-en-dormis">
//                 <table>
//                     <tr>
//                         <td>Individual</td>
//                         </tr>
//                         <td></td>   
//                     <tr></tr> 
//                     <tr></tr> 
//                 </table> 
//             </div>`
// }

$(document).on('change', '#dorms input', function () {
    console.log(parseInt($(this).val()))
    var rooms = parseInt($(this).val())
    var html = '';
    for (let index = 0; index < rooms; index++) {
        html += camas_dormitorios(index)
    }
    console.log(html)
    $('#n-camas').html(html)

})
$(document).on('click', '.dormitorio>span', function () {
    $(this).parent().find('>div').append(tipo_de_cama()   )
 }) 


$(document).on('click', '.delete-bed', function () {
    $(this).closest('.camas-en-dormis').remove();
})



function row_usuario(id) {
    return `<div id="${id}" class="row-usuario">
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
                    <a class="ver-usuario">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="delete-user">
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
                    <button id="crear-usuario">NUEVA LOCALIDAD</button>
                </div>
                <div>
                    ${html}
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

// Componente main modal editar artistas
function modal_ver_usuario(){

    $(document).on('click', '.ver-usuario', function(){
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
                            <input disabled type="text" value="206">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Nombre</label>
                            <input disabled type="text" value="Nombre">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Apellido</label>
                            <input disabled type="text" value="Apellido">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Fecha de nacimiento</label>
                            <input disabled type="text" value="03/03/1198">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Telefono</label>
                            <input disabled type="text" value="11 3453-6398">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>Mail</label>
                            <input disabled type="text" value="ejemplo@email.com">
                        </div>
                        <div class="datos-inputs-cont">
                            <label>País</label>
                            <input disabled type="text" value="Argentina">
                        </div>
                    </div>
                    <div>
                        
                    </div>
                    
                </div>
            </div>` 
}