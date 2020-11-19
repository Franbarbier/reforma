<div>
    <li id="select-city">
        <img src="imgs/location-brown.svg" alt="">
        <p id="f-ciudad">Ciudad</p>
        <article>

            <div id="ciudades">
                <ul>
                    <li>Todas</li>
                    <li>Buenos Aires</li>
                    <li>San Antonio de Areco</li>
                    <li>Bariloche</li>
                </ul>
            </div>
        </article>
    </li>
    <li class="checkinli">
        <div class="checkin">    
            <img src="imgs/calendar-brown.svg" alt="">
            <div id="check-cont">
                <?php include 'calendarDesplegableApartado.php'; ?>
            </div>
        </div>
        <!-- <div>
            <img src="imgs/arrow.svg" alt="">
            <p id="f-checkout">Check-out</p>
        </div> -->
    </li>
    <li>
        <img src="imgs/cant-huespedesBrown.svg" alt="">
        <p>Huespedes</p>
        <img src="imgs/minusBrown.svg" id="filter-minus" alt="">
        <input type="number" id="filter-cant-hues" value="1">
        <img src="imgs/moreBrown.svg" id="filter-more" alt="">
    </li>
    <li id="precio">
        <aside>$</aside>
        <p>Precio</p>
        <article id="price-range">
            <div>

            
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>

<div class="easy-basket-filter">

   <div class="easy-basket-filter-histogram">
       <ul class="histogram-list">
           <li price-range-from="0" price-range-to="1000">
               <div class="histogram-height" style="height:76.85714285714286%;">
               </div>
           </li>
           <li price-range-from="1001" price-range-to="2000">
               <div class="histogram-height" style="height:10.0%;">
               </div>
           </li>
           <li price-range-from="2001" price-range-to="3000">
               <div class="histogram-height" style="height:12.57142857142857%;">
               </div>
           </li>
           <li price-range-from="3001" price-range-to="4000">
               <div class="histogram-height" style="height:56.285714285714285%;">
               </div>
           </li>
           <li price-range-from="4001" price-range-to="5000">
               <div class="histogram-height" style="height:87.14285714285714%;">
               </div>
           </li>
       </ul>
   </div>


   <div class="easy-basket-filter-info">
       <p class="iLower"><input type="text" class="easy-basket-lower" value="0" min="0" max="300" maxlength=6 id="f-minprice" /></p>
       <p class="iUpper"><input type="text" class="easy-basket-upper" value="300" min="0" max="300" maxlength=6 id="f-maxprice" /></p>
   </div>
   
   <div class="easy-basket-filter-range">
       <input type="range" class="lower range" step="any" min="0" max="300" value="0"/>
       <input type="range" class="upper range" step="any" min="0" max="300" value="300"/>
       <div class="fill"></div>
   </div>
   
   <div class="easy-basket-filter-ticks">
       <!-- <div data-value="0"></div><div data-value="100"></div><div data-value="200"></div><div data-value="300"></div><div data-value="400"></div><div data-value="500"></div><div data-value="600"></div><div data-value="700"></div><div data-value="800"></div><div data-value="900"></div><div data-value="1000"></div><div data-value="1100"></div><div data-value="1200"></div><div data-value="1300"></div><div data-value="1400"></div><div data-value="1500"></div><div data-value="1600"></div><div data-value="1700"></div><div data-value="1800"></div><div data-value="1900"></div><div data-value="2000"></div><div data-value="2100"></div><div data-value="2200"></div><div data-value="2300"></div><div data-value="2400"></div><div data-value="2500"></div><div data-value="2600"></div><div data-value="2700"></div><div data-value="2800"></div><div data-value="2900"></div><div data-value="3000"></div><div data-value="3100"></div><div data-value="3200"></div><div data-value="3300"></div><div data-value="3400"></div><div data-value="3500"></div><div data-value="3600"></div><div data-value="3700"></div><div data-value="3800"></div><div data-value="3900"></div><div data-value="4000"></div><div data-value="4100"></div><div data-value="4200"></div><div data-value="4300"></div><div data-value="4400"></div><div data-value="4500"></div><div data-value="4600"></div><div data-value="4700"></div><div data-value="4800"></div><div data-value="4900"></div><div data-value="5000"></div> -->
   </div>
   
</div>

</div>
        </article>

    </li>
    <li id="mas-filtros">
        <div>
            <img src="imgs/filters-brown.svg" alt="">
            <p>Más filtros</p>
        </div>
        <article>
            <div>
                <ul id="lista-filtros">
                    
                </ul>
            </div>
        </article>
    </li>
    <!-- <li>
        <img src="imgs/listBrown.svg" alt="">
        <p>Ordenar Por</p>
        <article>
            <div id="ordernar">
                <ul>
                    <li>Huespedes</li>
                    <li>Habitaciones</li>
                    <li>Baños</li>
                </ul>
            </div>
        </article>
    </li> -->
    <button id="aplicar">APLICAR</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script>

var global_selected_amenities = []

window.addEventListener('click', function(e){   
  if (document.getElementById('select-city').contains(e.target)){
	  if( $('#ciudades').css('display') == "none" ){
		$('#ciudades').slideDown(125)
	  }
  } else{
		$('#ciudades').slideUp(125)
  }
});

$('#ciudades li').click(function () {
	$('#select-city p').text( $(this).text() )
	$('#select-city p').css('color','#272727')


    $('#ciudades').slideUp(125)
    
    update_from_filters()
})



