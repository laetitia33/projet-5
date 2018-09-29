<?php $title = 'Contact cine-cinema';?>

<?php ob_start(); ?>    

<h2 class ='pageList'>Salles de cinemas </h2>

<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>  


	Vous recherchez un cinema? Cliquez sur les icones 

 <!--map-->
            <div id="map"></div>
           
            <!--formulaire de renseignements des marqueurs-->
                 <div id="formulaire">
		                <div id="form">
		                    <a href="#fermeform" title="fermer" id="fermeform">X</a>
		                    <p>Adresse : <span id ="address"></span></p>
		                    <p>Arrondissement :<span id="status" ></span></p>
		                    <p> Ecrans : <span id ="station"></span></p>
		                    <p>Nom : <span id="nb-velo"></span></p>
		                    <p>Fauteuils disponibles : <span id="nb-place"></span></p>
		                    
		    			</div>
           		 </div>

   <?php $content = ob_get_clean(); ?>

<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>