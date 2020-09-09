var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
const id_propiedad = urlParams.get('id')

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
}