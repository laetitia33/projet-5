<?php $title = 'Contact cine-cinema';?>

<?php ob_start(); ?> 

<form class ="form"  id="first_form" method="post" action="index.php?action=addMail" >   
  
<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>  
   
    <fieldset>
     <legend><h2 class="pageList">Contact</h2></legend>

                <div class="name">
                    <label for="name"></label><br />
                    <input type="text" id="name" name="name" minlength="2" placeholder="Entrez votre nom" class="inputbasic" value="" required/>
                </div>

                <div class="email">
                    <label for="email"></label><br />
                    <input type="email" id ="email" name="email" placeholder="Entrez votre e-mail" class="inputbasic"  value="" required/>
                </div>
                <div class="object">

                    <label for="object"></label><br />
                    <input type="text" id="object" minlength="5" name="object" placeholder="sujet" class="inputbasic" value="" required/>
                </div>

                <div class="inputbasic" >
                    <label for="message"></label><br />
                    <textarea  id ="message" minlength="5" name="message" placeholder="Entrez votre message" required ></textarea>
                </div>
                <div id ="g-recaptcha" >
                    <div class="g-recaptcha" data-sitekey="6LeNk3EUAAAAAA1T9n_TMoX3E9khL3y9UffDBwv7"></div>
                </div>
             <input type="submit" class="submit" value ="Envoyez votre message"  OnClick="return confirm('Souhaitez-vous envoyer ce message ?');"/>
            
        </fieldset>
</form>
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>