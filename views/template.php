
<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>

	<body>
		<div id="blocpage">
			<?php include_once 'views/include/menu.php'; ?>
			<?php include_once 'views/include/menuResponsive.php'; ?>
			
			<?=$header?>
						
			<?= $content ?>
			
			<span id="btntop">
				<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
			</span>
			<?php include_once 'views/include/footer.php' ?>			
		
		</div>
	
	<script src = "public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/menu/menu.js"></script>
	</body>
</html>