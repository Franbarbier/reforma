<!DOCTYPE html>

<html lang="es">

<head>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="calendar/Lightpick-master/css/lightpick.css">
    <link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/calendar-desk-hidden.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/calendar-mob.css" />

</head>

<body>


<div>
    <label for="">
        <img src="imgs/calendar-black.svg" alt="">
    </label>
    <div id="checkin">
        <input type="text" placeholder="Llegada" class="inputs" id="demo-3_1_1"/>
    </div>
</div>
<div>
    <label for="">
        <img src="imgs/checkout-black.svg" alt="">
    </label>
    <div id="checkout">
     <input type="text" placeholder="Salida" class="inputs" id="demo-3_2_1"/>
    </div>
</div>
<p style="display:none;" id="result-3_1">&nbsp;</p>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="calendar/Lightpick-master/lightpick.js"></script>

<script>

$( document ).ready( function(){


// var picker = new Lightpick({ field: document.getElementById('datepicker') });
// var picker = new Lightpick({
//     field: document.getElementById('demo-3_1'),
//     secondField: document.getElementById('demo-3_2'),
//     singleDate: false,
//     onSelect: function(start, end){
//         var str = '';
//         str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
//         str += end ? end.format('Do MMMM YYYY') : '...';
//         document.getElementById('result-3').innerHTML = str;
//     }
// });
var picker = new Lightpick({
    field: document.getElementById('demo-3_1_1'),
    secondField: document.getElementById('demo-3_2_1'),
    singleDate: true,
    lang: 'es',
    minDate: new Date(),
    hoveringTooltip: false,
    footer: true,
    numberOfColumns: 3,
    orientation: "bottom right",
    numberOfMonths: 2,
    // disableDates: ['2020-11-20', '2020-11-30'] ,
    disabledDatesInRange: false,
    tooltipNights: true,

    locale: {
        buttons: {
            prev: '«', 
            next: '»',
            close: '×',
            reset: 'Resetear fechas'
        }
    },
    dropdowns: true,

    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        document.getElementById('result-3_1').innerHTML = str;
        
        // Actualizamos valores del checkin checkout

            var start_date = start.format("YYYY-MM-DD")
            var end_date = end.format("YYYY-MM-DD")

            // Actualizamos los global checkin checkout
            $('#demo-3_1_1, #demo-3_2_1').css('background-image','')
            
            // Tarifa final solo se va a ejecutar en apartado.php
            if (window.location.href.indexOf("apartado") > -1) {
                tarifa_final()
                // Actualizamos el calendario de el body de apartado
                if(start_date!=end_date){
                }
                picker2.setDateRange(start_date, end_date)

            }

            // Update from filters solo se ejecuta si estan en explorar
            if (window.location.href.indexOf("explorar") > -1) {
                update_from_filters()
            }
        
    }
});


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

var d = new Date();
var m = d.getMonth();


// console.log( daysInMonth( m,2020) )
var l = new Date("2020-10-01");


const meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
const dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ]


})


</script>

</html>