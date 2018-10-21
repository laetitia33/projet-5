<?php
//si admin
if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1)
:
    ?>

<div class ="navi">
	<nav>
		<ul class='navigation'>

			<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>
			<li><a class="btn" href="index.php?action=administration#adminView">Tableau de bord</a></li>
			<li><a class="btn" href="index.php?action=listPosts">Tous les films (<?= $postsTotal['total_posts']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminNewPost">Editer une séance</a><li>
			 <a class="btn" href="index.php?action=adminListComments#com">Tous les Commentaires (<?= $commentsTotal['total_comments']?>)</a>
			<li><a class="btn" href="index.php?action=adminCommentsReport">Commentaires signalés (<?= $commentsReportTotal['total_comments_report']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminListUsers"><i class="fas fa-users"></i> Liste des utilisateurs (<?= $usersTotal['total_users']?>)</a></li>
			<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
			<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>

		</ul>
	</nav>
</div>


<?php
//si utilisateur
elseif(isset($_SESSION['id']) && $_SESSION['id_group'] == 2)
:
  ?>

	<div class ="navi">
		<nav>	
			<ul class="navigation">
				<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>
				<li><div class ='tarifs'>
					<a href="assets/images/tarifs.jpg" download>Télécharger tarifs <i class="fas fa-download"></i></a>
				</div></li>
				<li><a class="btn" href="index.php">Films de la semaine</a></li>
				<li><a class="btn" href="index.php?action=information"><i class="fas fa-info-circle"></i>  Infos pratiques</a>
				</li>
				<li><a class="btn" href="index.php?action=cinemas">  Salles de cinéma</a></li>
				<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-nous</a></li>
				<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
				<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>
			</ul>
		</nav>
	</div>


<?php
//si visiteur 
else
:
    ?>

	<div class ="navi">
		<nav>	
			<ul class="navigation">
				<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>
				<li><div class ='tarifs'>
					<a href="assets/images/tarifs.jpg" download>Télécharger tarifs <i class="fas fa-download"></i></a>
				</div></li>
				<li><a class="btn" href="index.php">Films de la semaine</a></li>
				<li><a class="btn" href="index.php?action=information"><i class="fas fa-info-circle"></i>  Infos pratiques</a>
				</li>
				<li><a class="btn" href="index.php?action=cinemas">  Salles de cinéma</a></li>
				<li><a class="btn" href="index.php?action=login">  Inscription/connexion</a></li>
				<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-nous</a></li>
				<li><img src="assets/images/icone.png" class ="popcorn" alt="popcorn"/></li>
			</ul>
		</nav>
	</div>



<?php
endif;
?>
