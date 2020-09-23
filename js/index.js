// Funcion que dirije al usuario a la pagina de resultados con los filtros establecidos
function ver_disponibles() {
    var ciudad = $('#ciudad').val()
    var check_in = $('#check_in').val()
    var check_out = $('#check_out').val()
    var huespedes = $('#huespedes').val()

    var data = "?ciudad=" + ciudad + "&check_in=" + check_in + "&check_out=" + check_out + "&huespedes=" + huespedes;
    var data = encodeURI(data);
    console.log(data)
    window.location = 'explorar.php' + data
}