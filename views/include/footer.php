<footer>
	
	<p>&copy; 2018 Cine-Cinema droits réservés<br></p>
	<p>
	    <a href="https://jigsaw.w3.org/css-validator/validator?uri=https%3A%2F%2Fcinecinemadeparis.000webhostapp.com%2F&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=fr">
	        <img style="border:0;width:88px;height:31px"
	            src="https://jigsaw.w3.org/css-validator/images/vcss"
	            alt="CSS Valide !" />
	    </a>
	</p>

   <p>
      <a href="https://validator.w3.org/check?uri=referer"><img
         style="margin:auto;"
          src="http://www.w3.org/Icons/valid-xhtml10"
          alt="Valid XHTML 1.0!" height="31" width="88" /></a>
    </p>

    
	<p> <?php
    if(empty($_SESSION['pseudo'])) :
        echo "<a class='' href='index.php?action=login'>Se connecter</a>";
    
    else:
                echo 'Bienvenue sur le site '.$_SESSION['pseudo'] .' - <a href="index.php?action=logout" OnClick="return confirm(\'Souhaitez-vous vous déconnecter?\')"; >Se déconnecter</a>';
    endif;?> </p>
    <p id="legal">Mentions légales</p>
	<div id="legalnotice">
		<a href="#ferme" title="fermer" id="closelegal">X</a>
		<h2 id= "titlenotice">Mentions légales</h2>
		<h3>Edition du sitep</h3>
		<P> Editeur du site https://cinecinema.000webhostapp.com/: Madame laetitia bernardi Adresse : 24 rue henri dheurle, 33260 la teste de buch</p>
		<h3>Propriété Intellectuelle</h3>
		<p>L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris les représentations iconographiques et photographiques. La reproduction, adaptation et/ou traduction de tout ou partie de ce site sur un support quel qu'il soit, est formellement interdite sauf autorisation expresse du Directeur de la publication.</p>
		<h3>Modification du site</h3>
		<p>L'équipe éditoriale se réserve le droit de modifier ou de corriger le contenu de ce site et de ces mentions légales à tout moment et ceci sans préavis.</p>
		<h3>Hébergeur</h3>
		<p>Le site https://cinecinema.000webhostapp.com/</p>
	</div>


	<a href="https://github.com/laetitia33/projet-5.git">
		<img src="public/images/github.png" alt="image github"/>
	</a>

</footer>