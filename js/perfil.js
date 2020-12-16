const id_usuario = $('#id_usuario').val();
var global_reservas_expiradas;
var global_reservas_activas;
var global_reservas;

// Seccion de inicializacion
verHistorialReservas();
verReservasActivas();
verNivel();

// Funcion que devuelve la reserva a partir del id
function get_reserva_by_id(id){

    console.log('id: ', id)

    for(r in global_reservas_expiradas){
        reserva = global_reservas_expiradas[r]
        if(reserva.id == id){
            return reserva
        }
    }

    for(r in global_reservas_activas){
        reserva = global_reservas_activas[r]
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

            global_reservas_expiradas = historial_reservas

            // Inyectamos las reservas a la seccion de historial reservas
            var html = ''
            for (hr in historial_reservas) {
                html += comp_reserva_row(historial_reservas[hr])
            }

            $('#reservas-historicas').html(html)

        });
}

// Seccion de funciones
function verReservasActivas() {
    fetch('php/api/usuarios.php?func=verReservasActivas')
        .then(function (response) {
            return response.json();
        })
        .then(function (reservas_activas) {
            console.log(reservas_activas);

            global_reservas_activas = reservas_activas

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

            global_nivel = xp

            init_beneficios()

        });

}


// Seccion de componentes
function comp_reserva_row(reserva) {
    console.log('reservaa: ', reserva)
    var thumbnail = JSON.parse(reserva.galeria)[0]
    return '<div class="actual-reserva-row" id="' + reserva.id + '"> <div class="foto-prop-cont"> <img src="imgs/propiedades_imgs/'+thumbnail+'" alt=""> </div> <div class="nombre-prop"> <h4>' + reserva.nombre_propiedad + '</h4> </div> <div class="fechas-reserva" style="opacity: 0.5"> <p>' + reserva.check_in + '</p> <img src="imgs/down-arrow.svg" alt=""> <p>' + reserva.check_out + '</p> </div> <button class="ver-reserva">VER MAS</button> </div>'
}

// Componente de beneficio por nivel
// function comp_beneficio_nivel(obj) {
//     return `<div class="beneficios-nivel" id="level${obj.numero}">
//                 <h5>Nivel</h5>
//                 <h6>${obj.numero}</h6>
//                 <ul>
//                     <li>Lorem ipsum dolor sit amet amet.</li>
//                     <li>Lorem ipsum dolor sit amet amet.</li>
//                 </ul>
//             </div>`
// }

function comp_noche_gratis(obj) {

    var text;
    var opacity = 0.35;
    var img = 'moon';

    if(obj.status == 'active'){
        text = 'Ya podes usarlo en estadías mayores a 2 noches.'
        opacity = 1;
    }else if(obj.status=='inactive'){
        text = 'Al sumar un total de ' + obj.puntos + ' puntos.'
    }else if(obj.status=='used'){
        text = 'Este beneficio ya fue usado.'
        img = 'checked'
    }

    return `<div class="beneficios-nivel" style="opacity: ${opacity}">
                <h6>1</h6>
                <h5>Noche Gratis</h5>
                <ul>
                    <li>${text}</li>
                </ul>
                <img src="imgs/${img}.svg" height="35px" class="moon" style="opacity: 0.8">
            </div>`
}

function initNiveles() {


    fetch('php/api/usuarios.php?func=verNiveles')
        .then(function (response) {
            return response.json();
        })
        .then(function (niveles) {
            console.log(niveles)

            var current_level_num = $('#numero_nivel').val()
            $('#level' + current_level_num).addClass('active-level')

        });
}
initNiveles()

function init_beneficios(){

    // Objeto de beneficios que el día de mañana tal vez provenga de una base de datos
    var noches_gratis = [2000, 4000, 6000];

    var html = ''
    for(n in noches_gratis){

        var noche = noches_gratis[n]
        var noches_usadas = JSON.parse(global_nivel.noches_usadas)
        
        var status = 'inactive';
        if(global_nivel.score>noche){
            status = 'active'
        }

        if(noches_usadas.includes(noche)){
            status = 'used'
        }

        html += comp_noche_gratis({"status":status, "puntos":noche})

    }

    $('#beneficios-cont div').html(html)

}