let servicios = {
    'Cocina completa': 'imgs/icons/kitchen.svg',
    'Lavadora': 'imgs/icons/lavanderia.svg',
    'Secadora': 'imgs/icons/secador.svg',
    'Ascensor': 'imgs/icons/ascensor.svg',
    'Calefaccion': 'imgs/icons/heater.svg',
    'Aire Acondicionado': 'imgs/icons/air-conditioner.svg',
    'Bañera': 'imgs/icons/bath.svg',
    'Smart TV': 'imgs/icons/smart-tv.svg',
    'Pileta': 'imgs/icons/swimming.svg',
    'Gimnasio': 'imgs/icons/gym.svg',
    'Wifi': 'imgs/icons/wifi.svg',
    'Espacio para estudio/trabajo': 'imgs/icons/work-space.svg',
    'Aparcamiento gratuito en la calle':'imgs/icons/parking.svg',
    'Aparcamiento de pago fuera de las instalaciones':'imgs/icons/barrier.svg'
}


Object.entries(servicios).forEach(([key, value]) => $('#mas-filtros article ul').append('<li><input type="checkbox" id="'+key+'"><label for="'+key+'">'+ key +'</label></li>') )



window.addEventListener('click', function(e){   
  if (document.getElementById('mas-filtros').contains(e.target)){
	  if( $('#mas-filtros article>div').css('display') == "none" ){
		$('#mas-filtros article>div').slideDown(125)
	  }
  } else{
		$('#mas-filtros article>div').slideUp(125)
  }
});

window.addEventListener('click', function(e){   
  if (document.getElementById('precio').contains(e.target)){
	  if( $('#price-range').css('display') == "none" ){
		$('#price-range').slideDown(125)
	  }
  } else{
		$('#price-range').slideUp(125)
  }
});



jQuery(document).ready(function() {
	$('.upper').on('input', setFill);
	$('.lower').on('input', setFill);

	var max = $('.upper').attr('max');
	var min = $('.lower').attr('min');

	function setFill(evt) {
		var valUpper = $('.upper').val();
		var valLower = $('.lower').val();
		if (parseFloat(valLower) > parseFloat(valUpper)) {
			var trade = valLower;
			valLower = valUpper;
			valUpper = trade;
		}
		
		var width = valUpper * 100 / max;
		var left = valLower * 100 / max;
		$('.fill').css('left', 'calc(' + left + '%)');
		$('.fill').css('width', width - left + '%');
		
		// Update info
		if (parseInt(valLower) == min) {
			$('.easy-basket-lower').val('0');
		} else {
			$('.easy-basket-lower').val(parseInt(valLower));
		}
		if (parseInt(valUpper) == max) {
			$('.easy-basket-upper').val($('.upper').val());
		} else {
			$('.easy-basket-upper').val(parseInt(valUpper));
		}
		$('.histogram-list li').removeClass('ui-histogram-active');
	}
	
	// изменяем диапазон цен вручную
	$('.easy-basket-filter-info p input').keyup(function() {
		var valUpper = $('.easy-basket-upper').val();
		var valLower = $('.easy-basket-lower').val();
		var width = valUpper * 100 / max;
		var left = valLower * 100 / max;
		if ( valUpper > $('.upper').val() ) {
			var left = max;
		}
		if ( valLower < 0 ) {
			var left = min;
		} else if ( valLower > max ) {
			var left = min;
		}
		$('.fill').css('left', 'calc(' + left + '%)');
		$('.fill').css('width', width - left + '%');
		// меняем положение ползунков
		$('.lower').val(valLower);
		$('.upper').val(valUpper);
	});
	$('.easy-basket-filter-info p input').focus(function() {
		$(this).val('');
	});
	$('.easy-basket-filter-info .iLower input').blur(function() {
		var valLower = $('.lower').val();
		$(this).val(Math.floor(valLower));
	});
	$('.easy-basket-filter-info .iUpper input').blur(function() {
		var valUpper = $('.upper').val();
		$(this).val(Math.floor(valUpper));
	});
	
	$('.histogram-list li').click(function() {
		$('.histogram-list li').removeClass('ui-histogram-active');
		var range_from = $(this).attr('price-range-from');
		var range_to = $(this).attr('price-range-to');
		var width = range_to * 100 / max;
		var left = range_from * 100 / max;
		$('.easy-basket-lower').val(range_from);
		$('.easy-basket-upper').val(range_to);
		$('.fill').css('left', 'calc(' + left + '%)');
		$('.fill').css('width', width - left + '%');
		$('.lower').val(range_from);
		$('.upper').val(range_to);
		$(this).addClass('ui-histogram-active');
	});
});

// Creamos el array de servicios requeridos a medida que clickeamos el checkbox
var first_click = true
$(document).on("click", "#lista-filtros li label", function(e){
    e.stopPropagation()
    if(first_click){
        first_click = false
        // var amenity = $(this).find('input').attr('id')
        var amenity = $('#lista-filtros li label').index($(this)) + 1
        console.log(amenity)

        
        if(!global_selected_amenities.includes(amenity)){
            global_selected_amenities.push(amenity)
        }else{
            var index = global_selected_amenities.indexOf(amenity);
            global_selected_amenities.splice(index, 1);
        }
        
        console.log(global_selected_amenities)
    }

    setTimeout(() => {
        first_click = true
    }, 200);

    update_from_filters()

})

// Listeners que a medida que cambian los valores de la barra, llaman a la funcion "update_from_filters"
    $(document).on("click", "#filter-more", function(){
    $('#filter-cant-hues').val( parseInt($('#filter-cant-hues').val()) + 1 )
    update_from_filters()
})
    $(document).on("click", "#filter-minus", function(){
	if ($('#filter-cant-hues').val() > 1) {
        $('#filter-cant-hues').val( parseInt($('#filter-cant-hues').val()) - 1 )
        update_from_filters()
		
	}
})

$(document).on("mouseup", ".range", function(){
    update_from_filters()
})


</script>