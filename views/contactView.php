<?php $title = 'Contact cine-cinema';?>

<?php ob_start(); ?> 
 <form class ="form"  method="post" action="index.php?action=addMail" > 

    <fieldset>
     <legend><h2 class="pageList">Contact</h2></legend>

                <div>
                    <label for="name"></label><br />
                    <input type="text" id="name" name="name"  placeholder="Entrez votre nom" class="inputbasic" value="" required/>
                </div>

                <div>
                    <label for="email"></label><br />
                    <input type="email" id ="email" name="email" placeholder="Entrez votre e-mail" class="inputbasic"  value="" required/>
                </div>

                <div>

                    <label for="object"></label><br />
                    <input type="text" id="object"  name="object" placeholder="sujet" class="inputbasic" value="" required/>
                </div>

                                            
                <div class="inputbasic">
                    <label for="msg"></label>
                    <textarea  name="msg" id="msg"  placeholder="Entrez votre message" required></textarea>
                </div>

                <div id ="g-recaptcha" >
                    <div class="g-recaptcha" data-sitekey="6LcuTHUUAAAAADovyELFyViiWmcT3zL_L_hW54ef"></div>
                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                </div>  


             <input type="submit" class="submit" value ="Envoyez votre message"  OnClick="return confirm('Souhaitez-vous envoyer ce message ?');"/>
            
        </fieldset>
</form>
<?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>