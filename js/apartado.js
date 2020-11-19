var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
const id_propiedad = urlParams.get('id')

// var global_checkin;
// var global_checkout;

// if (urlParams.get('check_in') != '') {
//     global_checkin = urlParams.get('check_in')
//     // $('#checkin').html(global_checkin)
// }

// if (urlParams.get('check_out') != '') {
//     global_checkout = urlParams.get('check_out')
//     // $('#checkout').html(global_checkout)
// }


var this_amenities;

// Empieza handlers

$(document).on('click', '.prop-recomendada', function () {
    window.location = 'apartado.php?id=' + $(this).attr('id')
})

// Termina handlers

// Traemos la info de la propiedad
function verPropiedad(id) {
    fetch('php/api/propiedades.php?func=verPropiedad&id=' + id)
        .then(function (response) {
            return response.json();
        })
        .then(function (propiedad) {
            // Pasamos el objeto recibido y lo mostramos en el documento
            render_apartado(propiedad)
        });
}

verPropiedad(id_propiedad)

// Funcion para renderizar el apartado con la info de la propiedad
function render_apartado(propiedad) {
    var nombre_propiedad = document.querySelector('h1')
    nombre_propiedad.innerHTML = propiedad.nombre

    var localidad_provincia = document.getElementById('localidad-provincia')
    localidad_provincia.innerHTML = propiedad.localidad + ', ' + propiedad.provincia

    var huespedes = $('.huespedes')
    huespedes.html(propiedad.huespedes)

    var tarifa = document.getElementById('tarifa')
    tarifa.innerHTML = propiedad.tarifa

    tarifa_final()

    global_por_noche = tarifa

    var concepto = document.getElementById('concepto-text')
    concepto.innerHTML = propiedad.concepto_espacio

    var distribucion_camas = JSON.parse(propiedad.distribucion_camas)

    var dormitorios = $('.dormitorios')
    dormitorios.html(distribucion_camas.length)
    console.log(propiedad.distribucion_camas)


    var banos = $('.banos')
    var banos_text = 'Baño'
    if (parseInt(propiedad.banos) > 1) {
        banos_text = 'Baños'
    }
    banos.html(propiedad.banos + ' ' + banos_text)

    this_amenities = JSON.parse(propiedad.amenities)

    html = ''
    for (c in distribucion_camas) {
        html += comp_distribucion(distribucion_camas[c].dormitorio, distribucion_camas[c].descripcion, distribucion_camas[c].img)
    }
    $('#distribucion_de_camas').html(html)

    // renderizamos las imgs de la galeria
    var galeria = JSON.parse(propiedad.galeria)
    var html = ''
    for (img in galeria) {
        html += comp_img_carrousel(galeria[img])
    }

    console.log('galeria: ' + html)

    $('#cont-carousel').load('slider-apartado.php', { galeria: html })

    // Traemos la info del diseñador
    fetch('php/api/globales.php?func=verDisenador&id=' + propiedad.id_disenador)
        .then(function (response) {
            return response.json();
        })
        .then(function (disenador) {
            console.log(disenador)

            document.getElementById('disenador-nombre').innerHTML = disenador.nombre
            document.getElementById('disenador-descripcion').innerHTML = disenador.descripcion
            document.getElementById('disenador-img').src = disenador.img

        });


    // Traemos las amenities
    fetch('php/api/globales.php?func=verAmenities')
        .then(function (response) {
            return response.json();
        })
        .then(function (amenities) {
            console.log(amenities)

            // Por cada amenitie inyectamos un componente de amenity. Si el amenity no lo tiene esta propiedad, agregamos el class "lacks"
            var html = ''
            for (c in amenities) {
                var status = '';
                if (!this_amenities.includes(amenities[c].id)) {
                    status = 'lacks'
                }
                html += comp_amenity(amenities[c].img, amenities[c].nombre, status)
            }
            $('#amenities-list').html(html)
        });

    // Traemos las resenas
    fetch('php/api/globales.php?func=verResenas&id_propiedad=' + id_propiedad + '&limit=' + 4)
        .then(function (response) {
            return response.json();
        })
        .then(function (resenas) {
            console.log(resenas)

            // Si no hay resenas, ocultamos esa seccion
            if (resenas.length == 0) {
                $('#reseñas').html('')
            } else {

                // Las inyectamos en el html
                var html = ''
                for (c in resenas) {
                    html += comp_resena(resenas[c].usuario, resenas[c].detalle, resenas[c].fecha)
                }
                $('#resenas-cont').html(html)
            }
        });


    // Traemos propiedades recomendadas
    fetch('php/api/globales.php?func=verRecomendados&id_propiedad=' + id_propiedad + '&localidad=' + propiedad.localidad + '&limit=' + 4)
        .then(function (response) {
            return response.json();
        })
        .then(function (recomendados) {
            console.log(recomendados)

            var html = ''
            // Las inyectamos en el html
            for (c in recomendados) {
                var thumbnail = "'imgs/propiedades_imgs/" + JSON.parse(recomendados[c].galeria)[0] + "'"
                var dormitorios = JSON.parse(recomendados[c].distribucion_camas).length
                html += comp_recomendado(recomendados[c].nombre, recomendados[c].localidad, recomendados[c].provincia, recomendados[c].huespedes, recomendados[c].banos, dormitorios, recomendados[c].camas, thumbnail, recomendados[c].id)
            }
            $('#otros-alojamientos').html(html)
        });
}

