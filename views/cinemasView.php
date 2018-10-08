

<?php $title = 'Liste des cinemas';?>

<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>
	
	<div id="blocpage">

	<header>
			<?php include_once 'views/include/menu.php'; ?>
			<?php include_once 'views/include/menu_responsive.php'; ?>
	</header>
	
	<body>
			<a id="films"></a>
			<h2 class ='pageList'>Salles de cinema de Paris</h2>
			
			<div class="meteoDiv">
		  		<h3>La météo à Paris</h3>
				<div id="meteo"></div>		
				<div id ='messageMeteo'></div>	
				<div id ='imgMessageMeteo'></div>		
			</div>

			<div id="mapid"></div>
			
			<span id="btntop">
				<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
			</span>

		<div class='footerDown'>
			<?php include_once 'views/include/footer.php' ?>			
		</div>
		
	</div>

	<script src="public/js/meteo.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet-src.js"></script>
	<script src="public/js/cinema/listeCinemas.js"></script>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src ="public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/pagination/pagination.js"></script>
</body>
	
</html>