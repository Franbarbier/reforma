function verUsuario(){

    fetch('php/api/usuarios.php?func=verUsuario')
        .then(function (response) {
            return response.json();
        })
        .then(function (res) {
            console.log(res)
        });

}