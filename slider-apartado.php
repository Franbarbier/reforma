	<!-- flickity, para sliders -->

    <script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>


<!-- Flickity HTML init -->
<div class="carousel" data-flickity='{ "groupCells": true }'>
  <!-- <div onmousedown="mouseDown()" class="carousel-cell"></div> -->
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/26f8f62a-2341-4edf-beed-81349fc0eb47.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/2d6c1d7a-e1ed-4e53-a2d4-ba0d2a3c79f9.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/b7d28049-7fcf-46c9-a9da-5a0dc13a279c.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/a4193aea-dd1b-45d9-b120-380f6fc280b4.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/6a8e5d46-e51b-4f7d-8262-db7b0e480e35.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/010407cc-f86e-4579-a9f6-0eacdfb79c95.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/60aa029c-2b09-4da0-9f82-39e0ab2487d1.jpg" alt="">
  </div>
  <div class="carousel-cell">
      <img src="https://a0.muscache.com/im/pictures/fcc4c745-ec92-45c6-9852-dbb20574c231.jpg" alt="">
  </div>
</div>



<style>
    /* external css: flickity.css */

* { box-sizing: border-box; }

body { font-family: sans-serif; }

.carousel {
    height: 40vh;
    outline: none;
    
    margin-left: -10%;
    width: 120%;

}
.flickity-slider{
    height: 40vh;
    position: relative;

}
.flickity-viewport{
    /* width: 115%;
    margin-left: -7.5%; */
}
.carousel-cell {
  width: 28%;
  height: 100%;
  counter-increment: carousel-cell;
  overflow: hidden;
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  cursor: pointer;
}

.carousel-cell.is-selected {
}

.flickity-button{  
    position: absolute;
    background-color: #d4bfaa;
    padding: 5px;
    cursor: pointer;
    opacity: .7;
    transition: .2s;
    bottom: 5%;
    width: 50px;
    top: 32vh;
    transform: translateY(-50%);
    border: none;
    border-radius: 2px;
    height: 40px;
    width: 40px;
    left: 1.5%;
} 
.flickity-button:hover{
    opacity: 1;
}  

.next{
    left: 94.5%!important;
}
.flickity-button svg{ 
    width: 18px;
    transform: translate(0%, 10%);
}  
.carousel img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
@media only screen and (max-width: 800px) {
  .next {
    left: 88%!important;

  }
}

</style>

<script>
$(document).ready(function(){



$('.carousel-cell').on('mousedown', function (evt) {
console.log('asd')

})

$('.carousel-cell').on('click', function (evt) {
console.log('click')

})


// $( "h1" )
//   .mouseup(function() {
//     $( this ).css( 'opacity','1');
//   })
//   .mousedown(function() {
//     $( this ).css( 'opacity','0');
//   });


});
</script>