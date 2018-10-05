<?php $title = 'Modification du film' . htmlspecialchars($post['id']) . ' '; ?>

<?php ob_start(); ?>
<div id ="modif"></div>

<h2 class='pageList'>Modifier le film: <?= htmlspecialchars($post['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class ="oneMovieDetail">
        <img src="public/images/bobine.jpg" class ="bobine" alt="bobine"/>   
        <div id="affiche"><?php echo "<img src='".$post['image']."' />";?></div>    
        <p>
            <p>Mis en ligne le <?= htmlspecialchars($post['date_creation_fr']) ?></p>
            <div class="news" >         
                <p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p>
            </div>
        </p>
        <img src="public/images/bobine.jpg" class ="bobine2" alt="bobine"/>
        <form action="index.php?action=updatePost&amp;post_id=<?= $_GET['post_id'];?>#films" method="POST">
        
     </div>             
        <div>
            <p>Par : </p>
            <label for="author" ></label>
     
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo']))
                :
                    echo htmlspecialchars($_SESSION['pseudo']);
                endif;
                ?>"
                />
        </div>
        
        <div >
            <p>Titre du film : </p>
            <input type="text" name="title" class="inputbasic" id="title" value="<?php echo htmlspecialchars($post['title']) ;?>"/>
        </div>
  
        <div>
            <p>Horaire de la séance : </p>
            <label for="horaires"></label>          
            <input id="horaires" type="time" name="horaires"  class="inputbasic" value="<?php echo htmlspecialchars($post['horaires']) ;?>"/>  
        </div>

        <div>
            <p>Durée du film : </p>
            <label for="duree"></label>          
            <input id="duree" type="time" name="duree" class="inputbasic" value="<?php echo htmlspecialchars($post['duree']) ;?>"/>  

        </div> 

        <div>
            <p>Affiche du film : </p>
            <label for="image"></label>          
            <input type="text" name="image" class="inputbasic" id="image" value="<?php echo htmlspecialchars($post['image']) ;?>"/>
        </div>
        <p>Résumé : </p>   
        <div class="inputbasic">            
            <label for="content"></label>
            <textarea name="content" id="content"><p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p></textarea>
            
        </div>
        <div>
            <input type="submit" value="envoyer" OnClick="return confirm('Voulez-vous vraiment modifier ce résumé ?');"></input>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>

