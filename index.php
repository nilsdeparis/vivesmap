<?php

session_start();

if (!isset($_SESSION['escaliers'])) {
	$_SESSION['escaliers'] = false;
}

if (!isset($_SESSION['salles'])) {
	$_SESSION['salles'] = true;
}

if (!isset($_SESSION['toilettes'])) {
	$_SESSION['toilettes'] = false;
}

if (!isset($_SESSION['setting1'])) {
	$_SESSION['setting1'] = true;
}

$_SESSION['garderOuvert'] = false;

?>
<!DOCTYPE html>

<script type="text/javascript">
			var layersMenu = 0;
			var settingsMenu = 0;
			function menuDisplay(menu){
				if (menu == 'layersChoiceBox'){
					if (layersMenu == 0){
						layersMenu = 1;
						document.getElementById(menu).style.display = 'flex';
						settingsMenu = 0;
						document.getElementById('settingsBox').style.display = 'none';
					} else {
						layersMenu = 0;
						document.getElementById(menu).style.display = 'none';
					}
				}
				if (menu == 'settingsBox') {
					if (settingsMenu == 0){
						settingsMenu = 1;
						document.getElementById(menu).style.display = 'flex';
						layersMenu = 0;
						document.getElementById('layersChoiceBox').style.display = 'none';
					} else {
						settingsMenu = 0;
						document.getElementById(menu).style.display = 'none';
					}
				}
			}
		</script>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Vives Map - Trouvez votre salle en 1 clic</title>
		<link rel="icon" href="images/favicon.png" />
		<meta name="viewport" content="width=device-width">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

	<header>
		<div id="btnBox">
			<div class="btn" id="layersBtn" onclick="menuDisplay('layersChoiceBox')"><img src="images/layers.png" /></div>
			<div class="btn" id="settingsBtn" onclick="menuDisplay('settingsBox')"><img src="images/settings.png" /></div>
		</div>
			


		<div id="layersChoiceBox">
			<form method="POST" class="container">
				<button type="submit" value="true" name="layer1" class="buttona">
					<div class="imgBox" id="img1">
						<img src="images/stairs.png">
					</div>
					<p class="text" id="text1">Escaliers</p>
				</button>
			</form>
			<div class="separation"></div>
			<form method="POST" class="container">
				<button type="submit" value="true" name="layer2" class="buttona">
					<div class="imgBox" id="img2">
						<img src="images/classroom.png">
					</div>
					<p class="text" id="text2">Salles</p>
				</button>
			</form>
			<div class="separation"></div>
			<form method="POST" class="container">
				<button type="submit" value="true" name="layer3" class="buttona">
					<div class="imgBox" id="img3">
						<img src="images/toilet.png">
					</div>
					<p class="text" id="text3">Toilettes</p>
				</button>
			</form>
		</div>


		<?php 

		if (isset($_POST['layer1']) AND $_POST['layer1'] == 'true') {
				if (isset($_SESSION['escaliers'])) {
					if ($_SESSION['escaliers'] == true) {
						$_SESSION['escaliers'] = false;
					} else{
						$_SESSION['escaliers'] = true;
					}
				} else {
					$_SESSION['escaliers'] = false;
				}
		}

		if (isset($_POST['layer2']) AND $_POST['layer2'] == 'true') {
				if (isset($_SESSION['salles'])) {
					if ($_SESSION['salles'] == true) {
						$_SESSION['salles'] = false;
					} else{
						$_SESSION['salles'] = true;
					}
				} else {
					$_SESSION['salles'] = true;
				}
		}

		if (isset($_POST['layer3']) AND $_POST['layer3'] == 'true') {
				if (isset($_SESSION['toilettes'])) {
					if ($_SESSION['toilettes'] == true) {
						$_SESSION['toilettes'] = false;
					} else{
						$_SESSION['toilettes'] = true;
					}
				} else {
					$_SESSION['toilettes'] = false;
				}
		}


		if (isset($_SESSION['escaliers'])) {
			if ($_SESSION['escaliers'] == true) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img1{
						border: 4px solid #1DCF41;
						width: 22px;
						height: 22px;
					}
				</style>

			<?php }

			if ($_SESSION['escaliers'] == false) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img1{
						border: none;
						width: 30px;
						height: 30px;
					}
				</style>

			<?php } }

		if (isset($_SESSION['salles'])) {
			if ($_SESSION['salles'] == true) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img2{
						border: 4px solid #1DCF41;
						width: 22px;
						height: 22px;
					}
				</style>

			<?php }

			if ($_SESSION['salles'] == false) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img2{
						border: none;
						width: 30px;
						height: 30px;
					}
				</style>

			<?php } }

		if (isset($_SESSION['toilettes'])) {
			if ($_SESSION['toilettes'] == true) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img3{
						border: 4px solid #1DCF41;
						width: 22px;
						height: 22px;
					}
				</style>

			<?php }

			if ($_SESSION['toilettes'] == false) { ?>

				<style type="text/css">
					#layersChoiceBox .container #img3{
						border: none;
						width: 30px;
						height: 30px;
					}
				</style>

			<?php } }

		if (isset($_SESSION['garderOuvert'])) {
			if ($_SESSION['garderOuvert'] == true) { ?>
				<style type="text/css">
					#layersChoiceBox{
						display: flex;
					}
				</style>
			<?php } } ?>

		
		<div id="settingsBox">
			<div id="head">
				<p>Paramètres<p>
			</div>
			<div id="body">
				<p class="title">Réglages</p>
				<form method="POST">
					<button type="submit" class="setting" name="setting1" value="true">
						<p class="settingInputText">autocomplétion</p>
						<div class="settingInputBtn" id="settingsInput1">OFF</div>
					</button>
				</form>
				<div class="separation"></div>
				<p class="title">Liens</p>
				<div id="liensBox">
					<a href="mentionslegales.html" target="_blank" class="liensBtn">
						<img src="images/legalMentions" class="imgBox">
						<p>Mentions Légales</p>
					</a>
					<div class="separation"></div>
					<a href="https://github.com/nilsdeparis/vivesmap" target="_blank" class="liensBtn">
						<img src="images/sourceCode" class="imgBox">
						<p>Code Source</p>
					</a>
					<div class="separation"></div>
					<a href="mailto:nils.demougeot@gmail.com" class="liensBtn">
						<img src="images/contact" class="imgBox">
						<p>Me Contacter</p>
					</a>
				</div>
				
