<?php
	require_once('../inc/dbconnect.php');
	session_start();
	
	require_once('../inc/global.php');

	function zeigenEigeneLigen($db) {
		if (isset($_SESSION['userId'])) {
			$userid = $_SESSION['userId'];
			$abfrage = "SELECT * FROM ligen WHERE erstelltVon = '$userid'";
			$abfragen = mysqli_query($db, $abfrage);
			if ($abfragen) {
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
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Liga</title>
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
					$ligaId = $_GET['liga'];
					
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
						$istMeineLiga = isset($_SESSION['userId']) && $erstelltVon == $_SESSION['userId'];
						$ersteller = $row->username;
			?>
			
						<div class="liga_block">
							<img src="../img/ligen/<?=$logo?>">
							<div class="liga_info">
								<h1><?=$name?></h1>
								<span class="ersteller">Erstellt von <a href="../profil/index.php?id=<?=$erstelltVon?>"><?=$ersteller?></a></span>
								<span><?=$beschreibung?></span>
							</div>
						</div>
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
					if ($istMeineLiga) {
			?>
						<h2>Ersteller Tools:</h2>
						<div class="buttons">
							<a href="javascript:void(0)" onclick="$('#neuenSpieltag').css('display', 'block')" class="btn" titel="Erstelle einen neunen Spieltag"><img src="../img/bearbeiten.png" class="img_btn">Neuer Spieltag</a>
							<a href="javascript:void(0)" onclick="$('#neuesSpiel').css('display', 'block')" class="btn" titel="Erstelle einen neues Spiel"><img src="../img/bearbeiten.png" class="img_btn">Neues Spiel</a>
						</div>
			<?php
					}
			?>
						<div class="buttons">
							<a href="verein/alle.php?liga=<?=$ligaId?>" class="btn" titel="Alle Vereine der Liga"><img src="" class="img_btn">Vereine</a>
							<a href="spieltag/alle.php?liga=<?=$ligaId?>" class="btn" titel="Alle Spieltage mit Spielen der Liga"><img src="" class="img_btn">Spieltage und Spiele</a>
						</div>
					</div>
					<div id="letzterSpieltag">
						<h2>Letzter Spieltag:</h2>
					</div>
			<?php
				}
			?>

			<!-- Popups: Neuer Spieltag und Neues Spiel -->
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

		</aside>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
