// Obtenemos los parametros de busqueda desde la URI
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

// Array de objetos estatico para simular los markers (1 por propiedad)
var markers_obj = [
    {
        "price": 20,
        "lat_lng": new google.maps.LatLng(-34.586911, -58.388361),
        "name": "Pruebita 1!",
    },
    {
        "price": 30,
        "lat_lng": new google.maps.LatLng(-34.286911, -58.388361),
        "name": "Pruebita 2!"
    },
    {
        "price": 40,
        "lat_lng": new google.maps.LatLng(-33.986911, -58.388361),
        "name": "Pruebita 3!"
    }
]

// Inicializacion del documento
init_map(markers_obj)
ver_disponibles()
// set_nav_filters()


// Componente de resultado de propiedad
function comp_resultado(propiedad) {
    var dormitorios = JSON.parse(propiedad.distribucion_camas).length
    if (dormitorios > 1) {
        dormitorios = dormitorios += ' dormitorios'
    } else {
        dormitorios = dormitorios += ' dormitorio'
    }

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
    return `<a class="propiedad" href="apartado.php?id=${propiedad.id}">
        <div class="foto-cont">
            <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
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
        $('#f-check-in').html(check_in)
    }

    var check_out = urlParams.get('check_out')
    if (check_out != '') {
        $('#f-check-out').html(check_out)
    }



}

// Funcion para traer los resultados en funcion de la busqueda
function ver_disponibles() {

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

            // Inyectamos el objeto de propiedades en el listado 
            html = '';
            for (d in disponibles) {
                html += comp_resultado(disponibles[d])
            }
            $('#propiedades').html(html)

            // Inicializamos el mapa con la info de estas propiedades

        });
}

// Funcion para inicializar el mapa
function init_map(markers_obj) {

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

    var center_lat_lng = new google.maps.LatLng(-34.586911, -58.388361);
    const mapOptions = {
        zoom: 14,
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
            html: comp_marker(m)
        });

        google.maps.event.addListener(marker, 'click', function (event) {
            console.log('test');
        });
    }

}

function comp_marker(id) {
    return `<div class="marker" id="${id}">
            <div>
                <img src="imgs/logo-chico.svg" height="15px" alt="">
            </div>
            </div>`
}
