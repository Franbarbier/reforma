
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8Qo1frNfH6ocqoAIjuiygiTvzwJ8R7tI"></script>


    <style>
    html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
#map {
  height: 100%;
}

/* 
.marker{
    position: absolute;
    left: 50%;
    top: 50%;
    

} */

.marker div{
    background-color: #d4bfaa;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 45px;
    width: 45px;
    cursor: pointer;
}


.marker div img{
    
}

</style>
    

<div id="map"></div>


<script>



const createHTMLMapMarker = ({ OverlayView = google.maps.OverlayView,  ...args }) => {
  class HTMLMapMarker extends OverlayView {

  constructor() {
    super();
    this.latlng = args.latlng;
    this.html = args.html;
    this.setMap(args.map);
  }

  createDiv() {
    this.div = document.createElement('div');
    this.div.style.position = 'absolute';
    if (this.html) {
      this.div.innerHTML = this.html;
    }
    google.maps.event.addDomListener(this.div, 'click', event => {
      google.maps.event.trigger(this, 'click');
    });
  }

  appendDivToOverlay() {
    const panes = this.getPanes();
    panes.overlayLayer.appendChild(this.div);
  }

  positionDiv() {
    const point = this.getProjection().fromLatLngToDivPixel(this.latlng);
    if (point) {
      this.div.style.left = `${point.x}px`;
      this.div.style.top = `${point.y}px`;
    }
  }

  draw() {
    if (!this.div) {
      this.createDiv();
      this.appendDivToOverlay();
    }
    this.positionDiv();
    
    
    
  }

  remove() {
    if (this.div) {
      this.div.parentNode.removeChild(this.div);
      this.div = null;
    }
  }

  getPosition() {
    return this.latlng;
  }

  getDraggable() {
    return false;
  }


  }

  return new HTMLMapMarker();
};

// export default createHTMLMapMarker;

// Objeto markers
markers_obj = [
    {
        "price": 20,
        "lat_lng": new google.maps.LatLng(-34.586911, -58.388361),
        "name": "Pruebita 1!",
    },
    {
        "price": 30,
        "lat_lng": new google.maps.LatLng(-34.286911, -58.388361),
        "name": "Pruebita 2!"
    },
    {
        "price": 40,
        "lat_lng": new google.maps.LatLng(-33.986911, -58.388361),
        "name": "Pruebita 3!"
    }
]

var center_lat_lng = new google.maps.LatLng(-34.586911, -58.388361);
const mapOptions = {
  zoom: 14,
  center: center_lat_lng,
  styles: [
			{
				featureType: "all",
				stylers: [{ saturation: -100 }, { gamma: 0.8 }]
			},
			{
				featureType: "poi",
				stylers: [{ visibility: "off" }]
			},
			{
				featureType: "transit",
				stylers: [{ visibility: "off" }]
			}
		]
};
const map = new google.maps.Map(document.getElementById("map"), mapOptions);

for(m in markers_obj){

    var lat_lng = markers_obj[m].lat_lng
    var price = markers_obj[m].price

    let marker = createHTMLMapMarker({
    latlng: lat_lng,
    map: map,
    html: comp_marker(m)
    });
    
    google.maps.event.addListener(marker, 'click', function(event) {
        console.log('test');        
    });

}
 

function comp_marker(id){
   return `<div class="marker" id="${id}">
        <div>
            <img src="imgs/logo-chico.svg" height="15px" alt="">
        </div>
    </div>`
}


// -------------------------------
</script>
