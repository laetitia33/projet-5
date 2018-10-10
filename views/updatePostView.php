<?php $title = 'Modification du film : ' . htmlspecialchars($post['title']) . ' '; ?>

<?php ob_start(); ?>
<div id ="modif"></div>

<h2 class='pageList'>Modifier le film: <?= htmlspecialchars($post['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class ="oneMovieDetail">
        <img src="public/images/bobine.jpg" class ="bobine" alt="bobine"/>   
        <div id="affiche4"><?php echo "<img src='".$post['image']."' />";?></div>    
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
            
            <label for="author" ></label>
            <p>Par : </p>
            <input type="text" name="author" class="inputbasic" title ='Veuillez entrer un auteur' id="author"value="<?php
                if (isset($_SESSION['pseudo']))
                :
                    echo htmlspecialchars($_SESSION['pseudo']);
                endif;
                ?>"
                required/>
        </div>
        
        <div >
            <label for="title"></label>  
             <p>Titre du film : </p>
            <input type="text" name="title" class="inputbasic" id="title" title ='Veuillez entrer un titre ' value="<?php echo htmlspecialchars($post['title']) ;?>"/>
        </div>
  
        <div>           
            <label for="horaires"></label>
             <p>Horaire de la séance : </p>          
            <input id="horaires" type="time" name="horaires" title='Veuillez entrer un horaire' class="inputbasic" value="<?php echo htmlspecialchars($post['horaires']) ;?>" required/>  
        </div>

        <div>
            <label for="duree"></label>  
            <p>Durée du film : </p>        
            <input id="duree" type="time" name="duree" class="inputbasic" title='Veuillez entrer une durée' value="<?php echo htmlspecialchars($post['duree']) ;?>" required/>  

        </div> 

        <div>
            <label for="image"></label> 
            <p>Affiche du film : </p>         
            <input type="text" name="image" class="inputbasic" id="image" title ='Veuillez entrer une affiche' value="<?php echo htmlspecialchars($post['image']) ;?>" required/>
        </div>

        <div>
            <label for="video"></label> 
            <p>Bande annonce  : </p>         
            <input type="text" name="video" class="inputbasic" id="video" title ='Veuillez entrer le lien de la bande annonce' value="<?php echo htmlspecialchars($post['video']) ;?>" required/>
        </div>

        <p>Résumé : </p>   
        <div class="inputbasic">            
            <label for="content"></label>
            <textarea name="content" title='Veuillez entrer un résumé' id="content" required><p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p></textarea>
            
        </div>
        <div>
            <input type="submit" value="envoyer" OnClick="return confirm('Voulez-vous vraiment modifier ce résumé ?');"></input>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>