// Seccion de componentes
function comp_distribucion(dormitorio, descripcion, img) {
    return '<div><img src="imgs/' + img + '.svg" alt=""><h5>' + dormitorio + '</h5><p>' + descripcion + '</p></div>'
}

function comp_amenity(img, nombre, status) {
    return '<li class="' + status + '"><img src="imgs/icons/' + img + '.svg" alt=""><p>' + nombre + '</p></li>'
}

function comp_resena(usuario, detalle, fecha) {
    return '<div> <div> <div> <img src="" alt=""> </div> <div> <p><b>' + usuario + '</b></p> <span>' + fecha + '</span> </div> </div> <p>' + detalle + '</p> </div>'
}

function comp_recomendado(nombre, localidad, provincia, huespedes, banos, dormitorios, camas, thumbnail, id) {
    if (parseInt(banos) > 1) {
        banos = banos + ' baños'
    } else {
        banos = banos + ' baño'
    }
    return '<div class="prop-recomendada" id="' + id + '"> <div style="background-image: url(' + thumbnail + ')"> </div> <h5>' + nombre + '</h5> <div> <img src="imgs/location-brown.svg" alt=""> <p>' + localidad + ', ' + provincia + '</p> </div> <span>' + huespedes + ' huéspedes · ' + dormitorios + ' dormitorios · ' + camas + ' camas · ' + banos + '</span> </div>'
}

function comp_img_carrousel(img) {
    return '<div class="carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
}

function comp_precio_final_cont(precio, por_noche, descuento = '0') {
    return `<span id="p-f-c">U$D <span id="p-f">${precio}</span></span>
    <img src="imgs/flecha-abajo.svg" alt="">
    <article id="descripcion-precio">
        <ul>
            <li>Por noche: $${por_noche}</li>
            <li>Fee de Reforma: $2</li>
            <li>Descuento: -$${descuento}</li>
        </ul>
    </article>`
}

function comp_accion_confir() {
    return `<div id="accion-confir">
                <div>
                    <img src="imgs/love-filled.svg">
                    <p>Agregado a Favoritos</p>
                </div>
            </div>`
}

function favear() {
    console.log(id_propiedad)
    let save_img = $('#save img');
    if (!save_img.hasClass('fav')) {
        save_img.attr('src','imgs/love-filled.svg')
        save_img.addClass('fav')

    }else{
        save_img.attr('src','imgs/love.svg')
        save_img.removeClass('fav')
    }
}