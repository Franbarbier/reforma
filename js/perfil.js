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