<?php
			if (isset($_POST['setting1']) AND $_POST['setting1'] == 'true') {
				if (isset($_SESSION['setting1'])) {
					if ($_SESSION['setting1'] == true) {
						$_SESSION['setting1'] = false;
					} else{
						$_SESSION['setting1'] = true;
					}
				} else {
					$_SESSION['setting1'] = true;
					$_SESSION['garderOuvert'] = true;
				}
		}


		if (isset($_SESSION['setting1'])) {
			if ($_SESSION['setting1'] == true) { ?>
				<style type="text/css">
					#settingsInput1{
						background-color: #D3F9CF;
						color: #02CB00;
					}
				</style>
				<script type="text/javascript">document.getElementById('settingsInput1').innerHTML = "ON";</script>
				

			<?php }

			if ($_SESSION['setting1'] == false) { ?>
				<style type="text/css">
					#settingsInput1{
						background-color: #FFBFBF;
						color: #FF0000;
					}
				</style>
				<script type="text/javascript">document.getElementById('settingsInput1').innerHTML = "OFF";</script>
				

			<?php } } ?>

			</div>
		</div>
						<?php //AUTOCOMPLETE
							if (isset($_SESSION['setting1']) AND $_SESSION['setting1'] == false) { ?>
								
								<style>
								#searchBarBox {
								  display: flex;
								  padding-right: 0px;
								  position: relative;
								}

								#searchBar {
								  height: 50px;
									width: 200px;
									background: white;
									border-radius: 50px;
									display: flex;
									align-items: center;
									justify-content: center;
									-webkit-box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
									-moz-box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
									box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
									outline: none;
									border: none;
									font-family: 'poppins', 'arial';
									font-size: 17px;
									padding-left: 20px;
									color: #00A2FF;
									font-weight: 600;
								}

								#searchBarSubmit {
								  display: block;
									background: transparent;
									outline: none;
									border: none;
									position: absolute;
									top: 10px;
									right: 10px;
									cursor: pointer;
								}

								#searchBarSubmit img{
								  height: 30px;
								  width: 30px;
								}
								</style>

								<form autocomplete="off" method="POST">
								    <div id="searchBarBox">
								      <input type="text" name="searchBar" id="searchBar" placeholder="nom de salle" autocomplete="off" autocapitalize="off" maxlength="15" minlength="3">
								      <button type="submit" id="searchBarSubmit"><img src="images/search.png"></button>
								    </div>
								</form>
							<?php } else {
							include("autocomplete.php");
							} ?>
	</header>



	<body>


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
					} ?>


					<p id="erreurEntree">
						<?php if (isset($result) AND $erreurEntree == true) {
							echo "aucune salle trouvée";
						}
					?></p>
					</div>

					<?php
					if (isset($_POST['buttonEtage'])) {
						$etageActuel = 1;
					}
					elseif (isset($_POST['buttonRdc'])) {
						$etageActuel = 0;
					}
					?>

				<div id="indicationEtageBox">
					<div id="indicationEtage" onclick="choixEtage()">
						<?php if ($etageActuel == 1){
							echo "1er étage";
						} else {
							echo "rez de chaussée";
						} ?>
						
						<img src="images/arrow.png">
					</div>

					<form id="choixEtage" method="POST">
							<button class="choixEtageButton" name="buttonEtage">> 1er étage</button>
							<div id="ligneSeparation"></div>
							<button class="choixEtageButton" name="buttonRdc">> rez de chaussée</button>
					</form>
				</div>

					<script type="text/javascript">
						function choixEtage() {
							if (document.getElementById('choixEtage').style.display == 'flex') {
								document.getElementById('choixEtage').style.display = 'none';
								document.getElementById('indicationEtage').style.borderRadius = '50px';
							} else {
								document.getElementById('choixEtage').style.display = 'flex';
								document.getElementById('indicationEtage').style.borderRadius = '50px 0px 0px 50px';
							}
						}
					</script>

			<?php
					if ($etageActuel == 1) { ?>
						<div class="mapContainer">
							<img src="images/planEtage1.jpg">
						</div>
					<?php }
					else{ ?>
						<div class="mapContainer">
							<img src="images/planEtage0.jpg">
						</div>
					<?php } ?>


			<?php 
		if (isset($_SESSION['salles'])) {
			if ($_SESSION['salles'] == true) {
			?>

				<div class="mapContainer">
					<div id="salles0Box">
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
							<?php } ?>


							<p class="special" id="cdi">CDI</p>

							<p class="special" id="cafétaria">cafétaria</p>

							<p class="special" id="infirmerie">infirmerie</p>

						<?php } ?>
					</div>
					<div id="salles1Box">
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
							<?php } ?>


							<p class="special" id="cpe1">CPE</p>

							<p class="special" id="cpe2">CPE</p>

						<?php } } ?>
					</div>
				</div>

			<?php } ?>


				<?php
				if (isset($_SESSION['escaliers'])) {
					if ($_SESSION['escaliers'] == true) { 
						if ($etageActuel == 0) { ?>
							<div class="mapContainer">
								<img src="images/layerStairsType1.jpg" id="layerStairs1">
								<img src="images/layerStairsType1.jpg" id="layerStairs2">
								<img src="images/layerStairsType2.jpg" id="layerStairs3">
								<img src="images/layerStairsType1.jpg" id="layerStairs4">
								<img src="images/layerStairsType2.jpg" id="layerStairs5">
								<img src="images/layerStairsType2.jpg" id="layerStairs6">
							</div>
						<?php } elseif ($etageActuel == 1) { ?>
							<div class="mapContainer">
								<img src="images/layerStairsType1.jpg" id="layerStairs7">
								<img src="images/layerStairsType1.jpg" id="layerStairs8">
								<img src="images/layerStairsType1.jpg" id="layerStairs9">
								<img src="images/layerStairsType1.jpg" id="layerStairs10">
								<img src="images/layerStairsType2.jpg" id="layerStairs11">
								<img src="images/layerStairsType2.jpg" id="layerStairs12">
							</div>
					<?php } } } ?>

				<?php
				if (isset($_SESSION['toilettes'])) {
					if ($_SESSION['toilettes'] == true) { 
						if ($etageActuel == 0) { ?>
							<div class="mapContainer">
								<img src="images/layerToilet1.png" id="layerToilet1">
								<img src="images/layerToilet2.png" id="layerToilet2">
								<img src="images/layerToilet3.png" id="layerToilet3">
							</div>
						<?php } elseif ($etageActuel == 1) { ?>
							<div class="mapContainer">
								<img src="images/layerToilet4.png" id="layerToilet4">
								<img src="images/layerToilet5.png" id="layerToilet5">
							</div>
					<?php } } } ?>
	</body>


	<?php
	if (isset($_POST['layer1']) AND $_POST['layer1'] == 'true') {
	?>
	<style type="text/css">
		#layersChoiceBox{
			display: flex;
		}
	</style>
	<script type="text/javascript">
		layersMenu = 1;
	</script>
	<?php
} ?>

	<?php
	if (isset($_POST['layer2']) AND $_POST['layer2'] == 'true') {
	?>
	<style type="text/css">
		#layersChoiceBox{
			display: flex;
		}
	</style>
	<script type="text/javascript">
		layersMenu = 1;
	</script>
	<?php
} ?>

<?php
	if (isset($_POST['layer3']) AND $_POST['layer3'] == 'true') {
	?>
	<style type="text/css">
		#layersChoiceBox{
			display: flex;
		}
	</style>
	<script type="text/javascript">
		layersMenu = 1;
	</script>
	<?php
} ?>


	<?php
	if (isset($_POST['setting1']) AND $_POST['setting1'] == 'true') {
	?>
	<style type="text/css">
		#settingsBox{
			display: flex;
		}
	</style>
	<script type="text/javascript">
		settingsMenu = 1;
	</script>
	<?php
} ?>

</html>
