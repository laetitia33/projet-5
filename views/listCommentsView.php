<?php $title = 'commentaires'; ?>

<?php ob_start(); ?>
<div id="deleteCom"></div>
   
    <h2 class ="pageList">Commentaires</h2>
<?php $header = ob_get_clean(); ?>
<p class="msgConfirm"></p>
<?php ob_start(); ?>
            <div id="blocpagecommentaires">

    <div  id="com"></div>


    <!--/////////////////// indique s'il y a des commentaires ////////////////////-->
        
    <?php
        if($commentsTotal['total_comments']==0):
                echo "<p> Aucun commentaire .<p>";
           
            ?>                
       <?php
        else : ?>

          <div class='listcom'><a href="index.php?action=deleteComments" OnClick="return confirm('Voulez-vous vraiment supprimer tous commentaires ?');" ><i class="fas fa-minus-circle"> Supprimer tous les commentaires</i></a></div>

         <?php
        endif;
        ?>

    <?php

    ///////////////////////// liste des commentaires /////////////////////////
    while ($comment = $comments->fetch()):

        ?>
        <div class = "commentaires">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?></p>
            <p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($comment['comment']), 0, 300).'...'));?><br/>
            	<div class="reponse">
                <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire ?');" >Supprimer <i class="fas fa-minus-circle"></i></a></em>
            	</div>
            </p>
        </div>

    <?php
endwhile;

$comments->closeCursor(); ?>
</div> 
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>