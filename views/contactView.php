<?php $title = 'Contact cine-cinema';?>

<?php ob_start(); ?>    

<h2 class ='pageList'>Contact</h2>

<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>  
   
     
            <form class="form" method="post" action="index.php?action=addMail" >

                <div class="name">
                    <label for="name"></label><br />
                    <input type="text" id="name" name="name" placeholder="Entrez votre nom" class="inputbasic" value="" />
                </div>

                <div class="email">
                    <label for="email"></label><br />
                    <input type="email" id ="email" name="email" placeholder="Entrez votre e-mail" class="inputbasic"  value="" />
                </div>
                <div class="object">

                    <label for="object"></label><br />
                    <input type="text" id="object" name="object" placeholder="sujet" class="inputbasic" value="" />
                </div>

                <div class="inputbasic" >
                    <label for="message"></label><br />
                        <textarea  id ="message" name="message" placeholder="Entrez votre message"></textarea>
                </div>
                <div id ="g-recaptcha" >
                    <div class="g-recaptcha" data-sitekey="6LeNk3EUAAAAAA1T9n_TMoX3E9khL3y9UffDBwv7"></div>
                </div>
             <input type="submit" value ="Envoyez votre message"  OnClick="return confirm('Souhaitez-vous envoyer ce message ?');"/>
            
            </form>
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>