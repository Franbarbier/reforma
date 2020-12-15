<div id="testimonios">
	<!-- 
	use the left and right arrow keys on your keyboard or just swipe left and right on your smart phone to interact with the slider
-->

<section id="testim" class="testim">
            <div class="wrap">

                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                <ul id="testim-dots" class="dots">
                    <li class="dot active"><img src="imgs/quotes/maria.jpg"></li>
                    <li class="dot"><img src="imgs/quotes/luis.jpg"></li>
                    <li class="dot"><img src="imgs/quotes/victoria.jpg"></li>
                     <li class="dot"><img src="imgs/quotes/yvan.jpg"></li>
                     <li class="dot"><img src="imgs/quotes/juan.jpg"></li>
                     <li class="dot"><img src="imgs/quotes/agustina.jpg"></li>
                </ul>
                <aside>‘‘</aside>
                <div id="testim-content" class="cont">
                    <div>
                        <p>El departamento es muy lindo, el edificio y la ambientación son espectaculares. Las respuestas y el trato por parte del equipo de Reforma impecable.</p>                    
                        <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Maria</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>Buenos Aires</figcaption>
							</figure>
						</div>
                    </div>
                    
                   <div class="active">
                       <p>Espectacular apartamento y muy buena atención de Reforma.</p>                    
                       <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Luis</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>Buenos Aires</figcaption>
                            </figure>
                        </div>
                    </div>
                    
                    <div>
                        <p>Estadia simplemente perfecta. Sin dudas volveremos...</p>                    
                        <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Victoria</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>San Antonio de Areco</figcaption>
							</figure>
                        </div>
                    </div>


                    <div>
                        <p>La casa y la Estancia son un verdadero encanto. El asistente de Reforma siempre predispuesto a colaborar.</p>                    
                        <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Yvan</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>San Antonio de Areco</figcaption>
							</figure>
                        </div>
                    </div>
                    <div>
                        <p>Super recomendable. Todo de super calidad!</p>                    
                        <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Juan</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>San Antonio de Areco</figcaption>
							</figure>
                        </div>
                    </div>
                    <div>
                        <p>Muy lindo el departamento, excelente ubicación, limpio y ordenado.</p>                    
                        <div class="data-autor">
							<figure>
								<img src="imgs/huespedMarron.svg" alt="">
								<figcaption>Agustina</figcaption>
							</figure>
							<figure>
								<img src="imgs/location-brown.svg" alt="">
								<figcaption>Buenos Aires</figcaption>
							</figure>
                        </div>
                    </div>

            </div>
    </section>


</div>
<style>
	/*@import url(//cdn.rawgit.com/rtaibah/dubai-font-cdn/master/dubai-font.css);*/

/* .arrow, .dots, .img, #test{
    display: none!important;
} */
.arrow, #test{
    display: none!important;
}
.inactive .data-autor{
    display:none;
    opacity: 0;

}
.active .data-autor{
    display: flex;
    opacity: 1;
}
#testim aside{
    font-weight: 800;
  line-height: 0.25;
  color: #d4bfaa;
  font-size: 4.5em;
  user-select: none;
  font-style: italic;
}
#testimonios{
	width: 100%;
	margin: 0;
	padding: 0;
}
.testim {
	width: 100%;
	padding: 4% 0;
	background: transparent;
}

.testim .wrap {
    position: relative;
    display: block;
    height: 152.5px;
}

.testim .arrow {
    display: block;
    position: absolute;
    color: #eee;
    cursor: pointer;
    font-size: 2em;
    top: 50%;
    -webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		-moz-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		transform: translateY(-50%);
    -webkit-transition: all .3s ease-in-out;    
    -ms-transition: all .3s ease-in-out;    
    -moz-transition: all .3s ease-in-out;    
    -o-transition: all .3s ease-in-out;    
    transition: all .3s ease-in-out;
    padding: 5px;
    z-index: 22222222;
}

.testim .arrow:before {
		cursor: pointer;
}

.testim .arrow:hover {
    color: #bc8c3e;
}
    

.testim .arrow.left {
    left: 10px;
}

.testim .arrow.right {
    right: 10px;
}

