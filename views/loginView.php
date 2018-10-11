<?php $title = 'Connexion / Inscription';?>


<?php ob_start(); ?>    

<h2 class ='pageList'>Connexion</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>


<form class="form" id="second_form" action="index.php?action=log" method="POST">
                    
            <div>
                <label for="user">Pseudo :</label><br />
                <input type="text" placeholder="pseudo" class="inputbasic" id="user" name="pseudo"  >
          
              
            </div>

            <div>
                <label for="pass">Mot de passe :</label><br /> 
                <input type="password" class="inputbasic" id="pass" name="pass"  placeholder="mot de passe">

            </div>
            
            <div>
                <input type="submit" class ="submit" id ="submit" value="Connexion" />
            </div>

      
</form>

<h2 class ='pageList'>Inscription</h2>
        <form action="index.php?action=register" method="post">

            <div>
                <label for="pseudo"></label>
                <p>Pseudo :</p>     
                <input type="text" name="pseudo"  class="inputbasic" placeholder="Pseudo"/>
                
            </div>

            <div>
                <label for="password"></label>
                <p>Mot de passe :</p>            
                <input type="password" name="pass" id="password" class="inputbasic" placeholder="Mot de passe"/>
            </div>
           
            <div>
                <label for="password_confirm"></label>
                <p>Confirmation mot de passe :</p>          
                <input type="password" name="password_confirm" id="password_confirm" class="inputbasic" placeholder="Confirmez votre mot de passe"/>
            </div>
           
            <div>
                <label for="email"></label>
                <p>E-mail :</p>
                <input type="email" name="email" id="email" class="inputbasic" placeholder="adresse mail"/>          
            </div>

            <div>
                <input type="submit" value="Inscription" />
            </div>
       
        </form>

          <p><a class="news" href="index.php"><i class="fas fa-arrow-left">Retour à l'accueil</i></a></p>
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>