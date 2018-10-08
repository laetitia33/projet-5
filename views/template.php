
<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>

	<div id="blocpage">

	<header>
		<?php include_once 'views/include/menu.php'; ?>
		<?php  include_once 'views/include/menu_responsive.php'; ?>
	</header>
	
	<body>
		<a id="films"></a>


		<?=$header?>
					
		<?= $content ?>
		
		<span id="btntop">
			<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
		</span>

	<div class='footerDown'>
		<?php  include_once 'views/include/footer.php' ?>	
	</div>
		
	</div>

	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   	<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/localization/messages_fr.min.js.map"></script>
	<script src ="public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/pagination/pagination.js"></script>

	</body>
</html>