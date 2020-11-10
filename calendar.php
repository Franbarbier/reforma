<!DOCTYPE html>

<html lang="es">

<head>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="calendar/Lightpick-master/css/lightpick.css">
    <link rel="stylesheet" type="text/css" media="(min-width: 800px)" href="css/calendar-desk.css" />
	<link rel="stylesheet" type="text/css" media="(max-width: 799px)" href="css/calendar-desk.css" />
    
</head>

<body>

<input type="text" id="demo-3_1"/>
<input type="text" id="demo-3_2"/>
<p id="result-3">&nbsp;</p>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="calendar/Lightpick-master/lightpick.js"></script>

<script>

$( document ).ready( function(){


var fechasTomadas = ['2020-11-22', '2020-12-30']

// var picker = new Lightpick({ field: document.getElementById('datepicker') });

var picker = new Lightpick({
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
    // disableDates: ['2020-11-20', '2020-11-30'] ,
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
        
        // Actualizamos valores del checkin checkout
        setTimeout(() => {

            var start_date = unix_to_ymd($('.is-start-date').attr('data-time'))
            var end_date = unix_to_ymd($('.is-end-date').attr('data-time'))


            // Si nos de undefined, intentamos usar los start date y end date de la URL. Sino, lo dejamos vacio.
            if($('.is-start-date').attr('data-time')==undefined && $('.is-end-date').attr('data-time') == undefined){

                start_date = urlParams.get('check_in')
                end_date = urlParams.get('check_out')

                if(start_date==null || end_date ==null){
                    start_date = ''
                    end_date = ''
                }

                picker.setDateRange(start_date, end_date)

            }

            // Actualizamos los global checkin checkout
            $('#checkin').html(start_date)
            $('#checkout').html(end_date)

            tarifa_final()
        
        }, 200);
    }
});

    
if(!$('#checkin').html().includes('Check') && !$('#checkin').html().includes('Check')){
    var start_date = $('#checkin').html().replace(/ /g,'')
    var end_date = $('#checkout').html().replace(/ /g,'')

    console.log(start_date + ', ' + end_date )
    picker.setDateRange(start_date, end_date)
}


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


});
</script>

</html>