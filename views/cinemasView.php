
<?php $title = 'Liste des cinemas';?>

<!DOCTYPE html>
<html lang="fr" class='template'>

		<?php include_once 'views/include/head.php';?>
<body>	
	<div id="blocpage">

		<header>
				<?php include_once 'views/include/menu.php'; ?>
				<?php include_once 'views/include/menu_responsive.php'; ?>
		</header>
		

			<a id="films"></a>
	 <!--////////////////////// MAP ///////////////////////////-->
		<section>		
			<h2 class ='pageList'>Salles de cinema de Paris</h2>			
			<div id="mapid"></div>
		</section>


		<span id="btntop">
			<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
		</span>

		<div class='footerDown'>
			<?php include_once 'views/include/footer.php' ?>			
		</div>
		
	</div>

	<script src="assets/js/listeCinemas.js"></script>
	<script src ="assets/js/script.js"></script>

</body>	
</html>