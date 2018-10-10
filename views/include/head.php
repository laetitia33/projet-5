	<head>
		<meta charset="utf-8">
		<!-- feuille de style-->
		<link rel="stylesheet" type="text/css" href="public/css/style.css">

		<!--leaflet-->
		<link rel="stylesheet" type="text/css" href="public/css/leaflet.css">

		<meta name="description" content="En un simple clique . Venez découvrir tpus les films à l'affiche au cinéma de la Teste De Buch !">
		<meta name="viewport" content="width=device-width initial-scale=1">
		<meta property="og:url" content="https://cinecinema.000webhostapp.com/"/>
		<meta property="og:title" content="cine-cinema,cinema La Teste De Buch"/>
		<meta property="og:type" content="website">
		<meta property="og:image" content="public/images/icone.png">
		<meta name="Language" CONTENT="fr" />

		<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
		<link href="public/images/favicon.ico" rel="icon" type="image/x-icon" />

		<!---map -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
		<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

		<!--jquery-->
   		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

		<!--animation phrase d'accueil-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2swm32qln1jidlv6lurwl2yl39ntbleahzbjufpyp22rtoju"></script>

  		<script src= "public/js/tinymce/tinymce.js"></script>
  		<script src='https://www.google.com/recaptcha/api.js'></script>

  		<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
   		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/localization/messages_fr.min.js.map"></script>
  			
		<title><?= isset($title) ? $title : 'cine-cinema';?></title>
	</head>
	