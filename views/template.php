
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

	<script src ="public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/pagination/pagination.js"></script>	
	</body>
</html>