.testim .dots {
    position: absolute;
    left: -40%;
    height: 137%;
    transform: translateY(-8%);
    width: 27%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.testim .dots .dot {
    list-style-type: none;
    /* display: inline-block; */
    width: 4.2vw;
    height: 4.2vw;
    border-radius: 50%;
    border: 2px solid #eee;
    /* transition: none!important; */
    cursor: pointer;
    -webkit-transition: all .5s ease-in-out;
    -ms-transition: all .5s ease-in-out;
    -moz-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;
    position: relative;
}
.testim .dots .dot img{
    object-fit: ;
    width: 80%;
    height: 80%;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
}


.testim .dots .dot.active,
.testim .dots .dot:hover {
    border-color:#d4bfaa;
    /* border-color: #bc8c3e; */
}

.testim .dots .dot.active {
    -webkit-animation: testim-scale .5s ease-in-out forwards;   
    -moz-animation: testim-scale .5s ease-in-out forwards;   
    -ms-animation: testim-scale .5s ease-in-out forwards;   
    -o-animation: testim-scale .5s ease-in-out forwards;   
    animation: testim-scale .5s ease-in-out forwards;   
}
    
.testim .cont {
    position: absolute;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.testim .cont > div {
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 0 5% 0;
    opacity: 0;
    width: 93%;
    display: grid;
    height: 100%;
}

.testim .cont > div.inactive {
    opacity: 1;
}
    

.testim .cont > div.active {
    position: relative;
    opacity: 1;
}
    

.testim .cont div .img img {
    display: block;
    width: 100px;
    height: 100px;
    margin: auto;
    border-radius: 50%;
}

.testim .cont div h5 {
    font-size: 1em;
    margin: 15px 0;
}

.testim .cont div p {
    color: #909090;
  font-weight: 600;
  font-size: 1.5em;
  font-style: italic;
}

.testim .cont div.active .img img {
    -webkit-animation: testim-show .5s ease-in-out forwards;            
    -moz-animation: testim-show .5s ease-in-out forwards;            
    -ms-animation: testim-show .5s ease-in-out forwards;            
    -o-animation: testim-show .5s ease-in-out forwards;            
    animation: testim-show .5s ease-in-out forwards;            
}

.testim .cont div.active h5 {
    -webkit-animation: testim-content-in .4s ease-in-out forwards;    
    -moz-animation: testim-content-in .4s ease-in-out forwards;    
    -ms-animation: testim-content-in .4s ease-in-out forwards;    
    -o-animation: testim-content-in .4s ease-in-out forwards;    
    animation: testim-content-in .4s ease-in-out forwards;    
}

.testim .cont div.active p {
    -webkit-animation: testim-content-in .5s ease-in-out forwards;    
    -moz-animation: testim-content-in .5s ease-in-out forwards;    
    -ms-animation: testim-content-in .5s ease-in-out forwards;    
    -o-animation: testim-content-in .5s ease-in-out forwards;    
    animation: testim-content-in .5s ease-in-out forwards;    
}

.testim .cont div.inactive .img img {
    -webkit-animation: testim-hide .5s ease-in-out forwards;            
    -moz-animation: testim-hide .5s ease-in-out forwards;            
    -ms-animation: testim-hide .5s ease-in-out forwards;            
    -o-animation: testim-hide .5s ease-in-out forwards;            
    animation: testim-hide .5s ease-in-out forwards;            
}

.testim .cont div.inactive h5 {
    -webkit-animation: testim-content-out .4s ease-in-out forwards;        
    -moz-animation: testim-content-out .4s ease-in-out forwards;        
    -ms-animation: testim-content-out .4s ease-in-out forwards;        
    -o-animation: testim-content-out .4s ease-in-out forwards;        
    animation: testim-content-out .4s ease-in-out forwards;        
}

.testim .cont div.inactive p {
    -webkit-animation: testim-content-out .5s ease-in-out forwards;    
    -moz-animation: testim-content-out .5s ease-in-out forwards;    
    -ms-animation: testim-content-out .5s ease-in-out forwards;    
    -o-animation: testim-content-out .5s ease-in-out forwards;    
    animation: testim-content-out .5s ease-in-out forwards;    
}

@-webkit-keyframes testim-scale {
    0% {
        -webkit-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -webkit-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -webkit-box-shadow: 0px 0px 10px 5px #d4bfaa;        
        box-shadow: 0px 0px 10px 5px #d4bfaa;        
    }

    100% {
        -webkit-box-shadow: 0px 0px 0px 0px #d4bfaa;        
        box-shadow: 0px 0px 0px 0px #d4bfaa;        
    }
}

@-moz-keyframes testim-scale {
    0% {
        -moz-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -moz-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -moz-box-shadow: 0px 0px 10px 5px #d4bfaa;        
        box-shadow: 0px 0px 10px 5px #d4bfaa;        
    }

    100% {
        -moz-box-shadow: 0px 0px 0px 0px #d4bfaa;        
        box-shadow: 0px 0px 0px 0px #d4bfaa;        
    }
}

@-ms-keyframes testim-scale {
    0% {
        -ms-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -ms-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -ms-box-shadow: 0px 0px 10px 5px #d4bfaa;        
        box-shadow: 0px 0px 10px 5px #d4bfaa;        
    }

    100% {
        -ms-box-shadow: 0px 0px 0px 0px #d4bfaa;        
        box-shadow: 0px 0px 0px 0px #d4bfaa;        
    }
}

@-o-keyframes testim-scale {
    0% {
        -o-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -o-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -o-box-shadow: 0px 0px 10px 5px #d4bfaa;        
        box-shadow: 0px 0px 10px 5px #d4bfaa;        
    }

    100% {
        -o-box-shadow: 0px 0px 0px 0px #d4bfaa;        
        box-shadow: 0px 0px 0px 0px #d4bfaa;        
    }
}

@keyframes testim-scale {
    0% {
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        box-shadow: 0px 0px 10px 5px #d4bfaa;        
    }

    100% {
        box-shadow: 0px 0px 0px 0px #d4bfaa;        
    }
}

@-webkit-keyframes testim-content-in {
    from {
        opacity: 0;
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -webkit-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-moz-keyframes testim-content-in {
    from {
        opacity: 0;
        -moz-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -moz-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-ms-keyframes testim-content-in {
    from {
        opacity: 0;
        -ms-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -ms-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-o-keyframes testim-content-in {
    from {
        opacity: 0;
        -o-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -o-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@keyframes testim-content-in {
    from {
        opacity: 0;
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        transform: translateY(0);        
    }
}

@-webkit-keyframes testim-content-out {
    from {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -webkit-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-moz-keyframes testim-content-out {
    from {
        opacity: 1;
        -moz-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -moz-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-ms-keyframes testim-content-out {
    from {
        opacity: 1;
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -ms-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-o-keyframes testim-content-out {
    from {
        opacity: 1;
        -o-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@keyframes testim-content-out {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        transform: translateY(-100%);        
    }
}

@-webkit-keyframes testim-show {
    from {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -webkit-transform: scale(1);       
        transform: scale(1);       
    }
}

@-moz-keyframes testim-show {
    from {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -moz-transform: scale(1);       
        transform: scale(1);       
    }
}

@-ms-keyframes testim-show {
    from {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -ms-transform: scale(1);       
        transform: scale(1);       
    }
}

@-o-keyframes testim-show {
    from {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -o-transform: scale(1);       
        transform: scale(1);       
    }
}

@keyframes testim-show {
    from {
        opacity: 0;
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        transform: scale(1);       
    }
}

@-webkit-keyframes testim-hide {
    from {
        opacity: 1;
        -webkit-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
}

@-moz-keyframes testim-hide {
    from {
        opacity: 1;
        -moz-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }
}

@-ms-keyframes testim-hide {
    from {
        opacity: 1;
        -ms-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }
}

@-o-keyframes testim-hide {
    from {
        opacity: 1;
        -o-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }
}

@keyframes testim-hide {
    from {
        opacity: 1;
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        transform: scale(0);
    }
}


@media all and (max-width: 800px) {
.testim .wrap {
    height: 175px;
}

}
</style>
<script src="https://use.fontawesome.com/1744f3f671.js"></script>
<script>
	// vars
'use strict'
var	testim = document.getElementById("testim"),
		testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 7500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
		touchStartPos,
		touchEndPos,
		touchPosDiff,
		ignoreTouch = 30;
;

window.onload = function() {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length-1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");            
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;
    
        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })    

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;
                
            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })
		
		testim.addEventListener("touchstart", function(e) {
				touchStartPos = e.changedTouches[0].clientX;
		})
	
		testim.addEventListener("touchend", function(e) {
				touchEndPos = e.changedTouches[0].clientX;
			
				touchPosDiff = touchStartPos - touchEndPos;
			
				console.log(touchPosDiff);
				console.log(touchStartPos);	
				console.log(touchEndPos);	

			
				if (touchPosDiff > 0 + ignoreTouch) {
						testimLeftArrow.click();
				} else if (touchPosDiff < 0 - ignoreTouch) {
						testimRightArrow.click();
				} else {
					return;
				}
			
		})
}
</script>