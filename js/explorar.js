// Obtenemos los parametros de busqueda desde la URI
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

var global_checkin;
var global_checkout;
var global_zoom = 12;

if(urlParams.get('ciudad')==''){
    global_zoom = 5
}

function update_global_vars() {

    global_checkin = $('#checkin input').val()
    global_checkout = $('#checkout input').val()
    if (global_checkin.includes('Check')) {
        global_checkin = ''
    }

    if (global_checkout.includes('Check')) {
        global_checkout = ''
    }
}


update_global_vars()


// Array de objetos estatico para simular los markers (1 por propiedad)
// var markers_obj = [
//     {
//         "price": 20,
//         "lat_lng": new google.maps.LatLng(-34.586911, -58.388361),
//         "name": "Pruebita 1!",
//     },
//     {
//         "price": 30,
//         "lat_lng": new google.maps.LatLng(-34.286911, -58.388361),
//         "name": "Pruebita 2!"
//     },
//     {
//         "price": 40,
//         "lat_lng": new google.maps.LatLng(-33.986911, -58.388361),
//         "name": "Pruebita 3!"
//     }
// ]

var center_coordinates = [-34.255863, -59.466912]
// Inicializacion del documento
ver_disponibles()
set_nav_filters()

// Componente de marker del map
function obj_marker(id, price, coordinates, name) {
    return {
        "id": id,
        "price": price,
        "lat_lng": new google.maps.LatLng(coordinates[0], coordinates[1]),
        "name": name,
    }
}

// Componente de resultado de propiedad
function comp_resultado(propiedad) {
    var dormitorios = JSON.parse(propiedad.distribucion_camas).length
    if (dormitorios > 1) {
        dormitorios = dormitorios += ' dormitorios'
    } else {
        dormitorios = dormitorios += ' dormitorio'
    }

    var thumbnail = JSON.parse(propiedad.galeria)[0]

    var huespedes = propiedad.huespedes
    if (huespedes > 1) {
        huespedes += ' huéspedes'
    } else {
        huespedes += ' huésped'
    }

    var camas = propiedad.camas
    if (camas > 1) {
        camas += ' camas'
    } else {
        camas += ' cama'
    }

    var banos = propiedad.banos
    if (banos > 1) {
        banos += ' banos'
    } else {
        banos += ' banos'
    }

    console.log('id, ' + propiedad.id)

    var dates_to_stay = '';
    if (global_checkin != "" && global_checkout != "") {
        console.log('no vacias!')
        dates_to_stay = '&check_in=' + global_checkin + '&check_out=' + global_checkout
    }

    return `<a class="propiedad" href="apartado.php?id=${propiedad.id}${dates_to_stay}" id="${propiedad.id}">
        <div class="foto-cont">
            <img src="imgs/propiedades_imgs/${thumbnail}" alt="">
        </div>
        <div class="prop-info">
            <div>
                <h4>${propiedad.localidad}, ${propiedad.provincia}</h4>
                <h2>${propiedad.nombre}</h2>
                <hr>
                <p>${huespedes} - ${dormitorios} - ${camas} - ${banos}</p>
                <p>Wifi - Cocina - Calefaccion</p>
            </div>
            <div> 
                <p class="btn-precio"><strong>$${propiedad.tarifa}</strong><span>/noche</span></p>
            </div>
        </div>
    </a>`
}

// Funcion para inicializar la barra de filtros en coherencia con los filtros seteados
function set_nav_filters() {

    var huespedes = urlParams.get('huespedes')
    if (huespedes != '') {
        $('#filter-cant-hues').val(huespedes)
    }

    var localidad = urlParams.get('localidad')
    if (localidad != '') {
        $('#f-localidad').html(localidad)
    }

    var ciudad = urlParams.get('ciudad')
    if (ciudad != '') {
        $('#f-ciudad').html(ciudad)
    }

    var check_in = urlParams.get('check_in')
    if (check_in != '') {
        $('#checkin input').val(check_in)
    }

    var check_out = urlParams.get('check_out')
    if (check_out != '') {
        $('#checkout input').val(check_out)
    }
}

