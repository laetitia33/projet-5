<?php $title = 'commentaires'; ?>

<?php ob_start(); ?>

<div id="deleteCom"></div>   
<h2 class ="pageList">Commentaires</h2>

<p class="msgConfirm"></p>
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

    <div class="container1">
      <div>
          <ul class="pagination1">
            <li id="previous-page"><a href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
          </ul>
        </div>
    <div class="page1">

    <?php


    ///////////////////////// liste des commentaires /////////////////////////
    while ($comment = $comments->fetch()):

        ?>
        <div class="commentaires">
            <a href="javascript:void(0)" class="list-group-item active"></a>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?></p>
            <p><?= nl2br(preg_replace('#^<br/>$#','',htmlspecialchars(substr($comment['comment'], 0, 400))));?><br/>
                <div class="reponse">
                <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire ?');" >Supprimer <i class="fas fa-minus-circle"></i></a></em>
                </div>
            </p>
        </div>

    <?php
endwhile;?>
    </div>        
    </div>

<?php $comments->closeCursor(); ?>
</div> 
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>