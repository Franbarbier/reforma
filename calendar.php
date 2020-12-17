<!DOCTYPE html>

<html lang="es">

<head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="calendar/Lightpick-master/css/lightpick.css">
    <link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/calendar-desk.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/calendar-mob.css" />
    
</head>

<body>

<input type="text" id="demo-3_1"/>
<input type="text" id="demo-3_2"/>
<p id="result-3">&nbsp;</p>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="calendar/Lightpick-master/lightpick.js"></script>

<script>

// $( document ).ready( function(){

<<<<<<< HEAD
//  Si no esta en apartado. creamos una variable vacia para global_ocupadas
if (!window.location.href.indexOf("apartado") > -1) {
    var global_ocupadas = [];
}
=======
// var fechasOcupas = ['2020-12-20', '2020-12-30', '2021-1-6'];
>>>>>>> b123952157fe0fd3cd0f54bcdb37b8aace178ac5


var picker2 = new Lightpick({
    field: document.getElementById('demo-3_1'),
    secondField: document.getElementById('demo-3_2'),
    singleDate: false,
    lang: 'es',
    minDate: new Date(),
    hoveringTooltip: false,
    footer: true,
    numberOfColumns: 3,
    orientation: "top left",
    numberOfMonths: 2,
    disableDates: global_ocupadas,
    disabledDatesInRange: false,
    tooltipNights: true,
    inline: true,
    locale: {
        buttons: {
            prev: '«', 
            next: '»',
            close: '×',
            reset: 'Resetear fechas'
        }
    },
    dropdowns: false,

    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        document.getElementById('result-3').innerHTML = str;
    
        start_date = start.format("YYYY-MM-DD")
        end_date = end.format("YYYY-MM-DD")
        if(end_date == start_date){
            end_date = ''
        }

        // Si nos de undefined, intentamos usar los start date y end date de la URL. Sino, lo dejamos vacio.
        if($('.is-start-date').attr('data-time')==undefined && $('.is-end-date').attr('data-time') == undefined){

            start_date = urlParams.get('check_in')
            end_date = urlParams.get('check_out')

            if(start_date==null || end_date ==null){
                start_date = ''
                end_date = ''
            }

            picker2.setDateRange(start_date, end_date)

        }

        start_date = start_date.replace(/\-/g,'/')
        end_date = end_date.replace(/\-/g,'/')

        // Convirtiendo el d-m-y a Y-m-d
        var start_date = start_date.split("/").reverse().join("/");
        var end_date = end_date.split("/").reverse().join("/");

        // Tarifa final solo se va a ejecutar en apartado.php
        if (window.location.href.indexOf("apartado") > -1) {
            $('#checkin input').val(start_date)
            $('#checkout input').css('background-image', '')
            $('#checkout input').val(end_date)
            $('#checkin input').css('background-image', '')
            tarifa_final()
        }
        
        setTimeout(() => {
            check_ocupadas();
        }, 250);
        
    }
});

    
// if(!$('#checkin').html().includes('Check') && !$('#checkin').html().includes('Check')){
//     var start_date = $('#checkin').html().replace(/ /g,'')
//     var end_date = $('#checkout').html().replace(/ /g,'')

//     console.log(start_date + ', ' + end_date )
//     picker2.setDateRange(start_date, end_date)
// }


function unix_to_ymd(timestamp){

    timestamp = parseInt(timestamp)

    var date = new Date(timestamp);

    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();

    return year + "-" + month +"-" + day

}

function ymd_to_unix(ymd_date){

}


function disable_dates(dates_array){

    for(date in dates_array){

        var unix_date = ymd_to_unix(dates_array[date])

        $( ".lightpick__day[data-time='"+unix_date+"']").css('color', 'red')

    }

}


// Month here is 1-indexed (January is 1, February is 2, etc). This is because we're using 0 as the day so that it returns the last day of the last month, so you have to add 1 to the month number so it returns the correct amount of days

function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}

const meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
const dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ]

for (let index = 0; index < fechasOcupas.length; index++) {
    var ocuapa2 = fechasOcupas[index];
    $('#'+ocuapa2).addClass('ocupa2') 
}


// });
</script>

</html>