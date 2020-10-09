<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Vives Map - Trouvez votre salle en 1 clic</title>
		<link rel="icon" href="favicon.png" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
		<body>
			<div id="container">

				<?php
				//Version
					$version = "bêta 0.2";

				//Tableaux contenat salles par étage
					$salles_rdc = array('flaubert','eiffel','daumnier','colette','voltaire','tchekov','sand','rimbaud','quesnay','plank','ohm','mozart','marconi','newton','laplace','kepler','isabey','jacquard','gay-lussac','harvey','fleming','einstein','fleming','darwin','boole','becquerel','ampère','cuvier','pasteur','de-gennes','bach');

					$salles_etage = array('molière','kipling','ibsen','nabokov','lamartine','jussien','hérodote','froissart','dumas','baudelaire','apollinaire','chenier','euripide','giraudoux','kafka','nerval','leibniz','joinville','ingres','hugo','galilée','fermat','erasme','dante','copernic','bude','avicenne','stendhal','pascal','cervantes');

				//Creation etat de base des variables
					$etageActuel = 0;
					$result = null;
					$search = false;
					$bullesSalles = true;
					$erreurEntree = false;

				//conditions pour gérer la barre de recherche
					if (isset($_POST['searchBar']) AND !empty($_POST['searchBar'])) {
						$result = strtolower($_POST['searchBar']);
						$search = true;
					}
					else {
						$result = null;
						$search = false;
					}

					//conditions pourgérer l'étage actuel
					if (isset($result) AND in_array($result, $salles_rdc)){
						$etageActuel = 0;
					}
					elseif (in_array($result, $salles_etage)) {
						$etageActuel = 1;
					}
					else{
						$erreurEntree = true;
					}

					//bulles des salles
					if (isset($_POST['inputBulles']) AND $_POST['inputBulles'] == 'désactiverlesbulles') {
						$bullesSalles = false;
					} elseif (isset($_POST['inputBulles']) AND $_POST['inputBulles'] == 'activerlesbulles') {
						$bullesSalles = true;
					}

					//activer ou désactiver bulles des salles
					if ($bullesSalles == true) { ?>

						<script>
							document.getElementsByClassName('salle')['0'].style.color = red;
						</script>

					<?php } else { ?>

						<script>
							document.getElementsById('salle')['0'].style.color = green;
						</script>

					<?php } ?>

					

				<header>
					<div id="formAndErrorBox">
					<form method="POST" onclick="menu('none')">
						<input type="text" name="searchBar" id="searchBar" placeholder="nom de la salle" autocomplete="off" autocapitalize="off" maxlength="15" minlength="3" onfocus="this.value = '';" value=<?php echo $result;?>>
						<input type="submit" id="searchButton" value="chercher"></input>
					</form>

					<p id="erreurEntree">
						<?php if (isset($result) AND $erreurEntree == true) {
							echo "aucune salle trouvée";
						}
					?></p>
					</div>
				</header>


					<div id="indicationEtage"><?php if ($etageActuel == 1) { echo "1er étage"; } else { echo "rez de chaussée"; } ?></div>

