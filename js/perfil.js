const id_usuario = document.getElementById('id_usuario').value;

// Seccion de inicializacion
verHistorialReservas();
verNivel();

// Seccion de funciones
function verHistorialReservas() {
    fetch('php/api/usuarios.php?func=verHistorialReservas&id=' + id_usuario)
        .then(function (response) {
            return response.json();
        })
        .then(function (historial_reservas) {
            console.log(historial_reservas);

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
    return '<div class="actual-reserva-row" id="' + reserva.id + '"> <div class="foto-prop-cont"> <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt=""> </div> <div class="nombre-prop"> <h4>' + reserva.nombre_propiedad + '</h4> </div> <div class="fechas-reserva" style="opacity: 0.5"> <p>' + reserva.check_in + '</p> <img src="imgs/down-arrow.svg" alt=""> <p>' + reserva.check_out + '</p> </div> <button class="ver-reserva">VER MAS</button> </div>'
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
    $(document).on("click", ".ver-mas-resena", function (e) {
        $('#modal-reserva').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })

    return '<div class="main-modal" id="modal-reserva" style="display: none"> <div> <div class="cerrar-main-modal"> <img src="imgs/letter-x.svg" height="8px" alt=""> </div> <div> <div class="modal-header">Detalle de tu reserva</div><div class="actual-reserva-row" id="1"> <div class="foto-prop-cont"> <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt=""> </div> <div class="nombre-prop"><strong>Localidad/ciudad</strong><h4>Nombre d ela Propiedad</h4> <p>Fecha realizada: 5/9/2020</p> </div> </div> <div class="info-row"> <div><p>LLegada</p><strong>17/10/2020</strong></div><div><p>Salida</p><strong>26/10/2020</strong></div> </div> <div class="info-row"><div><p>Tarifa</p><strong>$ 514</strong></div><div><p>Huespedes</p><strong>3</strong></div> </div><textarea placeholder="Como estuvo tu alojamiento?"></textarea><button id="dejar-resena">DEJAR RESEÑA</button></div></div> </div> </div>';

}

function abrir_reserva(){

}

function modal_favoritos(){
    $(document).on("click", "#ver-favoritos", function (e) {
        $('#modal-favoritos').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })

    return '<div class="main-modal" id="modal-favoritos" style="display: none"> <div> <div class="cerrar-main-modal"> <img src="imgs/letter-x.svg" height="8px" alt=""> </div> <div> <div class="modal-header">Tus propiedades favoritas</div><div> <div class="row-fav"> <div class="foto-prop-cont"> <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt=""> </div> <div class="nombre-prop"><strong>Buenos Aires</strong><h4>Nombre de la propiedad</h4> </div>  <button class="ir-al-apartado">VER MAS</button> </div> </div> </div></div> </div> </div>';

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