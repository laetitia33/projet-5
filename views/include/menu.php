<?php

if(isset($_SESSION['pseudo']))
:
    ?>
<a id ="top" class="top"></a>
<div class ="navi">
	<nav>
		<ul class='navigation'>
			<li><a class="btn" href="index.php?action=administration#adminView">Tableau de bord</a></li>
			<li><a class="btn" href="index.php?action=listPosts">Tous les films (<?= $postsTotal['total_posts']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminNewPost">Editer une séance</a><li>
			<li><a class="btn" href="index.php?action=adminListComments#com">Tous les Commentaires (<?= $commentsTotal['total_comments']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminCommentsReport">Commentaires signalés (<?= $commentsReportTotal['total_comments_report']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminListUsers"><i class="fas fa-users"></i> Liste des utilisateurs</a></li>
			<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
		</ul>
	</nav>
</div>

<?php



else
:
    ?>
<a id ="top" class="top"></a>
	<div class ="navi">
		<nav>	
			<ul class="navigation">
				<img src="public/images/icone.png" class ="popcorn" alt="popcorn"/>
				<div class ='tarifs'>
					<a href="public/images/tarifs.jpg" download>Télécharger tarifs <i class="fas fa-download"></i></a>
				</div>
				<li><a class="btn" href="index.php">Films de la semaine</a></li>
				<li><a class="btn" href="index.php?action=information">  Infos pratiques</a>
				</li>
				<li><a class="btn" href="index.php?action=cinemas">  Salles de cinéma</a></li>
				<li><a class="btn" href="index.php?action=login">  Inscription/connexion</a></li>
				<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-nous</a></li>
				<img src="public/images/icone.png" class ="popcorn" alt="popcorn"/>
			</ul>
		</nav>
	</div>
</div>


<?php
endif;
