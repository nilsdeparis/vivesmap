<?php

session_start();

/*if (!isset($_SESSION['escaliers'])) {
	$_SESSION['escaliers'] = false;
}*/

if (!isset($_SESSION['salles'])) {
	$_SESSION['salles'] = true;
}

/*if (!isset($_SESSION['toilettes'])) {
	$_SESSION['toilettes'] = false;
}*/

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
			<div class="btn" id="settingsBtn" onclick="menuDisplay('settingsBox')"><img src="images/settings.png" /></div>
			<!--<div class="btn" id="layersBtn" onclick="menuDisplay('layersChoiceBox')"><img src="images/layers.png" /></div>-->
		</div>
			


		<div id="layersChoiceBox">
			<div id="head">
				<p>Filtres<p>
			</div>
			<div id="body">
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
						<img src="images/legalMentions.png" class="imgBox">
						<p>Mentions Légales</p>
					</a>
					<div class="separation"></div>
					<a href="https://github.com/nilsdeparis/vivesmap" target="_blank" class="liensBtn">
						<img src="images/sourceCode.png" class="imgBox">
						<p>Code Source</p>
					</a>
					<div class="separation"></div>
					<a href="mailto:ndg.gaming.yt@gmail.com" class="liensBtn">
						<img src="images/contact.png" class="imgBox">
						<p>Contact Développeur</p>
					</a>
				</div>
				<div class="separation"></div>
				<img id="logoVivesMap" src="images/logo_site.png" width="150px">
				
				
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
								  padding: 0;
								  position: relative;
								  border-radius: 20px;

								}

								#searchBar {
								  height: 50px;
									width: 240px;
									background: white;
									border-radius: 50px;
									display: flex;
									align-items: center;
									justify-content: center;
									-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
									-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
									box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
									outline: none;
									border: 1px solid #DEDEDE;
									font-family: 'poppins', 'arial';
									font-size: 17px;
								  padding: 0;
									padding-left: 20px;
									color: #00aeff;
									font-weight: 600;
								}

								#searchBarSubmit {
								  position: absolute;
								  display: flex;
								  align-items: center;
								  justify-content: center;
								  top: 0;
								  right: 0;
								  height: 100%;
								  width: 50px;
									background: #F1F1F1;
									outline: none;
									border: 1px solid #DEDEDE;
									position: absolute;
									cursor: pointer;
								  border-radius: 0px 50px 50px 0px;
								}

								#searchBarSubmit img{
								  height: 25px;
								  width: 25px;
								  margin-left: -2px;
								}
								</style>

								<form autocomplete="off" method="POST">
								    <div id="searchBarBox">
								      <input type="text" name="searchBar" id="searchBar" placeholder="Nom de salle" autocomplete="off" autocapitalize="off" maxlength="15" minlength="3" required />
								      <button type="submit" id="searchBarSubmit" name="searchBarSubmit"><img src="images/search.png" /></button>
								    </div>
								</form>
							<?php } else {
							include("autocomplete.php");
							} ?>
	</header>
	<script type="text/javascript">
		// Get the input field
		var input = document.getElementById("searchBar");

		// Execute a function when the user releases a key on the keyboard
		input.addEventListener("keyup", function(event) {
		  // Number 13 is the "Enter" key on the keyboard
		  if (event.keyCode === 13) {
		    // Cancel the default action, if needed
		    event.preventDefault();
		    // Trigger the button element with a click
		    document.getElementById("searchBarSubmit").click();
		  }
		});
	</script>


	<body>


