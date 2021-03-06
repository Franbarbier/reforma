var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
const id_propiedad = urlParams.get('id')
var global_logeado = $('#logeado').val()

// if(global_logeado!='si'){
//     $('#save').css('display', 'none')
// }

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

    $('#id_propiedad').val(propiedad.id)

    var nombre_propiedad = document.querySelector('h1')
    nombre_propiedad.innerHTML = propiedad.nombre
    var nombre_propiedad2 = document.querySelector('#nombre-propiedad2')
    nombre_propiedad2.innerHTML = propiedad.nombre

    var localidad_provincia = document.getElementById('localidad-provincia')
    localidad_provincia.innerHTML = propiedad.localidad + ', ' + propiedad.provincia
    var localidad_provincia2 = document.getElementById('localidad-provincia2')
    localidad_provincia2.innerHTML = propiedad.localidad + ', ' + propiedad.provincia

    var huespedes = $('.huespedes')
    huespedes.html(propiedad.huespedes)

    var tarifa = document.getElementById('tarifa')
    tarifa.innerHTML = propiedad.tarifa
    
    global_por_noche = propiedad.tarifa
    
    tarifa_final()

    var concepto = document.getElementById('concepto-text')
    concepto.innerHTML = propiedad.concepto_espacio

    var distribucion_camas = JSON.parse(propiedad.distribucion_camas)

    var dormitorios = $('.dormitorios')
    dormitorios.html(distribucion_camas.length)
    console.log(propiedad.distribucion_camas)

    var camas = $('.camas')
    var camas_text = 'cama'
    if(propiedad.camas>1){
        camas_text = 'camas'
    }
    camas.html(propiedad.camas + ' ' + camas_text)


    var banos = $('.banos')
    var banos_text = 'baño'
    if (parseInt(propiedad.banos) > 1) {
        banos_text = 'baños'
    }
    banos.html(propiedad.banos + ' ' + banos_text)

    this_amenities = JSON.parse(propiedad.amenities)

    html = ''
    for (c in distribucion_camas) {
        html += comp_distribucion(c, distribucion_camas[c].descripcion, distribucion_camas[c].img)
    }
    $('#distribucion_de_camas').html(html)

    // renderizamos las imgs de la galeria
    var galeria = JSON.parse(propiedad.galeria)
    var html = '';
    var htmlGaleriaExpand = '';
    for (img in galeria) {
        html += comp_img_carrousel(galeria[img])
        htmlGaleriaExpand += imgs_galeria_grande(galeria[img])
    }

    var fee_limpieza = $('#fee')
    fee_limpieza.html(propiedad.tarifa_limpieza)

    console.log('galeria: ' + html)

    $('#cont-carousel').load('slider-apartado.php', { galeria: html })
    $('#galeria-expanded-cont>div').html(htmlGaleriaExpand)

    // Traemos la info del diseñador
    fetch('php/api/globales.php?func=verDisenador&id=' + propiedad.id_disenador)
        .then(function (response) {
            return response.json();
        })
        .then(function (disenador) {
            console.log('DISENADOR')
            console.log(disenador)

            document.getElementById('disenador-nombre').innerHTML = disenador.nombre
            document.getElementById('disenador-descripcion').innerHTML = disenador.descripcion
            document.getElementById('disenador-img').src = 'imgs/disenadores/'+disenador.img

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
                    html += comp_resena(resenas[c].usuario, resenas[c].detalle, resenas[c].fecha, resenas[c].pp_img)
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
                if(recomendados[c].galeria == ''){
                    recomendados[c].galeria = '[]'
                }
                var thumbnail = "'imgs/propiedades_imgs/" + JSON.parse(recomendados[c].galeria)[0] + "'"
                var dormitorios = JSON.parse(recomendados[c].distribucion_camas).length
                html += comp_recomendado(recomendados[c].nombre, recomendados[c].localidad, recomendados[c].provincia, recomendados[c].huespedes, recomendados[c].banos, dormitorios, recomendados[c].camas, thumbnail, recomendados[c].id)
            }
            $('#otros-alojamientos').html(html)
        });
}

