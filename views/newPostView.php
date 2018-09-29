<?php $title = 'Créer un nouveau Chapitre '; ?>

<?php ob_start(); ?>
<div id ="create"></div>

<h2 class='pageList'>Mise en ligne d'un nouveau film</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<form action="index.php?action=createPost" method="POST">
        <div>
            <label for="author" ></label>
     
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo'])):
                
                    echo htmlspecialchars($_SESSION['pseudo']);
                endif;
                ?>"
                />
        </div>

        <div>
            <label for="title"></label>          
            <input type="text" name="title" class="inputbasic" id="title" placeholder="Indiquez ici le titre"/>

        </div>
        
        <div >
            
        <div class="inputbasic" >
                <label for="content"></label>
                <textarea name="content" id="content" placeholder="Indiquez ,ici ,le résumé du film"></textarea>
            </div>
        </div>


        <div>
            <input type="submit" value="envoyez"></input>
        </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>

