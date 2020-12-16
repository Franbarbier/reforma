


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

function nueva_propiedad() {
    
    
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