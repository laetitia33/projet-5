<?php $title =  'Informations pratiques'; ?>

<!DOCTYPE html>
<html lang="fr" class='template'>
	<?php include_once 'views/include/head.php';?>
<body>	
	<div id="blocpage">
	
		<header>
			<?php include_once 'views/include/menu.php'; ?>
			<?php include_once 'views/include/menu_responsive.php'; ?>
		</header>

			<a id="films"></a>
	<div class ="pageInfo">
		
		
 <!--////////////////////// API METEO ///////////////////////////-->
		<section>
		 	<h2 class ='pageList'>Infos pratiques</h2>
		 	<div class="accordion">		
				
					<div class="accordion-header">Info météo</div>
					<div class="accordion-content">
				  		<h3>La météo à Paris</h3>
						<div id="meteo"></div>		
						<div id ='messageMeteo'></div>	
						<div id ='imgMessageMeteo'></div>		
					</div>
			</div>
		</section>			
 <!--///////////////////////// MAP CINEMA ///////////////////////-->
		 <section>
				<h2 class ='pageList'>Où nous trouver</h2>
				<div id='map'></div>
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

		</section>
		<section>
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
		</section>
		<section>
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
		</section>
		<section>
				<h2 class ='pageList'>Horaires</h2>
					<p>Votre cinéma est ouvert de 10H à 01:00 sans interruption. Veuillez vous reporter aux horaires des films.</p>

		</section>
			<span id="btntop">
				<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
			</span>

	</div>
			<?php include_once 'views/include/footer.php' ?>			
		
			
	</div>	
	<script src="assets/js/meteo.js"></script>
	<script src="assets/js/map.js"></script>
	<script src ="assets/js/script.js"></script>
</body>
</html>