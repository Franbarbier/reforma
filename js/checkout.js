function verUsuario(){

    fetch('php/api/usuarios.php?func=verUsuario')
        .then(function (response) {
            return response.json();
        })
        .then(function (res) {
            console.log(res)
        });

}

function comp_noche_gratis(){

    $(document).on('click', '.canjear', function(){

        $('#tabla-detalle-final .noche-gratis').remove()
        var noche_aplicada = `<tr class="noche-aplicada">
                                <td><span>Noche gratis!</span></td>
                                <td style="text-align: right">-$${global_tarifa}</td>
                            </tr>`
        $('#tabla-detalle-final').append(noche_aplicada)

        // Vaciamos el cont de botones de pago
        $('#paypal-button-container').html('')

        var nuevo_precio_final = precio_final - global_tarifa

        $('#precio-final').html('$'+nuevo_precio_final)

        // Volvemos a renderizar los botones de paypal
        paypal.Buttons({
            createOrder: function(data, actions) {
              // This function sets up the details of the transaction, including the amount and line item details.
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: nuevo_precio_final
                  },
                  custom_id: checkout_id,
                }]
              });
            },
            onApprove: function(data, actions) {
          return actions.order.capture().then(function() {
              console.log('data: ')
              console.log(data)
               window.location = "paypal-transaction-complete.php?orderID="+data.orderID+"&noche_gratis="+noche_gratis.noche;				
          });
          }
          }).render('#paypal-button-container');


    })

    return `<tr class="noche-gratis">
                <td class="ng-text">Tenes una noche gratis disponible!</td>
                <td class="canjear-cont"><div class="canjear">Aplicar</div></td>
            </tr>`

}