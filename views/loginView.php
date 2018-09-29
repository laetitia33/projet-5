<?php $title = 'Connection';?>


<?php ob_start(); ?>    

<h2 class ='pageList'>Connexion</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
        
        <form action="index.php?action=log" method="POST">
          
           
            <div>
                <label for="user">Pseudo :</label><br />
                <input type="text" placeholder="pseudo" class="inputbasic" id="user" name="pseudo">
            </div>
        
            <div>
                <label for="pass">Mot de passe :</label><br /> 
                <input type="password" class="inputbasic" id="pass" name="pass"  placeholder="mot de passe">
               
            </div>
            
            <div>
                <input type="submit" value="Connexion" />
            </div>

      
        </form>



          <p><a class="news" href="index.php"><i class="fas fa-arrow-left">Retour à l'accueil</i></a></p>
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>