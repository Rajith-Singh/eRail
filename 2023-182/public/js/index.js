let map;

async function initMap(lat,long) {
  const { Map } = await google.maps.importLibrary("maps");

  var circle = {
      path: google.maps.SymbolPath.CIRCLE,
      fillColor: 'red',
      fillOpacity: .50,
      scale: 15.15,
      strokeColor: 'white',
      strokeWeight: 1
  };

  var map = new Map(document.getElementById("map"), {
    center: { lat: lat, lng: long },
    zoom: 19,
  });

   marker = new google.maps.Marker({
    position: { lat: lat, lng: long },
    map: map,
    icon: circle, // set the icon here
});
}



if(!navigator.geolocation){
  throw new error("nooo");
}

function success(pos){

  const lat =pos.coords.latitude;
  const lng = pos.coords.longitude;
  initMap(lat,lng);

}
function error(){

}

const options = {};

navigator.geolocation.getCurrentPosition(success,error,options);