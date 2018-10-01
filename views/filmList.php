

<?php $title = 'cine-cinema liste des sorties'; ?>



<!--///////////////////////// phrase d'accueil///////////////////////////////////////////////////-->



<?php ob_start(); ?>
<p class="ml12"><i class="fas fa-film"></i> Vous aimez le cinéma et aimeriez voir ou revoir des grands classiques<p>
<p class="ml12">Nous vous accueillons dans un cadre d’exception</p>
<?php

		if(isset($_SESSION['pseudo'])) : ?>
			<p class = "publishDate">  <i class="fas fa-film"></i> Bonjour, <?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , Veillez à ce que la liste des films soit actualisée  <i class="fas fa-film"></i>        		
			</p>
			<?php
		
		else
		: ?>

			<p class = "publishDate"> <i class="fas fa-film"></i> Bonjour ,<?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , bientôt les prochaines sorties en ligne...patientez ;)  <i class="fas fa-film"></i>          		
			</p>
			  <?php
         endif;
         ?>


<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>


<FORM name=search onsubmit="return findInPage(this.string.value);"><INPUT 
name=string onchange="n = 0;"> 
<INPUT type=submit value=Rechercher></FORM>
<!--//////////////////////////////////// affichage de tous les articles ////////////////////////////////////-->
<h2 class ='pageList'>Liste des sorties de la semaine</h2>
	
	<p class ='comSignal'></p>
	<div class='container'>

		<?php

				while ($data = $posts->fetch()):
				?>
  
				<div class="movie">
	
					<img src="public/images/bobine.jpg" class ="bobine" alt="bobine"/>
					<h2><?= htmlspecialchars($data['title']) ?></h2>					
					<div id="affiche"><?php echo "<img src='".$data['image']."' />";?></div>
				    <p><span class="publishing"><i class="far fa-clock"></i> Tous les jours à <?= htmlspecialchars($data['horaires']) ?></span></p>
					   <div class='texte'><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['content']), 0, 500).'....'));?></div>
					 <p><span class="publishing">Durée du film <?= htmlspecialchars($data['duree']) ?></span></p><br>


						<a  class="input_read" href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#news">Plus d'infos</a>
						<div class="coms">

							<?php if ($data['nbCommentaires'] > 0) : ?>
							<p class ="nbcom"><?= htmlspecialchars($data['nbCommentaires'])?> commentaire(s) <i class="far fa-comment"></i></p>
							 <?php
				            
				           	else : ?>
				           	<p class ="nbcom">Aucun commentaire sur ce film</p>
				           	<?php
				            endif;
				            ?>
						<a href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#com"><em><i class="fas fa-pencil-alt"> Ajouter un Commentaire</i></em></a><br>

					
													 	
					<?php if(isset($_SESSION['pseudo'])) : ?>
				
			
						 <a href="index.php?action=adminUpdatePost&amp;post_id=<?= $data['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier ce film</i></em></a><br>
               			 <a href="index.php?action=deletePost&amp;post_id=<?= $data['id']; ?>#episodes" OnClick="return confirm('Voulez-vous  supprimer ce film?');"><em><i class="fas fa-trash-alt"> Supprimer ce film</i></em></a>
					
					<?php
		            endif;
		            ?>
					</div>
		            <img src="public/images/bobine.jpg" class ="bobine2" alt="bobine"/>

				</div>

				<?php
				endwhile;
				?>
	</div>

		<?php
	
		$posts->closeCursor();
		;?>
	
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>
