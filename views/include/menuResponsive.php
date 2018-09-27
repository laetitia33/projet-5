
<?php $title= "Administration" ;

if(isset($_SESSION['id']))

	:
   ?>
<nav class="dr-menu">
	<div class="dr-trigger"><span class="dr-icon dr-icon-menu"></span><a class="dr-label"><i class="fas fa-list-ul fa-4x"></i>Menu</a></div>
	<ul id="navigation">
	<ul id="mobil_navigation">
		<li><a class="adminbtn "href="index.php?action=administration#adminView"></i>Tableau de bord</a></li>
		<li><a class="creation" href="index.php?action=listPosts#episodes">Tous les chapitres (<?= $postsTotal['total_posts']?>)</a></li>
		<li><a class="creation" href="index.php?action=adminNewPost#create">Ecrire un chapitre</a><li>
		<li><a class="creation" href="index.php?action=adminListComments#com">Tous les Commentaires (<?= $commentsTotal['total_comments']?>)</a></li>
		<li><a class="creation" href="index.php?action=adminCommentsReport#reportcom">Commentaires signalés (<?= $commentsReportTotal['total_comments_report']?>)</a></li>
		<li><a class="dr-icon" href="index.php?action=adminListUsers"><i class="fas fa-users"></i> Liste des utilisateurs</a></li>
		<li><a class ="creation" href="index.php?action=logout" OnClick="return confirm('Souhaitez-vous vous déconnecter?')";>Déconnexion</a></li>

	</ul>
</div>

<?php



else
:
    ?>
 
<nav class="dr-menu">
	<div class="dr-trigger"><span class="dr-icon dr-icon-menu"></span><a class="dr-label"><i class="fas fa-list-ul fa-4x"></i>Menu</a></div>
	<ul id="navigation">     
		<li><a class="contact" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-moi</a></li>
        <li><a  href="#episodes">Chapitres</a></li>    	
       
    </ul>
</div>
    
<?php
endif;
