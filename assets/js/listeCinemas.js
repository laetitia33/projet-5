// Objet cinemas
var Cinemas = {
    // initialise la fonction 

  init: function () {
    // création de la carte et paramétrage général : centre et niveau de zoom
    var map = L.map('mapid').setView([48.862162, 2.345818], 13);


    var osmLayer = L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '© <a href= »http://osm.org/copyright »>OpenStreetMap</a> contributors',
    maxZoom: 19
    });

    // la couche « osmLayer » est ajoutée à la carte
    map.addLayer(osmLayer);

    // création d’une couche « watercolorLayer »
    var watercolorLayer = L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.jpg', {
    attribution: '© <a href= »http://osm.org/copyright »>OpenStreetMap</a> contributors',
    maxZoom: 19
      });

    // la couche « watercolorLayer » est ajoutée à la carte

    map.addLayer(watercolorLayer);
    var openDataParis = 'https://opendata.paris.fr//api/records/1.0/search/?dataset=cinemas-a-paris&rows=1000';

    var xhr = new XMLHttpRequest();

    xhr.open("GET",openDataParis,true);
      xhr.onreadystatechange = function(response) {



       //Call a function when the state changes. 
       if(this.readyState == XMLHttpRequest.DONE && this.status >= 200 && this.status <=400) { 

            var response=JSON.parse(xhr.response);
            var cinemas=response.records;


            
            cinemas.forEach(function(cinema){
              if(cinema.fields.coordonnees){
             

                   var myIcon = L.icon({
                      iconUrl: "assets/images/marker.png",
                      iconSize: [35, 40],
                      shadowSize:   [50, 64],
                      iconAnchor:   [22, 94],
                      shadowAnchor: [4, 62],
                      popupAnchor:  [-3, -76]
                          });


                marker = L.marker(cinema.fields.coordonnees, { icon: myIcon })
                   .bindPopup('<b><u>Description du cinéma</u></b><br>'
                  + '<b>Nom : </b>' + cinema.fields.nom_etablissement+ '<br>'
                  + '<b>Nombre d’écrans : </b>' + cinema.fields.ecrans + '<br>'
                  + '<b>Nombre de fauteuils : </b>' + cinema.fields.fauteuils + '<br>'
                  + '<b>Arts et essais ? </b>' + cinema.fields.art_et_essai + '<br>'
                  + '<b>Adresse : </b>' + cinema.fields.adresse + '<br>'
                  + '<b>Arrondissement : </b>' + cinema.fields.arrondissement
                  ).addTo(map);
              }

          });

        }

    }
    xhr.send();

    }
}

var cinemas = Object.create(Cinemas);
cinemas.init();


