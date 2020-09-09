<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- PRUEBA PARA IMPRIMIR SERVICIOS -->
<!-- <script src="amenities.js"></script>

<div id="elemento"></div>

<script>

fetch('api/propiedades.php?func=verAmenities&id=1')
  .then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    console.log(myJson);
    var e = document.getElementById('elemento')
    for(c in amenities){
        if(myJson.includes(amenities[c].id)){
            console.log(amenities[c].nombre + ' se encuentra en esta propiedad.')
        }
    }
  });

</script> -->


<!-- PRUEBA PARA CREAR UNA RESERVA -->
<!-- 
<script>

function probar(){
    
    $.ajax({
      type: "POST",
      url: 'api/reservas.php?func=crearReserva',
      data: {
          check_in: '2020-08-17',
          check_out: '2020-08-20',
          huespedes: 5,
          precio_final: 493,
          id_usuario: 1,
          id_propiedad: 1,
      },
      success:function(data){
             console.log(data)
             console.log(JSON.parse(data))
             console.log('caca')
         },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         console.log(errorThrown)
     },
        dataType: "json"
    })

}
</script> -->


<!-- PRUEBA PARA VER PROPIEDADES DISPONIBLES -->
<script>

function verDisponibles(){

  $.ajax({
      type: "POST",
      url: 'api/propiedades.php?func=verDisponibles',
      data: {
          check_in: '2020-08-20',
          check_out: '2020-08-25',
          huespedes: 10,
          ciudad: 'Bariloche',
      },
      success:function(data){
             console.log(data)
             console.log(JSON.parse(data))
             console.log('caca')
         },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         console.log(errorThrown)
     },
        dataType: "text"
    })


}

</script>