<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>

    <div id ="reportcom"></div>
    <h2 class ='pageList'>Commentaire(s) signalé(s)</h2>

<div class="container1">

      <?php
      if(htmlspecialchars($commentsReportTotal['total_comments_report'])> 0): ;?>
        <div class='listcom'><a href="index.php?action=deleteAllCommentReport" OnClick="return confirm('Voulez-vous vraiment supprimer tous commentaires signalés ?');" ><i class="fas fa-minus-circle"> Supprimer tous les commentaires signalés</i></a></div>
                         
         
                          
      <?php
      else : ?>

          <p> Aucun commentaire signalé .<p>

      <?php
      endif;
      ?>

      <?php
      if(htmlspecialchars($commentsReportTotal['total_comments_report']) > 0) : ;?>
        <div class='listcom'><a href="index.php?action=approvedComments" OnClick="return confirm('Souhaitez-vous approuver tous les commentaires signalés ?');" ><i class="fas fa-bell-slash"> Approuver tous les commentaires</i></a></div><br>
      <?php 
      endif;
      ?>

      
        <div>
            <ul class="pagination1">
              <li id="previous-page"><a href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
            </ul>
          </div>
      <div class="page1">


      <?php
      while ($comment = $reportComments->fetch()):
      ?>

        <div class="commentaires">
          <a href="javascript:void(0)" class="list-group-item active"></a>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?></p>
            <p><?= nl2br(preg_replace('#^<br/>$#','',htmlspecialchars(substr($comment['comment'], 0, 400))));?><br/>           
              <div class="reponse">
                <em><a href="index.php?action=approvedComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>#reportcom"OnClick="return confirm('Souhaitez-vous approuver ce commentaire ?');">Approuver <i class="fas fa-bell-slash"></i></a></em>
                <em><a href="index.php?action=deleteOneCommentInReport&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>#deleteCom" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire ?');">Supprimer <i class="fas fa-minus-circle"></i></a></em>
            </div>
            </p>
        </div>
        <?php
        endwhile;?>
      </div>        
      </div>
      <?php $reportComments->closeCursor(); ?>


<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>