// Funcion para traer los resultados en funcion de la busqueda
function ver_disponibles() {

    console.log('function: verDisponibles()')

    var ciudad = urlParams.get('ciudad')
    var check_in = urlParams.get('check_in')
    var check_out = urlParams.get('check_out')
    var huespedes = urlParams.get('huespedes')
    
    console.log(ciudad)
    
    // Hacemos la consulta a la API
    fetch('php/api/propiedades.php?func=verDisponibles&ciudad=' + ciudad + '&check_in=' + check_in + '&check_out=' + check_out + '&huespedes=' + huespedes)
    .then(function (response) {
        return response.json();
    })
    .then(function (disponibles) {
        console.log(disponibles)
        
        if(disponibles.length>0){

            var tarifas = []
            
            // Inyectamos el objeto de propiedades en el listado y armamos los marker objs
            var center_lat = 0;
            var center_long = 0;
            var markers_obj = [];
            html = '';
            for (d in disponibles) {
                html += comp_resultado(disponibles[d])
                markers_obj.push(obj_marker(disponibles[d].id, disponibles[d].tarifa, JSON.parse(disponibles[d].coordenadas), disponibles[d].nombre))
                center_lat += parseFloat(JSON.parse(disponibles[d].coordenadas)[0])
                center_long += parseFloat(JSON.parse(disponibles[d].coordenadas)[1])

                tarifas.push(disponibles[d].tarifa)
            }
            $('#propiedades').html(html)
            console.log('markers: ')
            console.log(markers_obj)

            console.log('TARIFAS: ', tarifas)
            // Determinamos el maximo y minimo de tarifas y agregamos 20% de margen sobre cada una de ellas
            var max_tarifa = Math.round(Math.max(...tarifas) * 1.2)
            var min_tarifa = Math.round(Math.min(...tarifas) * 0.8)
            console.log('max: ', max_tarifa, ' min: ', min_tarifa)

            // ESTO DE ABAJO ESTA RE FALOPA, TENGO QUE TEMRINARLO
            // Inicializamos este max y min tarifa en la barra de filtros
            $('#f-minprice').attr('value', min_tarifa)
            $('#f-minprice').attr('min', min_tarifa)
            $('#f-minprice').attr('max', max_tarifa)

            $('#f-maxprice').attr('value', max_tarifa)
            $('#f-maxprice').attr('min', min_tarifa)
            $('#f-maxprice').attr('max', max_tarifa)

            $('#r-minprice').attr('value', min_tarifa)
            $('#r-minprice').attr('min', min_tarifa)
            $('#r-minprice').attr('max', max_tarifa)

            $('#r-maxprice').attr('value', max_tarifa)
            $('#r-maxprice').attr('min', min_tarifa)
            $('#r-maxprice').attr('max', max_tarifa)

            set_pricerange_fill()

            // Dividimos lat por el length de propiedades para dar con el promedio
            center_lat = center_lat / disponibles.length
            center_long = center_long / disponibles.length

            console.log('lat long: ', center_lat, ' , ', center_long)

            init_map(markers_obj, [center_lat, center_long])

            }else{
                $('#propiedades').html(comp_sin_propiedades())
                init_map(0, 0)
            }


        });
}

// Funcion para inicializar el mapa
function init_map(markers_obj, center_coordinates) {

    const createHTMLMapMarker = ({ OverlayView = google.maps.OverlayView, ...args }) => {
        class HTMLMapMarker extends OverlayView {

            constructor() {
                super();
                this.latlng = args.latlng;
                this.html = args.html;
                this.setMap(args.map);
            }

            createDiv() {
                this.div = document.createElement('div');
                this.div.style.position = 'absolute';
                if (this.html) {
                    this.div.innerHTML = this.html;
                }
                google.maps.event.addDomListener(this.div, 'click', event => {
                    google.maps.event.trigger(this, 'click');
                });
            }

            appendDivToOverlay() {
                const panes = this.getPanes();
                panes.overlayLayer.appendChild(this.div);
            }

            positionDiv() {
                const point = this.getProjection().fromLatLngToDivPixel(this.latlng);
                if (point) {
                    this.div.style.left = `${point.x}px`;
                    this.div.style.top = `${point.y}px`;
                }
            }

            draw() {
                if (!this.div) {
                    this.createDiv();
                    this.appendDivToOverlay();
                }
                this.positionDiv();



            }

            remove() {
                if (this.div) {
                    this.div.parentNode.removeChild(this.div);
                    this.div = null;
                }
            }

            getPosition() {
                return this.latlng;
            }

            getDraggable() {
                return false;
            }
        }

        return new HTMLMapMarker();
    };

    var center_lat_lng = new google.maps.LatLng(center_coordinates[0], center_coordinates[1]);
    const mapOptions = {
        zoom: global_zoom,
        center: center_lat_lng,
        styles: [
            {
                featureType: "all",
                stylers: [{ saturation: -100 }, { gamma: 0.8 }]
            },
            {
                featureType: "poi",
                stylers: [{ visibility: "off" }]
            },
            {
                featureType: "transit",
                stylers: [{ visibility: "off" }]
            }
        ]
    };
    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    for (m in markers_obj) {

        var lat_lng = markers_obj[m].lat_lng
        var price = markers_obj[m].price

        let marker = createHTMLMapMarker({
            latlng: lat_lng,
            map: map,
            html: comp_marker(markers_obj[m])
        });

        google.maps.event.addListener(marker, 'click', function (event) {
            console.log('test');
        });
    }

}

