

//api liste des cinemas

var mymap = L.map('mapid').setView([48.8534,2.3488],12);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibGdhY2hvdWNoYSIsImEiOiJjam11amt6NmEwenJ3M3FwOHZiczI5ZjJxIn0.TJsV4eanWs7ukM89botEYg', {
    
    maxZoom: 18,
    id: 'mapbox.dark',
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

var openDataParis = 'https://opendata.paris.fr//api/records/1.0/search/?dataset=cinemas-a-paris&rows=1000';


var xhr = new XMLHttpRequest();

xhr.open("GET",openDataParis,true);
 	xhr.onreadystatechange = function(response) {



	 //Call a function when the state changes. 
	 if(this.readyState == XMLHttpRequest.DONE && this.status >= 200 && this.status <=400) { 

			  var response=JSON.parse(xhr.response);
			  var cinemas=response.records;


			var marker,infosCine = {};
			cinemas.forEach(function(cinema){


			  if(cinema.fields.coordonnees){
			    marker = L.marker(cinema.fields.coordonnees).addTo(mymap);
	
				  marker.infosCine = {
			      adresse:cinema.fields.adresse,
			      nom_etablissement: cinema.fields.nom_etablissement,



			    	}
				}

			});



		}






}
xhr.send();



