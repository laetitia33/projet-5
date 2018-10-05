<?php $title = 'erreur!'; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once'views/include/head.php'?>
	<body class="errorImg">	

		<p class = "errorDiv"><i class="fas fa-exclamation-triangle fa-x4"></i>
		<?= htmlspecialchars($errorMessage) ?></p>
		
		<p><a class='news' href=javascript:history.go(-1)><i class="fas fa-arrow-left"> Retour</i></a></p>					
	<script src = "public/js/script.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
		
	</body>
</html>