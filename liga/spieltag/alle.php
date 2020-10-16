<?php
	require_once('../../inc/dbconnect.php');
	session_start();
	
	require_once('../../inc/global.php');
	
	$ligaId = $_GET['liga'];
	$userId = $_SESSION['userId'];
	$darfBearbeiten = istMeineLiga($db, $userId, $ligaId) || $_SESSION['status'] == 'admin';
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/spieltage.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="/ligatabelle/js/spieltag-bearbeiten.js" type="text/javascript"></script>
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../../inc/header.php') ?>
		<div id="content">
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
				if (isset($_GET['error'])) {
					echo '<p class="error">'.$_GET['error'].'</p>';
				}
				$abfrageSpieltage = mysqli_query($db,"SELECT * FROM spieltage WHERE ligaId = $ligaId ORDER BY von");
				$spieltag = 0;
				while ($abfrageSpieltage && $row = mysqli_fetch_object($abfrageSpieltage)) {
					$spieltag++;
					$spieltagId = $row->spieltagId;
					$von = $row->von;
					$bis = $row->bis;
					echo "<div data-id=\"$spieltagId\" class=\"spieltag\">";
					echo "<div class=\"spieltag_info\"><h1>Spieltag $spieltag</h1> von <span id=\"$von\">$von</span> - <span id=\"$bis\">$bis</span></span>";
					echo ($darfBearbeiten ?
						 '<a href="javascript:void(0)" onclick="openSpieltag(this)"><img src="/ligatabelle/img/bearbeiten.png" class="img_btn"></a>
						 <a href="php/loeschen.php?spieltag='.$spieltagId.'&liga='.$ligaId.'"><img src="/ligatabelle/img/loeschen.png" class="img_btn"></a>' : '').'</div>';
					$abfrageSpiele = mysqli_query($db, "SELECT * FROM spiele WHERE spieltagId = $spieltagId ORDER BY datum");
					while ($abfrageSpiele && $row=mysqli_fetch_object($abfrageSpiele)) {
						$heimVereinId = $row->heimVerein;
						$auswaertsVereinId = $row->auswaertsVerein;
						$abfrageHeimVerein = mysqli_query($db, "SELECT name, logo FROM vereine WHERE vereinsId = $heimVereinId");
						if ($heimVerein=mysqli_fetch_object($abfrageHeimVerein)) {
							$heimVereinName = $heimVerein->name;
							$heimVereinLogo = $heimVerein->logo;
						}
						$abfrageAuswaersVerein = mysqli_query($db,"SELECT name, logo FROM vereine WHERE vereinsId = $auswaertsVereinId");
						if ($auswaertsVerein=mysqli_fetch_object($abfrageAuswaersVerein)) {
							$auswaertsVereinName = $auswaertsVerein->name;
							$auswaertsVereinLogo = $auswaertsVerein->logo;
						}
			?>
					<div data-id="<?=$row->spielId?>" class="spiel">
						<span><?=$row->datum?></span>
						<div>
							<div class="spiel_info">
								<span>
									<img src="/ligatabelle/img/vereine/<?=$heimVereinLogo?>">
									<a href="../verein/index.php?verein=<?=$heimVereinId?>"><?=$heimVereinName?></a>
								</span>
								<span><?=($row->heimVereinTore < 0 ? '--' : $row->heimVereinTore)?> : <?=($row->auswaertsVereinTore < 0 ? '--' : $row->auswaertsVereinTore)?></span>
								<span>
									<a href="../verein/index.php?verein=<?=$auswaertsVereinId?>"><?=$auswaertsVereinName?></a>
									<img src="/ligatabelle/img/vereine/<?=$auswaertsVereinLogo?>">
								</span>
							</div>
						<?php if ($darfBearbeiten) {?>
							<div class="buttons">
								<a href="javascript:void(0)" onclick="openSpiel(this)"><img src="/ligatabelle/img/bearbeiten.png" class="img_btn"></a>
								<a href="../spiel/php/loeschen.php?spiel=<?=$row->spielId?>&liga=<?=$ligaId?>"><img src="/ligatabelle/img/loeschen.png" class="img_btn"></a>
							</div>
						<?php } ?>
						</div>
					</div>
			<?php
					}
					echo '</div>';
				}
			?>

			<!-- Popups: Spieltag und Spiel bearbeiten -->
			<div id="spieltagBearbeiten" class="popup_background" style="display:none;">
				<div class="popup_content">
					<h1>Spieltag Bearbeiten</h1>
					<p>Hier kannst du das Datum deines Spieltages anpassen.</p>
					<form action="php/bearbeiten.php" method="POST">
						<input type="hidden" id="ligaId" name="ligaId" value="<?=$ligaId?>" required>
						<input type="hidden" id="spieltagId" name="spieltagId" required>
						<label for="von">Von:</label><input type="date" id="von" name="von" required>
						<label for="bis">Bis:</label><input type="date" id="bis" name="bis" required>
						<button name="submit">Bearbeiten</button>
						<a href="javascript:void(0)" onclick="$('#spieltagBearbeiten').css('display', 'none')" class="btn">Abbrechen</a>
					</form>
				</div>
			</div>

			<div id="spielBearbeiten" class="popup_background" style="display:none;">
				<div class="popup_content">
					<h1>Spiel Bearbeiten</h1>
					<p>Hier kannst du die Spielergebnisse eintragen.</p>
					<form action="../spiel/php/bearbeiten.php" method="POST">
						<input type="hidden" id="ligaId" name="ligaId" value="<?=$ligaId?>" required>
						<input type="hidden" id="spielId" name="spielId" value="0" required>
						
						<label for="heimverein">Heimverein:</label>
						<input type="number" id="heimVereinTore" name="heimVereinTore" min="0" max="99" value="0">

						<label for="auswaertsverein">Auswärtsverein:</label>
						<input type="number" id="auswaertsVereinTore" name="auswaertsVereinTore" min="0" max="99" value="0">

						<button name="submit">Bearbeiten</button>
						<a href="javascript:void(0)" onclick="$('#spielBearbeiten').css('display', 'none')" class="btn">Abbrechen</a>
					</form>
				</div>
			</div>
		</div>
		<aside>
			
		</aside>
		<?php include_once('../../inc/footer.php') ?>
	</body>
</html>