function modal_reserva(){
    $(document).on("click", ".ver-reserva", function (e) {
        var id_reserva = $(this).closest('.actual-reserva-row').attr('id')
        console.log('id RESERVA: ', id_reserva)
        init_modal_reserva(id_reserva)
        $('#modal-reserva').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $(this).parent().parent().fadeOut(150)
    })

    $(document).on("click", "#dejar-resena", function(){
        dejarResena();
    })

    return `<div class="main-modal" id="modal-reserva" style="display: none">
                <input type="hidden" id="mr-idpropiedad"> 
                <div> 
                    <div class="cerrar-main-modal"> 
                        <img src="imgs/letter-x.svg" height="8px" alt=""> 
                    </div> 
                    <div> 
                        <div class="modal-header">Detalle de tu reserva</div>
                        <div class="actual-reserva-row" id="1"> 
                            <div class="foto-prop-cont"> 
                                <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt=""> 
                            </div> 
                            <div class="nombre-prop">
                                <strong id="mr-localidad-ciudad">Localidad/ciudad</strong>
                                <h4 id="mr-nombre">Nombre de la Propiedad</h4> 
                                <p>Fecha realizada: <span id="mr-fecha-realizada">5/9/2020</span></p> 
                            </div> 
                        </div> 
                        <div class="info-row"> 
                            <div><p>LLegada</p><strong id="mr-checkin">17/10/2020</strong></div>
                            <div><p>Salida</p><strong id="mr-checkout">26/10/2020</strong></div> 
                        </div> 
                        <div class="info-row">
                            <div>
                                <p>Importe total</p><strong>$ <span id="mr-total">514</span></strong>
                            </div>
                            <div>
                                <p>Huespedes permitidos</p><strong id="mr-huespedes">3</strong>
                            </div> 
                        </div>
                        <textarea placeholder="Como estuvo tu alojamiento?" id="mr-resena"></textarea>
                        <button id="dejar-resena">DEJAR RESEÑA</button>
                        <div id="msg" style="display:none"></div>
                    
                    </div>
                </div> 
            </div>`;

}