// Funcion para actualizar propiedades siendo mostradas a partir de los filtros
function update_from_filters() {

    update_global_vars()

    // Seleccionamos todos los valores obteniendolos de la barra de filtros
    var ciudad = $('#f-ciudad').html()
    var check_in = $('#checkin input').val()
    var check_out = $('#checkout input').val()

    // Formateamos barras a guiones
    check_in = check_in.replace(/\//g,'-')
    check_out = check_out.replace(/\//g,'-')


    if (check_in == 'Check-in') {
        check_in = ''
        check_out = ''
    }
    if (check_out == 'Check-out') {
        check_in = ''
        check_out = ''
    }
    var huespedes = $('#filter-cant-hues').val()
    var minprice = $('#f-minprice').val()
    var maxprice = $('#f-maxprice').val()
    var amenities = JSON.stringify(global_selected_amenities)

    // Hacemos la consulta a la API
    fetch('php/api/propiedades.php?func=filtrarResultados&ciudad=' + ciudad + '&check_in=' + check_in + '&check_out=' + check_out + '&huespedes=' + huespedes + '&minprice=' + minprice + '&maxprice=' + maxprice + '&amenities=' + amenities)
        .then(function (response) {
            return response.json();
        })
        .then(function (disponibles) {
            console.log(disponibles)

            if (disponibles.length != 0) {


                // Inyectamos el objeto de propiedades en el listado y armamos los marker objs
                var center_lat = 0;
                var center_long = 0;
                var markers_obj = [];
                html = '';
                for (d in disponibles) {
                    html += comp_resultado(disponibles[d])
                    markers_obj.push(obj_marker(disponibles[d].id, disponibles[d].tarifa, JSON.parse(disponibles[d].coordenadas), disponibles[d].nombre))
                    center_lat += parseFloat(JSON.parse(disponibles[d].coordenadas)[0])
                    center_long += parseFloat(JSON.parse(disponibles[d].coordenadas)[1])
                }
                $('#propiedades').html(html)
                console.log('markers: ')
                console.log(markers_obj)

                // Dividimos lat por el length de propiedades para dar con el promedio
                center_lat = center_lat / disponibles.length
                center_long = center_long / disponibles.length

                console.log('lat long: ', center_lat, ' , ', center_long)

                init_map(markers_obj, [center_lat, center_long])

            } else {

                $('#propiedades').html(comp_sin_propiedades())
                init_map(0, 0)

            }

        });
}

function comp_marker(marker_info) {
    return `<div class="marker" id="${marker_info.id}">
            <div>
                <img src="imgs/logo-chico.svg" height="15px" alt="">
            </div>
            </div>`
}


// Componente que se renderiza cuando ya no hay propiedades para mostrar
function comp_sin_propiedades() {
    return `<div id="sin-propiedades">
                <div>
                    <img src="imgs/archive.svg" height="30px">
                    <div>No se encontraron resultados.</div>
                </div>
            <div>`
}

// Funcion que inyecta las ciudades disponibles a partir de la base de datos
function init_localidades() {

    fetch('php/api/globales.php?func=verLocalidades')
        .then(function (response) {
            return response.json();
        })
        .then(function (localidades) {
            console.log(localidades);

            // Inicializamos las localidades en el desplegable
            var html = ''
            for(l in localidades){
                var loc = localidades[l]
                html += '<li>'+loc.nombre+'</li>'
            }

            $('#ciudades ul').append(html)

        });

}
init_localidades()