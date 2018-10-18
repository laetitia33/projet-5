
<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>
<body>
	<header>
	<a id="top"></a>
		<?php include_once 'views/include/menu.php'; ?>
		<?php  include_once 'views/include/menu_responsive.php'; ?>
	</header>
	
		<div id="blocpage">	
		<a id="films"></a>

		<?=$header?>
					
		<?= $content ?>
		
		<span id="btntop">
			<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
		</span>	
	</div>

		<?php  include_once 'views/include/footer.php' ?>	

	<script src ="public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/pagination/pagination.js"></script>
</body>	
</html>