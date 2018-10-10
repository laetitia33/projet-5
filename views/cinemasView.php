

<?php $title = 'Liste des cinemas';?>

<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>
	
	<div id="blocpage">

	<header>
			<?php include_once 'views/include/menu.php'; ?>
			<?php include_once 'views/include/menu_responsive.php'; ?>
	</header>
	
	<body><button class="js-modal-btn" data-video-id="7TUOI23spt0">Open Video</button>
			<a id="films"></a>
			<h2 class ='pageList'>Salles de cinema de Paris</h2>
			
		

			<div id="mapid"></div>
			
			<span id="btntop">
				<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
			</span>

		<div class='footerDown'>
			<?php include_once 'views/include/footer.php' ?>			
		</div>
		
	</div>

	<script src="public/js/cinema/listeCinemas.js"></script>
	<script src ="public/js/script.js"></script>

</body>
	
</html>