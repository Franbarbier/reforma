


// for (img in galeria) {
//     html += comp_img_carrousel(galeria[img])
//     htmlGaleriaExpand += imgs_galeria_grande(galeria[img])
// }
// function imgs_galeria_grande(img) {
//     return '<div class="galeria-grande carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
// }

function row_propiedad() {
    return `<div id="id-prop" class="row-propiedad">
                <div>
                    <div class="foto-prop">
                        <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg">
                    </div>
                    <div class="nombre-prop">
                        <h3>Nombre de la prop</h3>
                    </div>
                </div>
                <div class="options">
                    <a class="ver-prop">
                        <img src="../imgs/view.svg">
                    </a>
                    <a class="editar-prop">
                        <img src="../imgs/pencil.svg">
                    </a>
                    <a class="editar-prop">
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

function nueva_propiedad(params) {

    $('aside li').removeClass('activeLi')
    $('#propiedades').addClass('activeLi')

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


Object.entries(servicios).forEach(([key, value]) => $('#amenities ul').append('<li><img src="../'+ value +'" alt=""><p>'+ key +'</p></li>') )

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