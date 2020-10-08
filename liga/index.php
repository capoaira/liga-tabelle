<?php
	require_once('../inc/dbconnect.php');
	session_start();
	
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
			echo '<p><a href="../login.php">Melde dich an</a>, um deine Ligen zu sehen. Oder nutze die Suche.</p>';
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
		<link rel="stylesheet" href="/ligatabelle/css/home.css">
		<link rel="stylesheet" href="/ligatabelle/css/liga.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
			<?php
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
			<?php
				if (isset($ligaAnzeigen) && $ligaAnzeigen) {
					if ($istMeineLiga) {
			?>
						<div id="erstellerTools">
							<h2>Ersteller Tools:</h2>
							<div class="buttons">
								<a class="btn" titel="Erstelle einen neunen Spieltag"><img src="../img/bearbeiten.png" class="img_btn"> Neuer Spieltag</a>
								<a class="btn" titel="Erstelle einen neues Spiel"><img src="../img/bearbeiten.png" class="img_btn"> Neuer Spiel</a>
							</div>
						</div>
			<?php
					}
			?>
					<div id="letzteSpiele">
						<h2>Letzte Spiele:</h2>
					</div>
			<?php
				}
			?>
		</aside>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
