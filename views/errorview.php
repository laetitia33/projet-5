<?php $title = 'erreur!'; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once'views/include/head.php'?>
	<body class="errorImg">	

		<p class = "errorDiv"><i class="fas fa-exclamation-triangle fa-x4" style="color:red;"></i>
		<?= htmlspecialchars($errorMessage) ?></p>
		
		<p style="margin-left:25px; font-size:1.5em;"><a href=javascript:history.go(-1)><i class="fas fa-arrow-left"> Retour</i></a></p>				
	
	<script src = "public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	<script src="public/js/menu/menu.js"></script>
		
	</body>
</html>