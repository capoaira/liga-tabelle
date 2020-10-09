<?php
	require_once('../inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Registrieren</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/form.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
			<?php
				if (!isset($_SESSION['userId'])) {
					if (isset($_GET['error'])) {
						echo '<p class="error">'.$_GET['error'].'</p>';
					}
			?>
			<form action="php/registrieren.php" method="POST">
				<label for="name">Benutzername:</label>
				<input type="text" id="name" name="benutzername" placeholder="Benutzername" required>
				
				<label for="email">E-Mail:</label>				
				<input type="email" id="email" name="email" placeholder="E-mail" required>
				
				<label for="passwort">Passwort:</label>				
				<input type="password" id="passwort" name="passwort" placeholder="Passwort" required>
				
				<label for="passwortWdhl">Passwort Wiederholen:</label>
				<input type="password" id="passwortWdhl" name="passwortWdhl" placeholder="Passwort Wiederholen" required>
				
				<button id="submit" name="submit">Registrieren</button>
			</form>
			<p>Schon ein Account erstellt? <a href="login.php">Hier geht es zum Login</a></p>
			<?php
				} else {
					echo '<p>Du hast dich schon eingeloggt</p>';
				}
			?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
