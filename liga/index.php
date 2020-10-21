<?php
	require_once('../inc/dbconnect.php');
	session_start();

	include('verein/php/class.php');
	
	require_once('../inc/global.php');

	
	$ligaId = $_GET['liga']??0;
	$userId = $_SESSION['userId']??0;
	$darfBearbeiten = istMeineLiga($db, $userId, $ligaId) || (isset($_SESSION['status']) && $_SESSION['status'] == 'admin');

	function zeigenEigeneLigen($db) {
		if (isset($_SESSION['userId'])) {
			$userid = $_SESSION['userId'];
			$abfrage = "SELECT * FROM ligen WHERE erstelltVon = '$userid'";
			$abfragen = mysqli_query($db, $abfrage);
			if ($abfragen->num_rows > 0) {
				echo '<h1>Hier ist ein Überblick zu deinen Ligen:</h1>';
				while ($abfragen && $row = mysqli_fetch_object($abfragen)) {
					$ligaId = $row->ligaId;
					$name = $row->name;
					$beschreibung = $row->beschreibung;
					$logo = $row->logo;
?>

					<a href="?liga=<?=$ligaId?>" class="liga_block_klein" title="<?=$name?>">
						<img src="../img/ligen/<?=$logo?>">
						<div class="liga_info_klein">
							<h1><?=$name?></h1>
							<span><?=$beschreibung?></span>
						</div>
					</a>
<?php
				}
			} else {
					echo '<p>Verwende die Suche oder <a href="erstellen.php">erstelle</a> eine Liga.</p>';
			}
		} else {
			echo '<p><a href="../profil/login.php">Melde dich an</a>, um deine Ligen zu sehen. Oder nutze die Suche.</p>';
		}
	}

	function getVereineFuerSelect($db, $ligaId) {
		$abfrage = "SELECT vereine.vereinsId, vereine.name
					FROM vereine, `liga-verein`
					WHERE `liga-verein`.ligaId = '$ligaId'
					AND `liga-verein`.vereinsId = vereine.vereinsId";
		$abfragen = mysqli_query($db, $abfrage);
		while ($row = mysqli_fetch_object($abfragen)){
			$vereinsId = $row->vereinsId;
			$name = $row->name;
			echo "<option value=\"$vereinsId\">$name</option>";
		}
	}

	function getVereineFuerLiga($db, $ligaId) {
		$abfrage = "SELECT vereine.vereinsId, vereine.name, vereine.beschreibung, vereine.logo, vereine.erstelltVon
					FROM vereine, `liga-verein`
					WHERE `liga-verein`.ligaId = '$ligaId'
					AND `liga-verein`.vereinsId = vereine.vereinsId";
		$abfragen = mysqli_query($db, $abfrage);
		$vereine = [];
		while ($row = mysqli_fetch_object($abfragen)){
			array_push($vereine, new Verein($row, $ligaId, $db));
		}
		return $vereine;
	}

	function getPageTitle($db) {
		$title = "Übersicht zu deinen Ligen";
		if (isset($_GET['liga'])) {
			$ligaId = $_GET['liga'];
			$abfrage = mysqli_query($db, "SELECT name FROM ligen WHERE ligaId = '$ligaId'");
			if ($liga = mysqli_fetch_object($abfrage)) {
				$title = $liga->name;
			}
		}
		return $title;
	}
