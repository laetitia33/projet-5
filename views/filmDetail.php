<?php $title =  htmlspecialchars($post['title']) . ''; ?>


<!--///////////////////////// phrase d'accueil///////////////////////////////////////////////////-->


		<?php
		
		if($commentReport===true) : ?>
			
			 <div id="message">Ce commentaire a bien été signalé et sera vérifié par l'administrateur</div>
		
		<?php
        endif;?>




<!--//////////////lien retour page précédente selon si visiteur ou admin//////////////////-->
<?php ob_start(); ?>		
		<?php
			if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1): ?>
			<p><a class="news" href="index.php#adminView"><i class="fas fa-arrow-left">
			Retour à votre tableau de bord</i></a></p>
		 	<?php
            
           	else : ?>

			<p><a class="news" href="index.php#films"><i class="fas fa-arrow-left">
			Retour à la liste des films</i></a></p>
			  <?php
            endif;
            ?>

<!---///////affichage de l'auteur , de modification ou suppression du film  admin////-->		
		<div class ="oneMovieDetail">
			<img src="public/images/bobine.jpg" class ="bobine" alt="bobine"/>
			<h2><?= htmlspecialchars($post['title']) ?></h2>	
			<div id="affiche2"><?php echo "<img alt='affiche du film' src='".$post['image']."' />";?></div>

			<?php
			if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1): ?>
				<p><span class="publishing"><i class="far fa-clock"></i> Tous les jours à <?= htmlspecialchars($post['horaires']) ?></span></p><br>
				<div class='adminCtrl'>
					<a href="index.php?action=adminUpdatePost&amp;post_id=<?= $post['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier ce film </i></em></a>
				</div>

				<div class='adminCtrl'>
               		<a href="index.php?action=deletePost&amp;post_id=<?= $post['id']; ?>" OnClick="return confirm('Voulez-vous vraiment supprimer ce film ?');"><em><i class="fas fa-trash-alt"> Supprimer ce film</i></em></a>
               	</div>

 			<?php
        	
       		else : ?>
				<p><span class="publishing"><i class="far fa-clock"></i> Tous les jours à <?= htmlspecialchars($post['horaires']) ?></span></p><br>
				  <?php
            endif;
            ?>

			<div class="news" >	
				<p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?>	
			</div>
			<a class="btn" data-popup-open="popup-1" href="#">Voir la bande annonce</a>

			<div class="popup" data-popup="popup-1">
				<div class="popup-inner">
				
						<iframe src="https://www.youtube.com/embed/<?= htmlspecialchars($post['video']) ?>?rel=0"  allow="autoplay; encrypted-media"  allowfullscreen id="nofocusvideo"></iframe>

						<p><a data-popup-close="popup-1" href="#">Close</a></p>
						
						<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
				</div>
			</div>

			<p><span class="publishing">Durée du film <?= htmlspecialchars($post['duree']) ?></span></p><br>	
			<p>Article écrit par <a href="index.php?action=information"><?= $post['author'] ?></a>
			le <?= $post['date_creation_fr'] ?></p>
			<img src="public/images/bobine.jpg" class ="bobine2" alt="bobine"/>	
		</div>
<?php $header = ob_get_clean(); ?>

<!--/////////////////////////-écrire commentaires admin ou utilisateur //////////////////////////-->
<?php ob_start(); ?>

<?php 
if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1 OR isset($_SESSION['id']) && $_SESSION['id_group'] == 2 ): ?> 

		<h2><i class="far fa-comments"></i> Laissez un Commentaire</h2>
		<form class= 'form' action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#ancrecom" method="POST">
				
			<div class="inputbasic>
	            <label for="author" ></label>
	        <?php
	     	if(isset($_SESSION['pseudo'])) : ?>
	            <input type="text" name="author"  id="author" class="inputbasic" value="<?php echo htmlspecialchars($_SESSION['pseudo'])?>"/ required>
			<?php
	        	
	       	else : ?>
	       		<input type="text" name="author" class="inputbasic" id="author" placeholder="Indiquez votre nom" required/>
	       	
	       	<?php
	         endif;
	        ?>
	                
	        </div>

				<div class="inputbasic">
					<label for="comment"></label><br />
					<textarea name="comment" id="comment"  placeholder="Entrez votre commentaire"></textarea>
				</div>
				
				<div>
					<input type="submit" id="submitCom"  value="Envoyez votre commentaire" />
				</div>
		
 		</form>

	
<!--///////////////////////// boucle affichage commentaire admin ou visiteur ///////////-->
    
	<?php 
	while ($comment = $comments->fetch()):?>
	
				<div id="ancrecom"></div>
				<div class = "commentaires">
					<p><strong><i class="fas fa-user"></i>   <?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?>
					</p>

					<div class="coms"> 

						<span id="confirmsignal"><p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($comment['comment']), 0, 300)));?></p></span>				
			    	</div>
				<?php
				if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1) : ?>
					<div class="reponse">     	
			     		<em><a href="index.php?action=deleteOneComment&amp;post_id=<?= $post['id'];?>&amp;id=<?= $comment['id']; ?>#ancrecom" OnClick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');"><i class="fas fa-minus-circle"> Supprimer </i></a></em>
			     		<em><a id='validcom' href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>" OnClick="return confirm('Souhaitez-vous signaler ce commentaire ?')";"><i class="fas fa-bell">  Signalez un abus</i></a></em>
                                        		       			
			     	</div>

				<?php
	        	
	       		else: ?>
							
		       				<div class="reponse">				
		       				<em><a id='validcom' href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>" OnClick="return confirm('Souhaitez-vous signaler ce commentaire ?')";"><i class="fas fa-bell">  Signalez un abus</i></a></em> 
		       				     		  
		       			</div>		       				
			    <?php
	            endif;
	            ?>
				</div>
	


	<?php
	endwhile;
	$comments->closeCursor();?>



<?php 
	//sinon se connecter pour laisser un commentaire
else : ;
?>
					      							
    <em><i class="fas fa-ban"></i>  Vous devez être <a id='validcom' href="index.php?action=login">connecté </a><br>pour laisser un commentaire</em>       			
 		  
	       				
<?php 
endif; 
?>
		
<!--/////////////////////lien retour page précédente selon si visiteur ou admin///////////////////-->	

		<?php
			if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1) : ?>
				<p><a class="news" href="index.php#adminView"><i class="fas fa-arrow-left">
				Retour à votre tableau de bord</i></a></p>
		<?php
            
           	else : ?>

				<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
				Retour à la liste des films</i></a></p>
		<?php
            endif;
          ?>

  <?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>