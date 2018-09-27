<header>
	<?php

if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1)
{
    ?>

<nav>
	
	<ul id="navigation">

		<li><a class="btn" href="index.php?action=administration#adminView">Tableau de bord</a></li>
		<li><a class="btn" href="index.php?action=listPosts#episodes">Tous les films (<?= $postsTotal['total_posts']?>)</a></li>
		<li><a class="btn" href="index.php?action=adminNewPost#create">Editer une séance</a><li>
		<li><a class="btn" href="index.php?action=adminListComments#com">Tous les Commentaires (<?= $commentsTotal['total_comments']?>)</a></li>
		<li><a class="btn" href="index.php?action=adminCommentsReport#reportcom">Commentaires signalés (<?= $commentsReportTotal['total_comments_report']?>)</a></li>
		<li><a class ="btn" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')"; ">Déconnexion</a></li>
		   <li><a class="nav-link" href="index.php?action=adminListUsers"><i class="fas fa-users"></i> Liste des utilisateurs</a></li>
	</ul>
</nav>

<?php
}

elseif (isset($_SESSION['id']) && $_SESSION['id_group'] == 2)








else
{
    ?>


<nav>
	
	<ul id="navigation">
		<li><a class="btn" href="#episodes">Chapitres</a></li>
		<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-moi</a></li>
	</ul>
</nav>




<?php
}
