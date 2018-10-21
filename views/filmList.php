
<?php $title = 'cine-cinema liste des sorties'; ?>



<!--///////////////////////// phrase d'accueil///////////////////////////////////////////////////-->

<?php ob_start(); ?>

	<div class= "welcome">
		<p class="ml12"><i class="fas fa-film"></i> Vous aimez le cinéma et aimeriez voir ou revoir des grands classiques<p>
		<p class="ml12">Nous vous accueillons dans un cadre d’exception</p><br>
		<h1>Bienvenue <?php if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1 OR isset($_SESSION['id']) && $_SESSION['id_group'] == 2 )   : 
				echo ''.$_SESSION['pseudo'] . ' !' ;
			endif ;?></h1>
	</div>



	<!--///////////////////////////////slider////////////////////////////////////////////////////-->
	<div class="slideshow">
	  <div class="contener_slideshow">
	    <div class="contener_slide">
	      <div class="slid_1"><img src="assets/images/slider1.jpg" alt ='intérieur salle de cinéma'></div>
	      <div class="slid_2"><img src="assets/images/slider2.jpg" alt ='interiur salle de cinema sieges'></div>
	      <div class="slid_3"><img src="assets/images/slider3.jpg" alt ='coi restauration'></div>
	    </div>
	  </div>
	</div>


<?php
		if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1) : ?>
			<p class = "publishDate">  <i class="fas fa-film"></i> Bonjour, <?php
			setlocale(LC_TIME, 'fr_FR.utf8','fra');
			echo "Nous sommes le ".strftime("%d %B %Y");?> , Veillez à ce que la liste des films soit actualisée  <i class="fas fa-film"></i>        		
			</p>
			<?php
		
		else
		: ?>

			<p class = "publishDate"> <i class="fas fa-film"></i> Bonjour ,<?php
			setlocale(LC_TIME, 'fr_FR.utf8','fra');
			echo "Nous sommes le ".strftime("%d %B %Y");?> , bientôt les prochaines sorties en ligne...patientez   <i class="fas fa-film"></i>          		
			</p>
			  <?php
         endif;
         ?>



<!--///////////////////////////LISTE FILMS///////////////////////////////////////-->

<div class="container1">
<h2 class="pageList">Liste des films en salle</h2>
<!--///////////// pagination ////////////////////////////////////////////////////-->
  <div>
      <ul class="pagination">
        <li id="previous-page"><a href="javascript:void(1)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
      </ul>
    </div>
<p class ='comSignal'></p>
<div id="page">
	<?php 
	while ($data = $posts->fetch()):?>
			<div class="list-group">
        		<a href="javascript:void(0)" class="list-group-item active"></a>

					<img src="assets/images/bobine.jpg" class ="bobine" alt="bobine"/>
					<h2><?= htmlspecialchars($data['title']) ?></h2>					
					<div class="affiche"><?php echo "<img alt ='affiches des films proposés' src= '".$data['image']."' />";?></div>
				    <p><span class="publishing"><i class="far fa-clock"></i> Tous les jours à <?= htmlspecialchars($data['horaires']) ?></span></p>
					   <div class='texte'><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['content']), 0, 500).'....'));?></div>
					 <p><span class="publishing">Durée du film <?= htmlspecialchars($data['duree']) ?></span></p><br>


						<a class="input_read" href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#news">Plus d'infos</a>
						<div class="coms">

							<?php
							if ($data['nbCommentaires'] > 0) : ?>
							<p class ="nbcom"><?= htmlspecialchars($data['nbCommentaires'])?> commentaire(s) <i class="far fa-comment"></i></p>
							 <?php
				            
				           	else : ?>
				           	<p class ="nbcom">Aucun commentaire sur ce film</p>
				           	<?php
				            endif;
				            ?>
						<a href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#com"><em><i class="fas fa-pencil-alt"> Ajouter un Commentaire</i></em></a><br>

					
													 	
					<?php 
					if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1) : ?>
				
					<a href="index.php?action=adminUpdatePost&amp;post_id=<?= $data['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier ce film</i></em></a><br>
           			 <a href="index.php?action=deletePost&amp;post_id=<?= $data['id']; ?>#episodes" OnClick="return confirm('Voulez-vous  supprimer ce film?');"><em><i class="fas fa-trash-alt"> Supprimer ce film</i></em></a>
				
						<?php
		            endif ;?>
					</div>
		            <img src="assets/images/bobine.jpg" class ="bobine2" alt="bobine"/>
	        	
			</div> 		
	<?php
	endwhile;?>
</div>
		
</div>

		<?php
	
		$posts->closeCursor();
		;?>
	
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>