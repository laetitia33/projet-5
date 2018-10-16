	<head>
		<meta charset="utf-8">
		<!-- feuille de style-->
		<link rel="stylesheet" type="text/css" href="public/css/style.css">

		<meta name="description" content="En un simple clique . Venez découvrir tpus les films à l'affiche au cinéma de la Teste De Buch !">
		<meta name="viewport" content="width=device-width initial-scale=1">
		<meta property="og:url" content="https://cinecinemadeparis.000webhostapp.com"/>
		<meta property="og:title" content="cine-cinema,cinema La Teste De Buch"/>
		<meta property="og:type" content="website">
		<meta property="og:image" content="public/images/icone.png">
		<meta name="Language" CONTENT="fr" />

		<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
		<link href="public/images/favicon.ico" rel="icon" type="image/x-icon" />

		<!---map -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script>
		<link rel="stylesheet" type="text/css" href="public/css/leaflet.css">

		<!--jquery-->
   		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

		<!--animation phrase d'accueil-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2swm32qln1jidlv6lurwl2yl39ntbleahzbjufpyp22rtoju"></script>

  		<script src= "public/js/tinymce/tinymce.js"></script>
  		<script src='https://www.google.com/recaptcha/api.js'></script>

		<!-- validation formulaires -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>

  			
		<title><?= isset($title) ? $title : 'cine-cinema';?></title>
	</head>
	