<style>
#allmenu{
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    display:none;
}
#menu-overlay{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,0.7);
    z-index: 95;
    display:none;
}
#menu-desp{
    position: absolute;
    height: 100vh;
    background: white;
    top: 0;
    right: 0;
    z-index: 98;
    width: 20%;
    padding: 10% 5%;
    border-left: 1px solid #d4bfaa;
    transition: 0.5s cubic-bezier(0.13, 0.77, 0.33, 1);
    transform: translateX(100%)

}
#menu-desp ul li{
    margin: 13px 0;
    padding: 13px;
    border-radius: 2px;
    font-size: 1.1em;
    color:#5e5e5e;
    cursor: pointer;
    transition: 0.5s cubic-bezier(0.13, 0.77, 0.33, 1);
    position: relative;
    z-index: 25;
}
#menu-desp ul li:before{
    content: '';
    position: absolute;
    z-index: -1;
    top: 90%;
    left: 0%;
    transform: translateY(-50%) rotateY(90deg);
    width: 100%;
    height: 7%;
    background: #d4bfaa;
    transition: 0.8s cubic-bezier(0.13, 0.77, 0.33, 1);
}
#menu-desp ul li:hover:before{
    transform: translateY(-50%)
}
#menu-desp ul li:hover{
    /* color: white; */
    opacity: 0.7;
    letter-spacing: 2px;
}


.menu-open{
    transition: 0.5s cubic-bezier(0.13, 0.77, 0.33, 1);
    transition-delay: 0.15s;
}
.menu-open>div>div{

}
.menu-open #linea-menu1{
    transform: translateY(4.5px)
}
.menu-open #linea-menu2{
    transform: translateY(-4.5px)
}
#menu-desp.allmenuopen {
    transform: translateX(0%)!important
}


#logeado{
    display: none
}


@media only screen and (max-width: 800px) {
    .menu-open #linea-menu1{
    transform: translateY(6.5px)
}
.menu-open #linea-menu2{
    transform: translateY(-6.5px)
}

#menu-desp{
    width: 60%;
    padding-top: 20vh;
}


}

#sin-logear, #con-logear{
    display: none;
}


</style>


<div id="allmenu">
    <div id="menu-overlay"></div>
    <div id="menu-desp">
        <div>
            <ul>
                <div id="sin-logear">
                    <li id="registrarse-btn"><a href="login.php?regitrar">CREAR CUENTA</a></li>
                    <li><a href="login.php?login">INICIAR SESION</a></li>
                </div>
                <div id="con-logear">
                    <li><a href="perfil.php">MI PERFIL</a></li>
                </div>
                <li><a href="/#seccion-proceso">NUESTRO PROCESO PARA REFORMAR</a></li>
                <li><a href="nosotros.php">SOBRE NOSOTROS</a></li>
            </ul>
        </div>
    </div>

</div>

<script>
$( document ).ready( function(){

$('#menu-cont').click(function(){
    $('#allmenu').fadeToggle(400)
    $(this).toggleClass('menu-open')
    $('#menu-desp').toggleClass('allmenuopen')
    $('#menu-overlay').fadeToggle(400)

})

$('#menu-overlay').click(function (event) 
{
   if(!$(event.target).closest('#menu-desp').length && !$(event.target).is('#menu-desp')) {
     $('#allmenu').fadeToggle(400)
     $("#menu-desp").toggleClass('allmenuopen')
     $($(this)).fadeToggle(400)
     $('#menu-cont').toggleClass('menu-open')
   }     
});


if ($('#logeado').val() === "si") {
    $('#con-logear').css('display',"block")
}else{
    $('#sin-logear').css('display',"block")
}

});
</script>