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


// SI SCROLLEAN
$(window).scroll( function(){
    
    let bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    let top_of_screen = $(window).scrollTop();   
	
    if (top_of_screen > 400) {
        console.log(top_of_screen)
        $('nav').css('background-image',' linear-gradient( #fafafa 100%, transparent 0%)')
        $('#select-city-nav').fadeIn(200)
        if ($(window).width() > 800) {
            $('#select-city-nav').css('display','flex')
        }
    }else{
        $('nav').css('background-image',' linear-gradient( #fafafa 0%, transparent 0%)')
        $('#select-city-nav').fadeOut(200)
    }

}); // termina el F() scroll

