
// Objet map
var Map = {
    // initialise la fonction 

    init: function () {
      mapboxgl.accessToken = 'pk.eyJ1IjoibGdhY2hvdWNoYSIsImEiOiJjam1ydGgydGgyNHF4M2tueWpwcmV0dGk3In0.KGcYt4Uh8hS0I1KikK5_KQ';
      var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/light-v9',
      center: [2.2843669999999747 ,48.8789387],
      zoom: 16,      
      pitch: 55,
      bearing:80
    });


    var geojson = {
      type: 'FeatureCollection',
      features: [
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [2.2843669999999747,48.8789387]
        },
        properties: {
          title: 'Cinema',
          description: 'porte maillot, palais des congrès, 75017 paris'
        }
      }]
    };


    geojson.features.forEach(function(marker) {

      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'marker';

      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
      .setLngLat(marker.geometry.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
      .addTo(map);
    });


 }   


}

var map = Object.create(Map);
map.init();