// Seccion de componentes
function comp_distribucion(num, descripcion, img) {
    num = parseInt(num)
    num += 1
    return '<div><img src="imgs/' + img + '.svg" alt=""><h5>Dormitorio ' + num + '</h5><p>' + descripcion + '</p></div>'
}

function comp_amenity(img, nombre, status) {
    return '<li class="' + status + '"><img src="imgs/icons/' + img + '.svg" alt=""><p>' + nombre + '</p></li>'
}

function comp_resena(usuario, detalle, fecha, pp_img) {

    if(pp_img!=''){
        pp_img = 'php/api/users_pps/'+pp_img
    }
    return '<div> <div> <div class="res-pp-container"> <img src="'+pp_img+'" alt="" class="res-pp"> </div> <div> <p><b>' + usuario + '</b></p> <span>' + fecha + '</span> </div> </div> <p>' + detalle + '</p> </div>'
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
function imgs_galeria_grande(img) {
    return '<div class="galeria-grande carousel-cell"><img src="imgs/propiedades_imgs/' + img + '" alt=""></div>'
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

function comp_btns_login(){
    return `<div class="mm-btns-cont">
                <div class="mm-btn mm-negative mm-cerrar">CANCELAR</div>
                <div class="mm-btn mm-positive mm-login">INICIAR SESION</div>
            </div>`
}

function favear() {
    console.log(id_propiedad)
    let save_img = $('#save img');

    // Si no esta logeado, abrimos el modal
    if(global_logeado!='si'){

        render_modal('Inicia Sesión', 'Para añadir una propiedad a favoritos necesitamos que inicies sesión en tu cuenta.', comp_btns_login())
    }else{
        
        if (!save_img.hasClass('fav')) {
            save_img.attr('src','imgs/love-filled.svg')
            save_img.addClass('fav')
            
        }else{
            save_img.attr('src','imgs/love.svg')
            save_img.removeClass('fav')
        }

    }
}

function anadirFavorito(id_favorito, action){
    console.log('function anadirFavorito')

    fetch('php/api/usuarios.php?func=anadirFavorito&favorito=' + id_favorito + '&action='+action) 
    .then(function (response) {
        return response.json();
    })
    .then(function (res) {
        console.log(res)
        if(res.error==0){
            console.log('Favorito modificado con exito!')
        }
    });

}

// Funcion que chequea si la propiedad pertenece a los favoritos del usuario
function checkFavorito(){

    fetch('php/api/usuarios.php?func=checkFavorito&id_propiedad=' + id_propiedad) 
    .then(function (response) {
        return response.json();
    })
    .then(function (res) {
        console.log('check fav res')
        console.log(res)
        if(res.error==0){

            if(res.favorito==1){

                console.log('holu')

                $('#save img').addClass('fav');
                $('#save img').attr('src','imgs/love-filled.svg')

            }

        }
    });


}


// Componente main modal
function comp_main_modal(){

    $(document).on('click', '#mm-cerrar, .mm-cerrar, #main-modal-cont, #mm-entendido-btn', function(){
        $('#main-modal-cont').fadeOut(100)
    })

    $(document).on('click', '#main-modal', function(e){
        e.stopPropagation()
    })

    $(document).on('click', '.mm-login', function(){
        var returnuri = window.location.href
        window.location="login.php?returnuri="+returnuri
    })

    return `<div id="main-modal-cont" style="display:none">

                <div id="main-modal">

                    <div id="mm-cerrar">x</div>

                    <div id="mm-heading">
                        <div id="mm-titulo">Titulo de prueba</div>
                        <div id="mm-descripcion">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt magni.</div>
                    </div>

                    <div id="mm-contenido">
                        
                    </div>
                
                </div>

            </div>` 
}

// Funcion que abre el modal inyectandole cierto contenido
function render_modal(titulo, descripcion='', contenido='ENTENDIDO'){

    if(contenido=='ENTENDIDO'){
        contenido = `<div id="mm-entendido-btn">ENTENDIDO</div>`
    }
}

function anadirFavorito(id_favorito, action){
    console.log('function anadirFavorito')

    fetch('php/api/usuarios.php?func=anadirFavorito&favorito=' + id_favorito + '&action='+action) 
    .then(function (response) {
        return response.json();
    })
    .then(function (res) {
        console.log(res)
        if(res.error==0){
            console.log('Favorito modificado con exito!')
        }
    });

}

// Funcion que chequea si la propiedad pertenece a los favoritos del usuario
function checkFavorito(){

    fetch('php/api/usuarios.php?func=checkFavorito&id_propiedad=' + id_propiedad) 
    .then(function (response) {
        return response.json();
    })
    .then(function (res) {
        console.log(res)
        if(res.error==0){

            if(res.favorito==1){

                console.log('holu')

                $('#save img').addClass('fav');
                $('#save img').attr('src','imgs/love-filled.svg')

            }

        }
    });


}

if(logeado=='si'){
    checkFavorito();
}

// Componente main modal
// function comp_main_modal(){

//     $(document).on('click', '#mm-cerrar, #main-modal-cont, #mm-entendido-btn', function(){
//         $('#main-modal-cont').fadeOut(100)
//     })

//     $(document).on('click', '#main-modal', function(e){
//         e.stopPropagation()
//     })

//     return `<div id="main-modal-cont" style="display:none">

//                 <div id="main-modal">

//                     <div id="mm-cerrar">x</div>

//                     <div id="mm-heading">
//                         <div id="mm-titulo">Titulo de prueba</div>
//                         <div id="mm-descripcion">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt magni.</div>
//                     </div>

//                     <div id="mm-contenido">
                        
//                     </div>
                
//                 </div>

//             </div>` 
// }

// Funcion que abre el modal inyectandole cierto contenido
function render_modal(titulo, descripcion='', contenido='ENTENDIDO'){

    if(contenido=='ENTENDIDO'){
        contenido = `<div id="mm-entendido-btn">ENTENDIDO</div>`
    }

    $('#mm-titulo').html(titulo)
    $('#mm-descripcion').html(descripcion)
    $('#mm-contenido').html(contenido)

    $('#main-modal-cont').fadeIn(100)

}

function comp_row_detalle(id, num, text){

    return `<tr class="row-detalle-descuento">
                <td><span>${text}</span></td>
                <td id="${id}" style="text-align:right">${num}</td>
            </tr>`

}

function verFechasOcupadas(){

    fetch('php/api/propiedades.php?func=verFechasOcupadas&id=' + id_propiedad)
    .then(function (response) {
        return response.json();
    })
    .then(function (res) {
        console.log(res)
        fechasOcupas = res
    });

}

// verFechasOcupadas()
function copyToClipboard(element) {

    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).val()).select();
    document.execCommand("copy");
    $temp.remove();
}

// Componente main modal
function comp_share_modal(){

    $(document).on('click', '#share', function(){
        $('#share-modal').fadeIn(100)
    })
    $(document).on('click', '#share-modal .roger-that, #share-modal .mm-cerrar', function(){
        $('#share-modal').fadeOut(100)
    })

    $(document).on('click', '#share-modal', function(e){
        e.stopPropagation()
    })
    $(document).on('click', '.copy-cont', function(e){
        $(this).addClass('copied')
        setTimeout(() => {
            $(this).removeClass('copied')
        }, 1000);
    });
    

    return `<div id="share-modal">

                <div>

                    <div class="mm-cerrar">x</div>

                    <div class="mm-heading">
                        <div class="mm-titulo">Compartí esta propiedad</div>
                        <div class="mm-descripcion">Enviale el enlace a quien le quieras mostrar este alojamiento!</div>
                    </div>

                    <div class="modal-cont-share">
                        <input id="shareLink" disabled value="${window.location.href}">
                        <div class="copy-cont" onclick="copyToClipboard('#shareLink')">
                            <div>
                                <img src="imgs/copy.svg">
                            </div>
                        </div>
                    </div>
                    <button class="roger-that">ENTENDIDO</button>
                
                </div>

            </div>` 
}
