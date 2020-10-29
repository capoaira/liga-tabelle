<?php
	require_once('../inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/form.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/ligatabelle/js/showPasswort.js" type="text/javascript"></script>
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
			<form action="php/login.php" method="POST">
				<label for="name">Benutzername: </label>
				<input type="text" id="name" name="benutzername" placeholder="Benutzername" required>
				
				<label for="passwort">Passwort: </label>
				<span class="passwort">
					<input type="password" id="passwort" name="passwort" placeholder="Passwort" required>
					<label for="show_passwort"><img src="/ligatabelle/img/auge.png" class="img_btn" title="Passwort anzeigen"></label>
					<input type="checkbox" id="show_passwort" onchange="showPasswort(this);" style="display:none;">
				</span>
				<button id="submit" name="submit">Login</button>
			</form>
			<p>Noch keinen Account erstellt? <a href="registrieren.php">Hier kannst du dich registrieren</a></p>
			<?php
				} else {
					echo '<p>Du hast dich schon eingeloggt</p>';
				}
			?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
