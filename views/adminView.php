
<?php $title = 'Bienvenue'; ?>

<?php ob_start(); ?>
    <div id="adminView"></div>

<?php $header = ob_get_clean(); ?>

<!--////////////////////// liste des chapitres /////////////////////////////-->

<?php ob_start(); ?>

<?php
    while ($data = $post->fetch()):
            ?>
        <h2 class='pageList'>Dernier film en ligne:</h2>
        <div class = "adminPost">
                    <h2><?= htmlspecialchars($data['title']) ?></h2>
                    <div id="affiche3"><?php echo "<img src='".$data['image']."' />";?></div>
                    <p><span class="publishing"><i class="far fa-clock"></i> Tous les jours à <?= htmlspecialchars($data['horaires']) ?></span></p><br>
                        
            
                <div class="news" >
                    <p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['content']), 0, 500).'...'));?></p>
                 </div>
                <p><span class="publishing"> Durée du film <?= htmlspecialchars($data['duree']) ?></span></p>
                <a  class="input_read" href="index.php?action=post&amp;post_id=<?= $data['id']; ?>">Plus d'infos</a>
        </div>
 
        <?php
    endwhile;
    // fin de la boucle des films
    $post->closeCursor();
    ?>
        <?php
        while ($data = $comment->fetch()):
        
                ?>

        <h2 class='pageList'>Dernier Commentaire:</h2>
        <div class = "commentaires">
            <p><strong><?= htmlspecialchars($data['author']); ?></strong> le <?= htmlspecialchars($data['comment_date_fr']); ?></p>

            <div class="news" >
                <p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['comment']), 0, 300).'...'));?></p>
            </div>
        </div>

        <?php
        endwhile;
    $comment->closeCursor(); ?>

        <h2 class='pageList'>Informations</h2>
        <div class="commentaires">
            <div class="admin">
                <a  href="index.php?action=listPosts#episodes">
                    <p>Vous avez actuellement <?= htmlspecialchars($postsTotal['total_posts'])?> films sur ce site.</p>
                </a>
            </div>
            <div class="admin">
                <a class="nav-link" href="index.php?action=adminListComments#com">
                    <p>Vous avez actuellement <?= htmlspecialchars($commentsTotal['total_comments'])?> commentaires .</p>
                </a>
            </div>
            <div class="admin">
                <a href="index.php?action=adminCommentsReport#reportcom">
                    <?php
                     if(htmlspecialchars($commentsReportTotal['total_comments_report']== 0)):
                        echo "<p> Vous n'avez aucun commentaire de signalé.<p>";
                    
                    
                    else : ?>
                    <p>Vous avez actuellement <?= htmlspecialchars($commentsReportTotal['total_comments_report'])?> commentaire(s) signalé(s).</p>
                          <?php
                    endif;
                    ?>
                </a>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>