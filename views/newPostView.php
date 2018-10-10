<?php $title = 'Créer une nouvelle séance '; ?>

<?php ob_start(); ?>
<div id ="create"></div>

<h2 class='pageList'>Mise en ligne d'un nouveau film</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<form id="four_form"action="index.php?action=createPost" method="POST">
        <div>
            
            <label for="author" ></label>
            <p>Par :</p>
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo'])):
                
                    echo htmlspecialchars($_SESSION['pseudo']);
                endif;
                ?>"
                required/>
        </div>

        <div >
          
            <label for="title"></label>  
            <p>Titre du film : </p>        
            <input type="text" name="title" class="inputbasic" id="title" placeholder="Indiquez ici le titre" />

        </div>

        <div>
            
            <label for="horaires"></label>
            <p>Horaire de la séance :</p>          
            <input id="horaires" type="time" name="horaires" value="13:30" class="inputbasic" placeholder="Indiquez les horaires des séances" />

        </div>

        <div>
            <label for="duree"></label> 
            <p>Durée du film :</p>         
            <input id="duree" type="time" name="duree" value="01:30" class="inputbasic" placeholder="Indiquez la durée du film" />

        </div>

        <div>
    
            <label for="image"></label>
            <p>Affiche du film :</p>          
            <input type="text" name="image" class="inputbasic" id="image" placeholder="Inserer le lien de votre image" />

        </div>
   
        <div>
            
            <label for="duree"></label>
            <p>Bande annonce :</p>          
            <input type="text" name="video" class="inputbasic" id="video" placeholder="Insérer le lien de la bande annonce" />

        </div>
        
        
                    
        <div class="inputbasic">
            <label for="content"></label>
            <p>Résumé :</p> 
            <textarea name="content" id="content"  placeholder="Indiquez ,ici ,le résumé du film"></textarea>
        </div>
        

        <div>

            <input type="submit" value="envoyez"></input>
        </div>
</form>

<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>

