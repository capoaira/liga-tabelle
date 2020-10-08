<?php
	require_once('inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/home.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
			
		</div>
		<aside>
			<h1>Neuste Ligen:</h1>
			<?php
				$abfrage = "SELECT ligen.ligaId, ligen.name, ligen.beschreibung, ligen.logo, ligen.erstelltVon, user.username 
				FROM ligen, user
				WHERE ligen.erstelltVon = user.userId";
				$abfragen = mysqli_query($db, $abfrage);
				while ($abfragen && $row = mysqli_fetch_object($abfragen)) {
					$ligaId = $row->ligaId;
					$name = $row->name;
					$beschreibung = $row->beschreibung;
					$logo = $row->logo;
					$erstelltVon = $row->erstelltVon;
					$ersteller = $row->username;

			?>
					<div class="liga_block_klein" title="<?=$name?>">
						<a href="liga/index.php?liga=<?=$ligaId?>"><img src="img/ligen/<?=$logo?>">
						<div class="liga_info_klein">
							<h2><?=$name?></h2></a>
							<span class="ersteller"><a href="liga/index.php?liga=<?=$ligaId?>">Erstellt von </a><a href="profil/index.php?id=<?=$erstelltVon?>" title="Erstellt von <?=$ersteller?>"><?=$ersteller?></a></span>
							<span><a href="liga/index.php?liga=<?=$ligaId?>"><?=$beschreibung?></a></span>
						</div>
					</div>
			<?php
				}
			?>
		</aside>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
