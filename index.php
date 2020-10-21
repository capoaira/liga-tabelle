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
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
			?>
			<h1>Deine Ligatabelle</h1>
			<p>Schön, dass du auf unsere Seite gefunden hast.<br>
			Auf dieser Seite hast du die Möglichkeit Fußball Tabellen zu erstellen. Durch die übersichtliche Unterteilung der Liga in Spiele und Spieltage ist die Bedienung der Seite super einfach. Zudem hast du immer einen Überblick, welcher Verein gerade vorne liegt, denn die Tabelle ist immer auf dem neusten Stand.</p>
			<p><a href="anleitung.php">Unsere Anleitung</a> bietet einen super Einstieg in die Bedienung unserer Webseite.</p>
		</div>
		<?php include_once('inc/aside_neuste_ligen.php') ?>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
