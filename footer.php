<style>
/* @media (min-width: 7900px) { */
footer{
    background: #fafafa;
    border-top: 1px solid #dadada;
    padding-top: 10vh;
    color: #4e4e4e;
}
footer form{
    width: 30%;
}
footer form p{
    font-weight: 600;
    font-size: .75em;
}
footer form h6{
    font-size: 2.5em;
}
footer form input{
    display: block;
    width: 60%;
    border: #b3b3b3 1px solid;
    border-radius: 2px;
    padding: 6px 12px;
    font-weight: 600;
    background: none;
    color: #4e4e4e;
    margin: 3% 0px;
}

#suscribir{
    background: #d4bfaa;
    border: 2px solid #d4bfaa;
    color: white;
    font-weight: 600;
    font-size: 0.8em;
    letter-spacing: .5px;
    padding: 6px 12px;
    border-radius: 2px;
    cursor: pointer;
    transition: .15s;
    width: fit-content;
}
#suscribir:hover{
    background: transparent;
    color: #d4bfaa;

}

footer>div>div{
    width: 15%;
}
footer b{
    font-size: .75em;
}
footer ul{
    margin-top: 25px;
}
footer li{
    font-size: .75em;
    margin: 10% 0;
    font-weight: 600;
    display: flex;
    cursor: pointer;
    transition: .13s;
    align-items: center;
}
footer li img{
    width: 12px;
    margin-right: 7px;
}

footer li:hover{
    opacity: .75
}

#tyc-cont{
    width: 90%;
    margin: 5% auto;
    display: flex;
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #dadada;
    padding: 2% 0;
    font-weight: 600;
    font-size: 0.8em;
    margin-bottom: 0;
}
/* } */


/* empieza mob */
@media (max-width: 799px) {
footer form{
    width: 100%;
}
footer ul{
    margin-top: 15px;
}
footer>div>div{
    margin-top: 10%;
    width: 25%;
}
footer>div>div:nth-child(2){
    width: 10%
}

footer .cont90{
    flex-wrap: wrap;
    flex-direction: row;
}
#tyc-cont{
    padding: 6% 0;
}
#tyc-cont a{
    border-bottom: 2px solid #dadada;
}

}/* Termina el mob */
</style>

<footer>
    <div class="cont90">
        <form action="">
            <p>Para novedades y promociones:</p>
            <h6>Suscribite:</h6>
            <input type="email" placeholder="ejemplo@gmail.com">
            <input id="suscribir" type="submit" value="ENVIAR">
        </form>
        <div>
            <b>REFORMA</b>
            <ul>
                <li><a href="#seccion-destinos">Destinos</a></li>
                <li><a href="#seccion-proceso">Proceso</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                
            </ul>
        </div>
        <div>
            <b>CONTACTO</b>
            <ul>
                <li>administracion@reformastays.co</li>
                <li>reservas@reformastays.co</li>
                <li>+54 9 11 3568-8874</li>
            </ul>
        </div>
        <div>
            <b>SOCIAL</b>
            <ul>
                <a target="_blank" href="https://www.instagram.com/reforma.stays/"><li><img src="imgs/instagram.svg" alt="">Instagram</li></a>
                <a target="_blank" href="https://www.pinterest.es/"><li><img src="imgs/pinterest.svg" alt="">Pinterest</li></a>
                <a target="_blank" href="https://www.facebook.com/Reforma-Stays-101407415046747"><li><img src="imgs/facebook.svg" alt="">Facebook</li></a>
                <li><img src="imgs/edit.svg" alt="">Blog</li>
            </ul>
        </div>
    </div>
    <div id="tyc-cont">
        <span>© Reforma Co. All rights reserved.</span>
        <a href="">Términos y condiciones</a>
    </div>  
</footer>