// Funcion que inyecta la info de la reserva en el modal
function init_modal_reserva(id_reserva){
    
    var reserva = get_reserva_by_id(id_reserva)

    console.log('RES: ', reserva)

    $('#mr-nombre').html(reserva.nombre_propiedad)
    $('#mr-checkin').html(reserva.check_in)
    $('#mr-checkout').html(reserva.check_out)
    $('#mr-total').html(reserva.importe_total)
    $('#mr-huespedes').html(reserva.huespedes)
    $('#mr-fecha-realizada').html(reserva.fecha_creada)
    $('#mr-idpropiedad').val(reserva.id_propiedad)
    $('#modal-reserva').attr('data-reserva-id', id_reserva)

    // Si la info de la resena esta vacia, lo dejamos crear una. Sino, no puede dejar una resena y se muestra la resena que dejó
    if(reserva.resena!='' || reserva.estado=='activa'){
        $('#mr-resena').css('display', 'none')
        $('#dejar-resena').css('display', 'none')
    }else{
        $('#mr-resena').css('display', 'block')
        $('#dejar-resena').css('display', 'block')
    }

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


function edit_config(){
    $('#modal-config input, #modal-config select').attr('disabled', false).addClass('editables')
    $('#save-buttons').slideDown(150)
    $('#save-buttons').css('display','flex')
    $('#config-buttons').slideUp(150)
};

function modal_config(info_usuario){
    $(document).on("click", "#admin-config", function (e) {
        $('#modal-config').fadeTo(0, 150)
        e.stopPropagation()
    });

    $(document).on("click", ".cerrar-main-modal", function () {
        $('#modal-config input, #modal-config select').attr('disabled', true).removeClass('editables');
        $('#save-buttons').slideUp(150);
        $('#config-buttons').slideDown(150)
        $(this).parent().parent().fadeOut(150)

    })
    $(document).on("click", "#cerrar-config", function () {
        $('#modal-config input, #modal-config select').attr('disabled', true).removeClass('editables');
        $('#save-buttons').slideUp(150);
        $('#config-buttons').slideDown(150)
        $('#modal-config').fadeOut(150)

    })
    $(document).on("click", "#editar-config", function () {
        edit_config();
    })

    $(document).on('click', '#guardar-config', function(e){
        e.preventDefault();
        console.log('click en guarar config')
        guardar_usuario()
    })

    var html_paises = ''
    for(p in global_paises){
        html_paises += `<option>${global_paises[p]}</option>`
    }

    return `<div class="main-modal" id="modal-config" style="display: none">
    <div>
        <div class="cerrar-main-modal">
            <img src="imgs/letter-x.svg" height="8px" alt="">
        </div>
        <div>
            <div class="modal-header">Configuración de la cuenta</div>
            <div id="inside-config">
                <form>
                    <div>
                        <div class="profile-img">
                            <input disabled type="file" id="myFile" name="filename" accept="image/*">
                            <img src="imgs/no-user-pic.jpg" alt="" class="p-pic">
                            <label for="myFile"></label>
                        </div>
                        <div>
                            <input disabled id="nombre" type="text" value="${info_usuario.nombre}">
                            <input disabled id="apellido" type="text" value="${info_usuario.apellido}">
                        </div>
                    </div>
                    <div>
                        <label class="labelss" for="mail">Mail</label>
                        <input disabled type="email" id="mail" value="${info_usuario.mail}">
                    </div>
                    <div>
                        <label class="labelss" for="mail">Teléfono</label>
                        <input disabled type="tel" id="telefono" value="${info_usuario.telefono}">
                    </div>
                    <div>
                        <label class="labelss" for="pais">País</label>
                        <select disabled id="pais">
                            <option selected>${info_usuario.pais}</option>
                            ${html_paises}
                        </select>
                    </div>
                    <div>
                        <label class="labelss" for="fechaNac">Fecha de nacimiento</label>
                        <input disabled type="date" id="fechaNac" value="${info_usuario.fecha_nacimiento}">
                    </div>
                    <aside id="save-buttons">
                        <button id="descartar-config">DESCARTAR</button>
                        <button id="guardar-config">GUARDAR</button>
                    </aside>
                    <div id="success" style="display:none"></div>
                </form>
                <div id="config-buttons">
                    <button id="cerrar-config">CERRAR</button>
                    <button id="editar-config">EDITAR INFO</button>
                </div>
            </div>
        </div>
    </div> </div>`;

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

function getFavoritos(){

    fetch('php/api/usuarios.php?func=verFavoritos')
        .then(function (response) {
            return response.json();
        })
        .then(function (favs) {
            console.log('Favoritos')
            console.log(favs)

            $('body').append(modal_favoritos(favs))

        });

}


function dejarResena(){

    var resena = $('#mr-resena').val()
    var id_propiedad = $('#mr-idpropiedad').val();
    var id_reserva = $('#modal-reserva').attr('data-reserva-id')
    console.log('id reserva: ', id_reserva)

    $.ajax({
        url:'php/api/usuarios.php?func=dejarResena',
        method:'POST',
        cache: false,
        data:{
            resena,
            id_propiedad,
            id_reserva
        },
        dataType:'text',
        success:function(data){
         console.log(data)
         res = JSON.parse(data)
         if(res.error==0){
             console.log('resena anadida con exito!')
             $('#msg').html('Reseña añadida con éxito!')
             $('#mr-resena').val('')
             $('#msg').slideDown(100)
             setTimeout(() => {
                 $('#msg').slideUp(100)
             }, 2000);

             setTimeout(() => {
                 $('.cerrar-main-modal').click()
             }, 2600);

         }
        }
    });

}


getFavoritos()

// Traemos la info del usuario para guardarla en global_info_usuario
function get_usuario(){

    fetch('php/api/usuarios.php?func=verUsuario')
    .then(function (response) {
        return response.json();
    })
    .then(function (info_usuario) {
        console.log('info usuario: ')
        info_usuario.password = null
        console.log(info_usuario)
        global_info_usuario = info_usuario
        $('body').append(modal_config(global_info_usuario))

    });

}

get_usuario();

function guardar_usuario(){

    var nombre = $('#inside-config #nombre').val()
    var apellido = $('#inside-config #apellido').val()
    var mail = $('#inside-config #mail').val()
    var telefono = $('#inside-config #telefono').val()
    var pais = $('#inside-config #pais').val()
    var fechaNac = $('#inside-config #fechaNac').val()

    $.ajax({
        url:'php/api/usuarios.php?func=guardarUsuario',
        method:'POST',
        cache: false,
        data:{
            nombre,
            apellido,
            mail,
            telefono,
            pais,
            fecha_nacimiento:fechaNac
        },
        dataType:'json',
        success:function(data){
         console.log(data)
         data = JSON.parse(data)

         if(data.error==0){
             console.log('Usuario guardado con exito!')
             $('#inside-config #success').html('Usuario actualizado con éxito!')
             $('#inside-config #success').slideDown(100)
             setTimeout(() => {
                window.location = 'perfil.php'
             }, 500);
            }else{
                $('#inside-config #success').html('Ocurrió un error al intentar actualizar los datos del usuario.')
                $('#inside-config #success').slideDown(100)
            }
        }
    });
    


}