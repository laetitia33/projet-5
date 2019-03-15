

// Objet map
var Meteo= {
    // initialise la fonction 

init: function () {
        // Accès à la météo de Paris
        ajaxGet("//api.openweathermap.org/data/2.5/weather?q=Paris&units=metric&appid=ac92341e9e28f6ae48ca9e0c121df81e", function (reponse) {
            var meteo = JSON.parse(reponse);
            // Récupération des données
            var temperature = meteo.main.temp;
            var humidite = meteo.main.humidity;
            var imageUrl = "http://openweathermap.org/img/w/"+ meteo.weather[0].icon + ".png";
           //conditions phrase de présentation
              if(temperature > 0 && temperature > 22){  
                document.getElementById("messageMeteo").innerHTML = "Il fait trop chaud ? Venez profiter de notre cinéma avec nos 10 salles climatisées .Des boissons faiches ,glaces vous attendent..<br><img src='assets/images/glaces.png'>";
               
              }else{

                document.getElementById("messageMeteo").innerHTML ="Vous avez froid? Venez profiter de notre cinéma avec nos 10 salles chauffées .Des boissons chaudes , beignets vous attendent .. <br><img src='assets/images/chocolat.png'>";
              }
      
            // Affichage des résultats
            var conditionsElt = document.createElement("div");
            conditionsElt.textContent = "Il fait actuellement " + temperature +"°C .";

            var iconesElt = document.createElement("div");
            var imageElt = document.createElement("img");
            imageElt.src = imageUrl;
            var meteoElt = document.getElementById("meteo");
            meteoElt.appendChild(conditionsElt);
            meteoElt.appendChild(imageElt);

        });

        function ajaxGet(url, callback) {
          var req = new XMLHttpRequest();
          req.open("GET", url);
          req.addEventListener("load", function () {
            if (req.status >= 200 && req.status < 400) {
              callback(req.responseText);
            } else {
              console.error(req.status + " " + req.statusText + " " + url);
            }
          });
          req.addEventListener("error", function () {
            console.error("Erreur réseau avec l'URL " + url);
          });
          req.send(null);
        };
         }   


}

var meteo = Object.create(Meteo);
meteo.init();
