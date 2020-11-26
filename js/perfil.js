const id_usuario = 2;
var global_reservas;

// Seccion de inicializacion
verHistorialReservas();
verNivel();

// Funcion que devuelve la reserva a partir del id
function get_reserva_by_id(id){

    for(r in global_reservas){
        reserva = global_reservas[r]
        if(reserva.id == id){
            return reserva
        }
    }

}

// Seccion de funciones
function verHistorialReservas() {
    fetch('php/api/usuarios.php?func=verHistorialReservas&id=' + id_usuario)
        .then(function (response) {
            return response.json();
        })
        .then(function (historial_reservas) {
            console.log(historial_reservas);

            global_reservas = historial_reservas

            // Inyectamos las reservas a la seccion de historial reservas
            var html = ''
            for (hr in historial_reservas) {
                html += comp_reserva_row(historial_reservas[hr])
            }

            $('#reservas-historicas').html(html)

        });
}

// Calculamos el nivel del usuario
function verNivel() {

    fetch('php/api/usuarios.php?func=verNivel&id=' + id_usuario)
        .then(function (response) {
            return response.json();
        })
        .then(function (xp) {
            console.log('xp')
            console.log(xp);

        });

}


// Seccion de componentes
function comp_reserva_row(reserva) {
    console.log('reservaa: ', reserva)
    var thumbnail = JSON.parse(reserva.galeria)[0]
    return '<div class="actual-reserva-row" id="' + reserva.id + '"> <div class="foto-prop-cont"> <img src="imgs/propiedades_imgs/'+thumbnail+'" alt=""> </div> <div class="nombre-prop"> <h4>' + reserva.nombre_propiedad + '</h4> </div> <div class="fechas-reserva" style="opacity: 0.5"> <p>' + reserva.check_in + '</p> <img src="imgs/down-arrow.svg" alt=""> <p>' + reserva.check_out + '</p> </div> <button class="ver-reserva">VER MAS</button> </div>'
}

// Componente de beneficio por nivel
function comp_beneficio_nivel(obj) {
    return `<div class="beneficios-nivel" id="level${obj.numero}">
                <h5>Nivel</h5>
                <h6>${obj.numero}</h6>
                <ul>
                    <li>Lorem ipsum dolor sit amet amet.</li>
                    <li>Lorem ipsum dolor sit amet amet.</li>
                </ul>
            </div>`
}

function initNiveles() {


    fetch('php/api/usuarios.php?func=verNiveles')
        .then(function (response) {
            return response.json();
        })
        .then(function (niveles) {
            console.log(niveles)
            var html = ''
            for (n in niveles) {
                html += comp_beneficio_nivel(niveles[n])
            }
            $('#beneficios-cont>div').html(html)

            var current_level_num = $('#numero_nivel').val()
            $('#level' + current_level_num).addClass('active-level')

        });
}
initNiveles()

function modal_reserva(){
    $(document).on("click", ".ver-reserva", function (e) {
        var id_reserva = $(this).closest('.actual-reserva-row').attr('id')
        init_modal_reserva(id_reserva)
        $('#modal-reserva').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })

    return '<div class="main-modal" id="modal-reserva" style="display: none"> <div> <div class="cerrar-main-modal"> <img src="imgs/letter-x.svg" height="8px" alt=""> </div> <div> <div class="modal-header">Detalle de tu reserva</div><div class="actual-reserva-row" id="1"> <div class="foto-prop-cont"> <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt=""> </div> <div class="nombre-prop"><strong id="mr-localidad-ciudad">Localidad/ciudad</strong><h4 id="mr-nombre">Nombre d ela Propiedad</h4> <p>Fecha realizada: <span id="mr-fecha-realizada">5/9/2020</span></p> </div> </div> <div class="info-row"> <div><p>LLegada</p><strong id="mr-checkin">17/10/2020</strong></div><div><p>Salida</p><strong id="mr-checkout">26/10/2020</strong></div> </div> <div class="info-row"><div><p>Importe total</p><strong>$ <span id="mr-total">514</span></strong></div><div><p>Huespedes</p><strong id="mr-huespedes">3</strong></div> </div><textarea placeholder="Como estuvo tu alojamiento?"></textarea><button id="dejar-resena">DEJAR RESEÑA</button></div></div> </div> </div>';

}

// Funcion que inyecta la info de la reserva en el modal
function init_modal_reserva(id_reserva){
    
    var reserva = get_reserva_by_id(id_reserva)

    console.log('RES: ', reserva)

    $('#mr-nombre').html(reserva.nombre_propiedad)
    $('#mr-checkin').html(reserva.check_in)
    $('#mr-checkout').html(reserva.check_out)
    $('#mr-total').html(reserva.precio_final)
    $('#mr-huespedes').html(reserva.huespedes)
    $('#mr-fecha-realizada').html(reserva.fecha_creada)



}

function abrir_reserva(){

}

function modal_favoritos(favs){

    $(document).on("click", "#ver-favoritos", function (e) {
        $('#modal-favoritos').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })
    
    $(document).on("click", ".row-fav", function () {
        var id = $(this).attr('data-id')
        window.location = 'apartado.php?id='+id
    })

    var html = ''

    for(f in favs){

        var fav = favs[f]

        var thumbnail = JSON.parse(fav.galeria)[0]

        html += `<div class="row-fav" data-id="${fav.id}"> 
                    <div class="foto-prop-cont"> 
                        <img src="imgs/propiedades_imgs/${thumbnail}" alt=""> 
                    </div> 
                    <div class="nombre-prop"><strong>${fav.localidad}</strong><h4>${fav.nombre}</h4> </div>  
                    <a href="apartado.php?id=${fav.id}"><button class="ir-al-apartado">VER MAS</button></a>
                </div>`

    }

    return `<div class="main-modal" id="modal-favoritos" style="display: none"> <div> <div class="cerrar-main-modal"> <img src="imgs/letter-x.svg" height="8px" alt=""> </div> <div> <div class="modal-header">Tus propiedades favoritas</div>
                
                    <div id="cont-row-favs"> 
                    ${html}
                    </div> 
                
            </div></div> </div> </div>`;
}



function modal_config(){
    $(document).on("click", "#admin-config", function (e) {
        $('#modal-config').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })

    return '<div class="main-modal" id="modal-config" style="display: none"> <div> <div class="cerrar-main-modal"> <img src="imgs/letter-x.svg" height="8px" alt=""> </div> <div> <div class="modal-header">Configuración de la cuenta</div><div> <div class="profile-img"></div> </div></div> </div> </div>';

}

function getFavoritos(){

    fetch('php/api/usuarios.php?func=verFavoritos')
        .then(function (response) {
            return response.json();
        })
        .then(function (favs) {
            console.log(favs)

            $('body').append(modal_favoritos(favs))

        });

}

getFavoritos()