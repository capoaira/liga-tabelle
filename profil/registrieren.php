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
		<link rel="icon" href="img/favicon.png" type="image/png">
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
					if (isset($_GET['errorMsg'])) {
						echo "<p>".$_GET['errorMsg']."</p>";
					}
			?>
			<form action="php/registrieren.php" method="POST">
				<lable for="name">Benutzername: </lable>
				<input type="text" id="name" name="benutzername" placeholder="Benutzername" required>
				
				<lable for="email">E-Mail: </lable>				
				<input type="email" id="email" name="email" placeholder="E-mail" required>
				
				<lable for="passwort">Passwort: </lable>				
				<input type="password" id="passwort" name="passwort" placeholder="Passwort" required>
				
				<lable for="passwortWdhl">Passwort&nbsp;Wiederholen: </lable>
				<input type="password" id="passwortWdhl" name="passwortWdhl" placeholder="Passwort Wiederholen" required>
				
				<button id="submit" name="submit">Registrieren</button>
			</form>
			<p>Schon ein Account erstellt? <a href= "login.php">Hier geht es zum Login</a></p>
			<?php
				} else {
					echo '<p>Du hast dich schon eingeloggt</p>';
				}
			?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
