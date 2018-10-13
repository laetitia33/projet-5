
<?php
//si administrateur
if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1):
    ?>
<a id ="top" class="top"></a>
<div class ="navigation_mob ">
	<nav>	
		<ul class="navigation_mobile">
			<a href="#" id="toggler">
     			 <i class = "fas fa-bars"> </i> 
 		 	</a>	
			<div id="toggle">	
			<li><a class="btn" href="index.php?action=administration#adminView">Tableau de bord</a></li>
			<li><a class="btn" href="index.php?action=listPosts">Tous les films (<?= $postsTotal['total_posts']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminNewPost">Editer une séance</a><li>
			<li><a class="btn" href="index.php?action=adminListComments#com">Tous les Commentaires (<?= $commentsTotal['total_comments']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminCommentsReport">Commentaires signalés (<?= $commentsReportTotal['total_comments_report']?>)</a></li>
			<li><a class="btn" href="index.php?action=adminListUsers"><i class="fas fa-users"></i> Liste des utilisateurs</a></li>
			<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
			</div>
		</ul>	
	</nav>
</div>


<?php
//si utilisateur
elseif(isset($_SESSION['id']) && $_SESSION['id_group'] == 2)
:
    ?>

<a id ="top" class="top"></a>
<div class ="navigation_mob ">
	<nav>	
	
		<ul class="navigation_mobile">
					<a href="#" id="toggler">
     			 <i class = "fas fa-bars"> </i> 
 		 	</a>
			<div id="toggle">
				<img src="public/images/icone.png" class ="popcorn" alt="popcorn"/>
				<div class ='tarifs'>
					<a href="public/images/tarifs.jpg" download>Télécharger tarifs <i class="fas fa-download"></i></a>
				</div>	
				<li><a class="btn" href="index.php">Films de la semaine</a></li>
				<li><a class="btn" href="index.php?action=information">  Infos pratiques</a>
				</li>
				<li><a class="btn" href="index.php?action=cinemas">  Salles de cinéma</a></li>
				<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-nous</a></li>
				<img src="public/images/icone.png" class ="popcorn" alt="popcorn"/>
				<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
			</div>
		</ul>
	</nav>
</div>

<?php

//si visiteur
else
:
    ?>
<a id ="top" class="top"></a>
<div class ="navigation_mob ">
	<nav>	
	
		<ul class="navigation_mobile">
					<a href="#" id="toggler">
     			 <i class = "fas fa-bars"> </i> 
 		 	</a>
			<div id="toggle">
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
			</div>
		</ul>
	</nav>
</div>



<?php
endif;
