<?php $title =  'Informations pratiques'; ?>


<?php ob_start(); ?>	
<div class ="pageInfo">
	<h2 class ='pageList'>Infos pratiques</h2>

	<?php $header = ob_get_clean(); ?>



<?php ob_start(); ?>	

	<h2 class ='pageList'>Tarifs</h2>
		<ul>
			<li><p><span>Cinéma des Enfants</span> → 3,00 €</p>
				<em>Dimanche 10h30 pour tous - voir programmation spéciale</em>
			</li>
			<li><p><span>-14 ans </span> → 5,50 €</p>
				<em>Toute l'année et matins </em>
			</li>
			<li><p><span>Ticket Comité d'Entreprise </span> → 6,50 €</p>
				<em>Tickets valables dans tous les Cinémas  d'Aquitaine - frais de gestion inclus</em>
			</li>
			<li><p><span>Tarif réduit</span> → 7,90 €</p>
				<em>Etudiants (justificatif obligatoire), +65 ans, *familles nombreuses à partir de 2 personnes minimum, sur présentation d'un justificatif</em>
			</li>
			<li><p><span>Tarif plein </span> → 10,20 €</p></li>
		</ul>


	<h2 class ='pageList'>La 3D</h2>
		<ul>
			<li><p><span>Majoration pour les films en 3D </span> → 1,00€/place</p></li>
			<li><p><span>Lunettes 3D </span> → 1,00€/lunettes</p>
				<em>Lunettes à restituer à l'issue de la séance</em>
			</li>
		</ul>

	<h2 class ='pageList'>Le label qualité CINEMAX</h2>
		<p> Depuis le 15 juin, Les salles 1 et 3 du cinéma, sont labélisées CINEMAX®, proposant une technologie sonore unique au monde, développée par l'entreprise américaine Trinnov®, liant son immersif et processeur son Ovation.

		En plus d'un gradinnage poussé à l'extrème pour une sensation de plongée dans l'écran et dans le spectacle, le confort et la qualité sonore et visuelle prennent une toute nouvelle dimension. Le renforcement sonore vous plonge dans une nouvelle dimension.

		  Venez vite découvrir ces nouvelles salles!</p>



	<h2 class ='pageList'>Caractéristiques</h2>

		<ul>
			<li>→ 10 salles et 1400 fauteuils</li>
			<li>→ 3D et Son 7.1</li>
			<li>→ Projection numérique haute qualité </li>
			<li>→ Label qualité CINEMAX®, développé la société américaine Trinnov®.</li>
			<li>→ Des écrans de 10m à 20m de base</li>
			<li>→ Des salles de 90 à 400 places</li>
			<li>→ Parking de 300 places GRATUITES et nombreux commerces à proximité</li>
			<li>→ Cinéma entièrement accessible aux personnes à mobilité réduite ainsi qu'aux mal-entendants et mal-voyants.</li>
			<li>→ Un espace confiserie avec des mutltitudes de produits</li>
			<li>→ Des bornes automatiques d'achat de billets</li>
			<li>→ Des espaces de détente et un espace associatif</li>
		</ul>

	<h2 class ='pageList'>Horaires</h2>

		<p>Votre cinéma est ouvert de 10H à 23h30 sans interruption. Veuillez vous reporter aux horaires des films.</p>

	<h2 class ='pageList'>Où nous trouver</h2>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20995.53086225139!2d2.2831737220005306!3d48.86886223302659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x120276bc732ada51!2sUGC+Maillot!5e0!3m2!1sfr!2sfr!4v1538148264980" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
</div>
<?php $content = ob_get_clean(); ?>


<!--///////////////////////////////// renvoi vers template //////////////////////////////////-->
<?php require('views/template.php'); ?>