<?php
				//Version
					$version = "bêta 0.2";

				//Tableaux contenat salles par étage
					$salles_rdc = array('flaubert','eiffel','daumier','colette','voltaire','tchekov','sand','rimbaud','quesnay','planck','ohm','mozart','marconi','newton','laplace','kepler','isabey','jacquard','gay-lussac','harvey','fleming','einstein','darwin','boole','becquerel','ampère','cuvier','pasteur','de-gennes','bach');

					$salles_etage = array('molière','kipling','ibsen','nabokov','lamartine','jussieu','hérodote','froissart','dumas','baudelaire','apollinaire','chenier','euripide','giraudoux','kafka','nerval','leibniz','joinville','ingres','hugo','galilée','fermat','erasme','dante','copernic','budé','avicenne','stendhal','pascal','cervantes');

				//Creation etat de base des variables
					$etageActuel = 0;
					$result = null;
					$search = false;
					$bullesSalles = true;
					$erreurEntree = false;

				//conditions pour gérer la barre de recherche
					if (isset($_POST['searchBar']) AND !empty($_POST['searchBar'])) {
						$_POST['searchBar'] = htmlspecialchars($_POST['searchBar']);
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


					<?php if (isset($result) AND $erreurEntree == true) { ?>
							<div id="erreurEntree">
								<p>Aucune salle trouvée</p>
								<img src="images/close.png" onclick="closeErreurEntree()">
							</div>
						<?php } ?>

					<script type="text/javascript">
						function closeErreurEntree() {
							document.getElementById('erreurEntree').style.display = 'none';
						}
					</script>

					<?php
					if (isset($_POST['buttonEtage'])) {
						$etageActuel = 1;
					}
					elseif (isset($_POST['buttonRdc'])) {
						$etageActuel = 0;
					}
					?>

				<div id="indicationEtage" onclick="openPopupChoixEtage()">
					<?php if ($etageActuel == 1){
						echo "1er étage"; ?>
						<style type="text/css">
							#choixEtage #CEBOne{
								color: #00A5FF;
							}
							#choixEtage #CEBZero{
								color: black;
							}
						</style>
					<?php } else {
						echo "rez de chaussée"; ?>
						<style type="text/css">
							#choixEtage #CEBZero{
								color: #00A5FF;
							}
							#choixEtage #CEBOne{
								color: black;
							}
						</style>
					<?php } ?>
					
					<img src="images/arrow.png">
				</div>

				<div id="etagePopupBackground">
					<form id="choixEtage" method="POST">
						<img class="closePopupBtn" height="20px;" onclick="closePopupChoixEtage()" src="images/close.png">
							<button class="choixEtageButton" id="CEBOne" name="buttonEtage"><img src="images/right-arrow.png" width="30px"> 1er étage</button>
							<div id="ligneSeparation"></div>
							<button class="choixEtageButton" id="CEBZero" name="buttonRdc"><img src="images/right-arrow.png" width="30px"> rez de chaussée</button>
					</form>
				</div>

					<script type="text/javascript">
						function openPopupChoixEtage() {
							document.getElementById('etagePopupBackground').style.display = 'flex';
						}
						function closePopupChoixEtage() {
							document.getElementById('etagePopupBackground').style.display = 'none';
						}
					</script>

			<?php
					if ($etageActuel == 1) { ?>
						<div class="mapContainer" id="etage">
							<img src="images/etage3d.jpg">
						</div>
					<?php }
					else{ ?>
						<div class="mapContainer" id="rdc">
							<img src="images/rdc3d.jpg">
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
								<p class="focused" id="flaubert">Flaubert</p>
							<?php } else { ?>
								<p class="salle" id="flaubert">Flaubert</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'eiffel') { ?>
								<p class="focused" id="eiffel">Eiffel</p>
							<?php } else { ?>
								<p class="salle" id="eiffel">Eiffel</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'daumier') { ?>
								<p class="focused" id="daumier">Daumier</p>
							<?php } else { ?>
								<p class="salle" id="daumier">Daumier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'colette') { ?>
								<p class="focused" id="colette">Colette</p>
							<?php } else { ?>
								<p class="salle" id="colette">Colette</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'voltaire') { ?>
								<p class="focused" id="voltaire">Voltaire</p>
							<?php } else { ?>
								<p class="salle" id="voltaire">Voltaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'tchekov') { ?>
								<p class="focused" id="tchekov">Tchekov</p>
							<?php } else { ?>
								<p class="salle" id="tchekov">Tchekov</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'sand') { ?>
								<p class="focused" id="sand">Sand</p>
							<?php } else { ?>
								<p class="salle" id="sand">Sand</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'rimbaud') { ?>
								<p class="focused" id="rimbaud">Rimbaud</p>
							<?php } else { ?>
								<p class="salle" id="rimbaud">Rimbaud</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'quesnay') { ?>
								<p class="focused" id="quesnay">Quesnay</p>
							<?php } else { ?>
								<p class="salle" id="quesnay">Quesnay</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'planck') { ?>
								<p class="focused" id="planck">Planck</p>
							<?php } else { ?>
								<p class="salle" id="planck">Planck</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ohm') { ?>
								<p class="focused" id="ohm">Ohm</p>
							<?php } else { ?>
								<p class="salle" id="ohm">Ohm</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'mozart') { ?>
								<p class="focused" id="mozart">Mozart</p>
							<?php } else { ?>
								<p class="salle" id="mozart">Mozart</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'marconi') { ?>
								<p class="focused" id="marconi">Marconi</p>
							<?php } else { ?>
								<p class="salle" id="marconi">Marconi</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'newton') { ?>
								<p class="focused" id="newton">Newton</p>
							<?php } else { ?>
								<p class="salle" id="newton">Newton</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'laplace') { ?>
								<p class="focused" id="laplace">Laplace</p>
							<?php } else { ?>
								<p class="salle" id="laplace">Laplace</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kepler') { ?>
								<p class="focused" id="kepler">Kepler</p>
							<?php } else { ?>
								<p class="salle" id="kepler">Kepler</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'isabey') { ?>
								<p class="focused" id="isabey">Isabey</p>
							<?php } else { ?>
								<p class="salle" id="isabey">Isabey</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'jacquard') { ?>
								<p class="focused" id="jacquard">Jacquard</p>
							<?php } else { ?>
								<p class="salle" id="jacquard">Jacquard</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'gay-lussac') { ?>
								<p class="focused" id="gay-lussac">Gay-lussac</p>
							<?php } else { ?>
								<p class="salle" id="gay-lussac">Gay-lussac</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'harvey') { ?>
								<p class="focused" id="harvey">Harvey</p>
							<?php } else { ?>
								<p class="salle" id="harvey">Harvey</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'fleming') { ?>
								<p class="focused" id="fleming">Fleming</p>
							<?php } else { ?>
								<p class="salle" id="fleming">Fleming</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'einstein') { ?>
								<p class="focused" id="einstein">Einstein</p>
							<?php } else { ?>
								<p class="salle" id="einstein">Einstein</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'darwin') { ?>
								<p class="focused" id="darwin">Darwin</p>
							<?php } else { ?>
								<p class="salle" id="darwin">Darwin</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'boole') { ?>
								<p class="focused" id="boole">Boole</p>
							<?php } else { ?>
								<p class="salle" id="boole">Boole</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'becquerel') { ?>
								<p class="focused" id="becquerel">Becquerel</p>
							<?php } else { ?>
								<p class="salle" id="becquerel">Becquerel</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ampère') { ?>
								<p class="focused" id="ampère">Ampère</p>
							<?php } else { ?>
								<p class="salle" id="ampère">Ampère</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'cuvier') { ?>
								<p class="focused" id="cuvier">Cuvier</p>
							<?php } else { ?>
								<p class="salle" id="cuvier">Cuvier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'pasteur') { ?>
								<p class="focused" id="pasteur">Pasteur</p>
							<?php } else { ?>
								<p class="salle" id="pasteur">Pasteur</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'de-gennes') { ?>
								<p class="focused" id="de-gennes">De-gennes</p>
							<?php } else { ?>
								<p class="salle" id="de-gennes">De-gennes</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'bach') { ?>
								<p class="focused" id="bach">Bach</p>
							<?php } else { ?>
								<p class="salle" id="bach">Bach</p>
							<?php } ?>


							<p class="special" id="cdi">CDI</p>

							<p class="special" id="cafetaria">cafetaria</p>

							<p class="special" id="infirmerie">infirmerie</p>

						<?php } ?>
					</div>
					<div id="salles1Box">
				<?php 
					if ($etageActuel == 1) { ?>

							<?php if ($search == true AND $result == 'molière') { ?>
								<p class="focused" id="molière">Molière</p>
							<?php } else { ?>
								<p class="salle" id="molière">Molière</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kipling') { ?>
								<p class="focused" id="kipling">Kipling</p>
							<?php } else { ?>
								<p class="salle" id="kipling">Kipling</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'ibsen') { ?>
								<p class="focused" id="ibsen">Ibsen</p>
							<?php } else { ?>
								<p class="salle" id="ibsen">Ibsen</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'nabokov') { ?>
								<p class="focused" id="nabokov">Nabokov</p>
							<?php } else { ?>
								<p class="salle" id="nabokov">Nabokov</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'lamartine') { ?>
								<p class="focused" id="lamartine">Lamartine</p>
							<?php } else { ?>
								<p class="salle" id="lamartine">Lamartine</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'jussieu') { ?>
								<p class="focused" id="jussieu">Jussieu</p>
							<?php } else { ?>
								<p class="salle" id="jussieu">Jussieu</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'hérodote') { ?>
								<p class="focused" id="hérodote">Hérodote</p>
							<?php } else { ?>
								<p class="salle" id="hérodote">Hérodote</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'froissart') { ?>
								<p class="focused" id="froissart">Froissart</p>
							<?php } else { ?>
								<p class="salle" id="froissart">Froissart</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'dumas') { ?>
								<p class="focused" id="dumas">Dumas</p>
							<?php } else { ?>
								<p class="salle" id="dumas">Dumas</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'baudelaire') { ?>
								<p class="focused" id="baudelaire">Baudelaire</p>
							<?php } else { ?>
								<p class="salle" id="baudelaire">Baudelaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'apollinaire') { ?>
								<p class="focused" id="apollinaire">Apollinaire</p>
							<?php } else { ?>
								<p class="salle" id="apollinaire">Apollinaire</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'chenier') { ?>
								<p class="focused" id="chenier">Chenier</p>
							<?php } else { ?>
								<p class="salle" id="chenier">Chenier</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'euripide') { ?>
								<p class="focused" id="euripide">Euripide</p>
							<?php } else { ?>
								<p class="salle" id="euripide">Euripide</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'giraudoux') { ?>
								<p class="focused" id="giraudoux">Giraudoux</p>
							<?php } else { ?>
								<p class="salle" id="giraudoux">Giraudoux</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'kafka') { ?>
								<p class="focused" id="kafka">Kafka</p>
							<?php } else { ?>
								<p class="salle" id="kafka">Kafka</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'nerval') { ?>
								<p class="focused" id="nerval">Nerval</p>
							<?php } else { ?>
								<p class="salle" id=nerval>Nerval</p>
							<?php }?>

							<?php if ($search == true AND $result == 'leibniz') { ?>
								<p class="focused" id="leibniz">Leibniz</p>
							<?php } else { ?>
								<p class="salle" id="leibniz">Leibniz</p>
							<?php }?>

							<?php if ($search == true AND $result == 'joinville') { ?>
								<p class="focused" id="joinville">Joinville</p>
							<?php } else { ?>
								<p class="salle" id="joinville">Joinville</p>
							<?php }?>

							<?php if ($search == true AND $result == 'ingres') { ?>
								<p class="focused" id="ingres">Ingres</p>
							<?php } else { ?>
								<p class="salle" id="ingres">Ingres</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'hugo') { ?>
								<p class="focused" id="hugo">Hugo</p>
							<?php } else { ?>
								<p class="salle" id="hugo">Hugo</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'galilée') { ?>
								<p class="focused" id="galilée">Galilée</p>
							<?php } else { ?>
								<p class="salle" id="galilée">Galilée</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'fermat') { ?>
								<p class="focused" id="fermat">Fermat</p>
							<?php } else { ?>
								<p class="salle" id="fermat">Fermat</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'erasme') { ?>
								<p class="focused" id="erasme">Erasme</p>
							<?php } else { ?>
								<p class="salle" id="erasme">Erasme</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'dante') { ?>
								<p class="focused" id="dante">Dante</p>
							<?php } else { ?>
								<p class="salle" id="dante">Dante</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'copernic') { ?>
								<p class="focused" id="copernic">Copernic</p>
							<?php } else { ?>
								<p class="salle" id="copernic">Copernic</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'budé') { ?>
								<p class="focused" id="budé">Budé</p>
							<?php } else { ?>
								<p class="salle" id="budé">Budé</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'avicenne') { ?>
								<p class="focused" id="avicenne">Avicenne</p>
							<?php } else { ?>
								<p class="salle" id="avicenne">Avicenne</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'stendhal') { ?>
								<p class="focused" id="stendhal">Stendhal</p>
							<?php } else { ?>
								<p class="salle" id="stendhal">Stendhal</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'pascal') { ?>
								<p class="focused" id="pascal">Pascal</p>
							<?php } else { ?>
								<p class="salle" id="pascal">Pascal</p>
							<?php } ?>

							<?php if ($search == true AND $result == 'cervantes') { ?>
								<p class="focused" id="cervantes">Cervantes</p>
							<?php } else { ?>
								<p class="salle" id="cervantes">Cervantes</p>
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