?>
<!doctype html>
<html lang="de">
	<head>
		<title><?=getPageTitle($db)?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/liga.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/ligatabelle/js/liga.js" type="text/javascript"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
				if (isset($_GET['error'])) {
					echo '<p class="error">'.$_GET['error'].'</p>';
				}
				if (isset($_GET['liga']) && is_numeric($_GET['liga'])) {					
					$abfrage = "SELECT ligen.name, ligen.beschreibung, ligen.logo, ligen.erstelltVon, user.username 
								FROM ligen, user
								WHERE ligaId = '$ligaId' AND erstelltVon = userId";
					$abfragen = mysqli_query($db, $abfrage);
					if ($abfragen && $row=mysqli_fetch_object($abfragen)) {
						$ligaAnzeigen = true;
						$name = $row->name;
						$beschreibung = $row->beschreibung;
						$logo = $row->logo;
						$erstelltVon = $row->erstelltVon;
						$ersteller = $row->username;
			?>
			
						<div class="liga_block">
							<img src="../img/ligen/<?=$logo?>">
							<div class="liga_info">
								<span class="h1">
									<?=$name?>
									<?php if ($darfBearbeiten) { ?>
										<a href="bearbeiten.php?liga=<?=$ligaId?>"><img src="/ligatabelle/img/bearbeiten.png" class="img_btn"></a>
										<a href="php/loeschen.php?liga=<?=$ligaId?>"><img src="/ligatabelle/img/loeschen.png" class="img_btn"></a>
									<?php } ?>
								</span>
								<span class="ersteller">Erstellt von <a href="../profil/index.php?id=<?=$erstelltVon?>"><?=$ersteller?></a></span>
								<span><?=$beschreibung?></span>
							</div>
						</div>
						<table id="tabelle">
							<thead>
								<tr class="desktop-only">
									<th></th>
									<th></th>
									<th>Verein</th>
									<th>Spiele</th>
									<th>Punkte</th>
									<th>Tore</th>
									<th>geg Tore</th>
									<th>Tor diff</th>
								</tr>
								<tr class="mobil-only">
									<th></th>
									<th></th>
									<th>Verein</th>
									<th title="Spiele">Sp.</th>
									<th title="Punkte">P.</th>
									<th title="Tore">T.</th>
									<th title="Tordifferenz">T.D.</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$vereine = getVereineFuerLiga($db, $ligaId);
									usort($vereine, array('Verein', 'sort'));
									for ($i=1; $i<=count($vereine); $i++) {
										echo "<tr>";
										echo "	<td>$i</td>";
										$vereine[$i-1]->getTDs();
										echo "</tr>";
									}
								?>
							</tbody>
						</table>


			<?php
					} else {
						zeigenEigeneLigen($db);
					}
			?>

			<?php
				} else {
					zeigenEigeneLigen($db);
				}
				?>
		</div>
		<aside>
			<div id="erstellerTools">
							
			<?php
				if (isset($ligaAnzeigen) && $ligaAnzeigen) {
					if ($darfBearbeiten) {
			?>
						<h2>Ersteller Tools:</h2>
						<div class="buttons">
							<a href="javascript:void(0)" onclick="$('#neuenSpieltag').css('display', 'block')" class="btn" titel="Erstelle einen neunen Spieltag"><img src="../img/bearbeiten.png" class="img_btn">Neuer Spieltag</a>
							<a href="javascript:void(0)" onclick="$('#neuesSpiel').css('display', 'block')" class="btn" titel="Erstelle einen neues Spiel"><img src="../img/bearbeiten.png" class="img_btn">Neues Spiel</a>
						</div>
						<div class="buttons">
							<a href="javascript:void(0)" onclick="$('#neueSpieltageUndSpiele').css('display', 'block')" class="btn" titel="Generiere alle Spieltage und Spiele"><img src="../img/bearbeiten.png" class="img_btn">Generiere alle Spieltage und Spiele</a>
						</div>
			<?php
					}
			?>
						<div class="buttons">
							<a href="verein/alle.php?liga=<?=$ligaId?>" class="btn" titel="Alle Vereine der Liga"><img src="/ligatabelle/img/auge.png" class="img_btn">Vereine</a>
							<a href="spieltag/alle.php?liga=<?=$ligaId?>" class="btn" titel="Alle Spieltage mit Spielen der Liga"><img src="/ligatabelle/img/auge.png" class="img_btn">Spieltage und Spiele</a>
						</div>
					</div>
			<?php
				}
			?>

			<!-- Popups -->
			<div id="neuenSpieltag" class="popup_background" style="display:none;">
				<div class="popup_content">
					<h1>Neuer Spieltag</h1>
					<p>Erstelle einen neuen Spieltag. Danach kannst du diesen Spieltag auswählen, wenn du neue Spiele erstellt.</p>
					<form action="spieltag/php/erstellen.php" method="POST">
						<input type="hidden" id="ligaId" name="ligaId" value="<?=$ligaId?>" required>
						<label for="von">Von:</label><input type="date" id="von" name="von" placeholder="Startdatum" required>
						<label for="bis">Bis:</label><input type="date" id="bis" name="bis" placeholder="Enddatum" required>
						<button name="submit">Erstellen</button>
						<a href="javascript:void(0)" onclick="$('#neuenSpieltag').css('display', 'none')" class="btn">Abbrechen</a>
					</form>
				</div>
			</div>

			<div id="neuesSpiel" class="popup_background" style="display:none;">
				<div class="popup_content">
					<h1>Neues Spiel</h1>
					<form action="spiel/php/erstellen.php" method="POST">
						<input type="hidden" id="ligaId" name="ligaId" value="<?=$ligaId?>" required>
						
						<label for="heimverein">Heimverein:</label>
						<select id="heimverein" name="heimverein">
							<option value="default">Heimverein</option>
							<?=getVereineFuerSelect($db, $ligaId)?>
						</select>

						<label for="auswaertsverein">Auswärtsverein:</label>
						<select id="auswaertsverein" name="auswaertsverein">
							<option value="default">Auswärtsverein</option>
							<?=getVereineFuerSelect($db, $ligaId)?>
						</select>

						<label for="spieltag">Spieltag:</label>
						<span>
							<select id="spieltag" name="spieltag" onchange="setDatum();">
								<option value="default" data-von="" data-bis="">Spieltag Wählen</option>
								<?php
									$abfrage = "SELECT spieltagId, von, bis FROM spieltage WHERE ligaId = $ligaId ORDER BY von";
									$abfragen = mysqli_query($db, $abfrage);
									$spieltag = 0;
									while ($abfragen && $row = mysqli_fetch_object($abfragen)) {
										$spieltag++;
										$spieltagId = $row->spieltagId;
										$von = $row->von;
										$bis = $row->bis;
										echo "<option value=\"$spieltagId\" data-von=\"$von\" data-bis=\"$bis\">Spieltag $spieltag</option>";
									}
									echo "</select>";
									if (mysqli_num_rows($abfragen) == 0) {
										echo "<span>Du hast noch keinen Spieltag erstellt</span>";
									}
								?>
								<span id="selecedDatum"></span>
						</span>
						<label for="date">Datum:</label>
						<select id="date" name="date" required></select>
						<label for="time">Uhrzeit:</label>
						<input type="time" id="time" name="time" required>
						<button name="submit">Erstellen</button>
						<a href="javascript:void(0)" onclick="$('#neuesSpiel').css('display', 'none')" class="btn">Abbrechen</a>
					</form>
				</div>
			</div>

			<div id="neueSpieltageUndSpiele" class="popup_background" style="display:none;">
				<div class="popup_content">
					<h1>Trage die Daten der Spieltage ein</h1>
					<p>Anhand der Anzahl der Vereine werden alle Spieltage erstellt. Diesen musst du allerdings noch Daten zuordnen, da die Namensgebung der Spieltag von den Startdaten der Spieltage abhängig ist. <br>
					Die erste Hälfte der Spieltage ist die Hinrunde. In dieser Runde spielt jeder Verein einmal gegen jeden anderen. Die zweite Hälfte der Spieltage ist die Rückrunde. Dort spielt erneut jeder Verein gegen jeden anderen, nur mit vertauschtem Heimrecht. </p>
					<p><span class="warnung">Achtung:</span><br>
					Durch das austomatische Erstellen aller Spiele werden alle bis jetzt von dir erstellten Spieltage und Spiele gelöscht.</p>
					<form action="php/generierung.php" method="POST">
						<input type="hidden" id="ligaId" name="ligaId" value="<?=$ligaId?>" required>
						<?php
							$vereine = getVereineFuerLiga($db, $ligaId);
							$anzahlVereine = (count($vereine)%2 == 0 ? count($vereine) : count($vereine)+1);
							$anzahlSpieltage = $anzahlVereine * ($anzahlVereine-1) / ($anzahlVereine/2);
							for ($i=1; $i<=$anzahlSpieltage; $i++) {
						?>
						<div>
							<label>Spieltag <?=$i?>:</label>
							<input type="date" name="von[]" required>
							<input type="date" name="bis[]" required>
						</div>
						<?php
							}
						?>
						<button name="submit">Spiele Generieren</button>
						<a href="javascript:void(0)" onclick="$('#neueSpieltageUndSpiele').css('display', 'none')" class="btn">Abbrechen</a>
					</form>
				</div>
			</div>

		</aside>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