<?php

					if ($etageActuel == 1) { ?>

						<img src="planEtage1.jpg" class="plan">

					<?php }
					else{ ?>

						<img src="planEtage0.jpg" class="plan">

					<?php } ?>

				<?php 
					if ($etageActuel == 0) { ?>

							<?php if ($search == true AND $result == 'flaubert') { ?>
								<p class="focused" id="flaubert">flaubert</p>
							<?php } else { ?>
								<p class="salle" id="flaubert">flaubert</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'eiffel') { ?>
								<p class="focused" id="eiffel">eiffel</p>
							<?php } else { ?>
								<p class="salle" id="eiffel">eiffel</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'daumnier') { ?>
								<p class="focused" id="daumnier">daumnier</p>
							<?php } else { ?>
								<p class="salle" id="daumnier">daumnier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'colette') { ?>
								<p class="focused" id="colette">colette</p>
							<?php } else { ?>
								<p class="salle" id="colette">colette</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'voltaire') { ?>
								<p class="focused" id="voltaire">voltaire</p>
							<?php } else { ?>
								<p class="salle" id="voltaire">voltaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'tchekov') { ?>
								<p class="focused" id="tchekov">tchekov</p>
							<?php } else { ?>
								<p class="salle" id="tchekov">tchekov</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'sand') { ?>
								<p class="focused" id="sand">sand</p>
							<?php } else { ?>
								<p class="salle" id="sand">sand</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'rimbaud') { ?>
								<p class="focused" id="rimbaud">rimbaud</p>
							<?php } else { ?>
								<p class="salle" id="rimbaud">rimbaud</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'quesnay') { ?>
								<p class="focused" id="quesnay">quesnay</p>
							<?php } else { ?>
								<p class="salle" id="quesnay">quesnay</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'plank') { ?>
								<p class="focused" id="plank">plank</p>
							<?php } else { ?>
								<p class="salle" id="plank">plank</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ohm') { ?>
								<p class="focused" id="ohm">ohm</p>
							<?php } else { ?>
								<p class="salle" id="ohm">ohm</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'mozart') { ?>
								<p class="focused" id="mozart">mozart</p>
							<?php } else { ?>
								<p class="salle" id="mozart">mozart</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'marconi') { ?>
								<p class="focused" id="marconi">marconi</p>
							<?php } else { ?>
								<p class="salle" id="marconi">marconi</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'newton') { ?>
								<p class="focused" id="newton">newton</p>
							<?php } else { ?>
								<p class="salle" id="newton">newton</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'laplace') { ?>
								<p class="focused" id="laplace">laplace</p>
							<?php } else { ?>
								<p class="salle" id="laplace">laplace</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kepler') { ?>
								<p class="focused" id="kepler">kepler</p>
							<?php } else { ?>
								<p class="salle" id="kepler">kepler</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'isabey') { ?>
								<p class="focused" id="isabey">isabey</p>
							<?php } else { ?>
								<p class="salle" id="isabey">isabey</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'jacquard') { ?>
								<p class="focused" id="jacquard">jacquard</p>
							<?php } else { ?>
								<p class="salle" id="jacquard">jacquard</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'gay-lussac') { ?>
								<p class="focused" id="gay-lussac">gay-lussac</p>
							<?php } else { ?>
								<p class="salle" id="gay-lussac">gay-lussac</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'harvey') { ?>
								<p class="focused" id="harvey">harvey</p>
							<?php } else { ?>
								<p class="salle" id="harvey">harvey</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'fleming') { ?>
								<p class="focused" id="fleming">fleming</p>
							<?php } else { ?>
								<p class="salle" id="fleming">fleming</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'einstein') { ?>
								<p class="focused" id="einstein">einstein</p>
							<?php } else { ?>
								<p class="salle" id="einstein">einstein</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'darwin') { ?>
								<p class="focused" id="darwin">darwin</p>
							<?php } else { ?>
								<p class="salle" id="darwin">darwin</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'boole') { ?>
								<p class="focused" id="boole">boole</p>
							<?php } else { ?>
								<p class="salle" id="boole">boole</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'becquerel') { ?>
								<p class="focused" id="becquerel">becquerel</p>
							<?php } else { ?>
								<p class="salle" id="becquerel">becquerel</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ampère') { ?>
								<p class="focused" id="ampère">ampère</p>
							<?php } else { ?>
								<p class="salle" id="ampère">ampère</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'cuvier') { ?>
								<p class="focused" id="cuvier">cuvier</p>
							<?php } else { ?>
								<p class="salle" id="cuvier">cuvier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'pasteur') { ?>
								<p class="focused" id="pasteur">pasteur</p>
							<?php } else { ?>
								<p class="salle" id="pasteur">pasteur</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'de-gennes') { ?>
								<p class="focused" id="de-gennes">de-gennes</p>
							<?php } else { ?>
								<p class="salle" id="de-gennes">de-gennes</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'bach') { ?>
								<p class="focused" id="bach">bach</p>
							<?php } else { ?>
								<p class="salle" id="bach">bach</p>
							<?php } }?>

				<?php 
					if ($etageActuel == 1) { ?>

							<?php if ($search == true AND $result == 'molière') { ?>
								<p class="focused" id="molière">molière</p>
							<?php } else { ?>
								<p class="salle" id="molière">molière</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kipling') { ?>
								<p class="focused" id="kipling">kipling</p>
							<?php } else { ?>
								<p class="salle" id="kipling">kipling</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ibsen') { ?>
								<p class="focused" id="ibsen">ibsen</p>
							<?php } else { ?>
								<p class="salle" id="ibsen">ibsen</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'nabokov') { ?>
								<p class="focused" id="nabokov">nabokov</p>
							<?php } else { ?>
								<p class="salle" id="nabokov">nabokov</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'lamartine') { ?>
								<p class="focused" id="lamartine">lamartine</p>
							<?php } else { ?>
								<p class="salle" id="lamartine">lamartine</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'jussien') { ?>
								<p class="focused" id="jussien">jussien</p>
							<?php } else { ?>
								<p class="salle" id="jussien">jussien</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'hérodote') { ?>
								<p class="focused" id="hérodote">hérodote</p>
							<?php } else { ?>
								<p class="salle" id="hérodote">hérodote</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'froissart') { ?>
								<p class="focused" id="froissart">froissart</p>
							<?php } else { ?>
								<p class="salle" id="froissart">froissart</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'dumas') { ?>
								<p class="focused" id="dumas">dumas</p>
							<?php } else { ?>
								<p class="salle" id="dumas">dumas</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'baudelaire') { ?>
								<p class="focused" id="baudelaire">baudelaire</p>
							<?php } else { ?>
								<p class="salle" id="baudelaire">baudelaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'apollinaire') { ?>
								<p class="focused" id="apollinaire">apollinaire</p>
							<?php } else { ?>
								<p class="salle" id="apollinaire">apollinaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'chenier') { ?>
								<p class="focused" id="chenier">chenier</p>
							<?php } else { ?>
								<p class="salle" id="chenier">chenier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'euripide') { ?>
								<p class="focused" id="euripide">euripide</p>
							<?php } else { ?>
								<p class="salle" id="euripide">euripide</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'giraudoux') { ?>
								<p class="focused" id="giraudoux">giraudoux</p>
							<?php } else { ?>
								<p class="salle" id="giraudoux">giraudoux</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kafka') { ?>
								<p class="focused" id="kafka">kafka</p>
							<?php } else { ?>
								<p class="salle" id="kafka">kafka</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'nerval') { ?>
								<p class="focused" id="nerval">nerval</p>
							<?php } else { ?>
								<p class="salle" id=nerval>nerval</p>
							<?php }?>

							<?php if ($search == true AND $result == 'leibniz') { ?>
								<p class="focused" id="leibniz">leibniz</p>
							<?php } else { ?>
								<p class="salle" id="leibniz">leibniz</p>
							<?php }?>

							<?php if ($search == true AND $result == 'joinville') { ?>
								<p class="focused" id="joinville">joinville</p>
							<?php } else { ?>
								<p class="salle" id="joinville">joinville</p>
							<?php }?>

							<?php if ($search == true AND $result == 'ingres') { ?>
								<p class="focused" id="ingres">ingres</p>
							<?php } else { ?>
								<p class="salle" id="ingres">ingres</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'hugo') { ?>
								<p class="focused" id="hugo">hugo</p>
							<?php } else { ?>
								<p class="salle" id="hugo">hugo</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'galilée') { ?>
								<p class="focused" id="galilée">galilée</p>
							<?php } else { ?>
								<p class="salle" id="galilée">galilée</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'fermat') { ?>
								<p class="focused" id="fermat">fermat</p>
							<?php } else { ?>
								<p class="salle" id="fermat">fermat</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'erasme') { ?>
								<p class="focused" id="erasme">erasme</p>
							<?php } else { ?>
								<p class="salle" id="erasme">erasme</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'dante') { ?>
								<p class="focused" id="dante">dante</p>
							<?php } else { ?>
								<p class="salle" id="dante">dante</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'copernic') { ?>
								<p class="focused" id="copernic">copernic</p>
							<?php } else { ?>
								<p class="salle" id="copernic">copernic</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'bude') { ?>
								<p class="focused" id="bude">bude</p>
							<?php } else { ?>
								<p class="salle" id="bude">bude</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'avicenne') { ?>
								<p class="focused" id="avicenne">avicenne</p>
							<?php } else { ?>
								<p class="salle" id="avicenne">avicenne</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'stendhal') { ?>
								<p class="focused" id="stendhal">stendhal</p>
							<?php } else { ?>
								<p class="salle" id="stendhal">stendhal</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'pascal') { ?>
								<p class="focused" id="pascal">pascal</p>
							<?php } else { ?>
								<p class="salle" id="pascal">pascal</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'cervantes') { ?>
								<p class="focused" id="cervantes">cervantes</p>
							<?php } else { ?>
								<p class="salle" id="cervantes">cervantes</p>
							<?php } } ?>


							<button onclick="menu('block')" id="openMenuButton"><img src="moreArrow.png"></button>
							<div id="menu">
								<button onclick="menu('none')" id="closeMenuButton">x</button>
								<img src="logo_site.png" id="logo_site">
								<h2 class="menuTitle">Options</h2>
								<div class="menuBox">
									<button class="optionButton" id="ombreRose" onclick="bulles(); menu('none')"><img class="optionImg" src="chat.png"><p>désactiver les bulles</p></button>
									<div class="optionSeparation"></div>
									<button class="optionButton" id="ombreBleue"><img class="optionImg" src="contact.png"><p>me contacter</p><a href="mailto:contact.vivesmap@gmail.com" id="optionA"></a></button>
									<div class="optionSeparation"></div>
									<button class="optionButton" id="ombreVerte"><img class="optionImg" src="mentions.png"><p>mentions légales</p><a href="mentionslegales.html" id="optionA"></a></button>
								</div>
								<footer>
									<p>développé avec amour par</p><img src="logo_nils.png">
								</footer>
							</div>

							<script type="text/javascript">
								function menu(display){
									document.getElementById('menu').style.display = display;
									if (display == 'block') {
										document.getElementById('openMenuButton').style.display = 'none';
									} else {
										document.getElementById('openMenuButton').style.display = 'block';
									}
								}
							</script>

							<script>
								function bulles(){
									var y = document.getElementsByClassName("salle");
									var i;
									for (i = 0; i < y.length; i++) {
									  y[i].style.backgroundColor = 'transparent';
									  y[i].style.backdropFilter = 'none';
									  y[i].style.color = 'black';
									} }
						</script>
			</div>
		</body>
</html>