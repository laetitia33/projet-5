

<?php $title = 'cine-cinema liste des sorties'; ?>



<!--///////////////////////// phrase d'accueil///////////////////////////////////////////////////-->



<?php ob_start(); ?>
<?php
		if(isset($_SESSION['pseudo'])) : ?>
			<p class = "publishDate">Bonjour, <?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , Veillez à ce que la liste des films soit actualisée         		
			</p>
			<?php
		
		else
		: ?>

			<p class = "publishDate">Bonjour ,<?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , bientôt les prochaines sorties en ligne...patientez ;)          		
			</p>
			  <?php
         endif;
         ?>


<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>


<!--//////////////////////////////////// affichage de tous les articles ////////////////////////////////////-->
<h2 class ='pageList'>Liste des sorties de la semaine</h2>
	
		<p class ='comSignal'></p>
		<div class="body_card">

		<?php

				while ($data = $posts->fetch()):
				?>

				
				<div class="movie">
						
					<img src="public/images/bobine.jpg" class ="bobine" alt="bobine"/>
					<h2><?= htmlspecialchars($data['title']) ?></h2>
					<div id="affiche"></div>
				    <p><span class="publishing">Article écrit par <?= htmlspecialchars($data['author']) ?><br><i class="far fa-calendar-alt"> le <?= htmlspecialchars($data['date_creation_fr']) ?></i></span></p><br>
					   <div class='texte'><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['content']), 0, 500).'....'));?></div>
					 


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
               			 <a href="index.php?action=deletePost&amp;post_id=<?= $data['id']; ?>#episodes" OnClick="return confirm('Voulez-vous  supprimer le Chapitre?');"><em><i class="fas fa-trash-alt"> Supprimer ce film</i></em></a>
					
					<?php
		            endif;
		            ?>
		            <img src="public/images/bobine.jpg" class ="bobine2" alt="bobine"/>
					</div>
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
