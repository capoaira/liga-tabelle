<!DOCTYPE html>
<?php 
	require_once('../inc/dbconnect.php');
	session_start();
?>
<html>
	<head>
		<title>Profil Bearbeiten</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/form.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	</head>
	<body>
		<?php include('../inc/header.php'); ?>
		<div id="content">
			<?php
				if (isset($_SESSION['userId'])) {
					$userId = $_SESSION['userId'];
					$username = $_SESSION['username'];

					if (isset($_GET['error'])) {
						echo '<p class="error">'.$_GET['error'].'</p>';
					}
					
					$query = mysqli_query($db, "SELECT * FROM user WHERE userId = '$userId'");
					if ($row = mysqli_fetch_object($query)) {
						$email = $row->email;
						$profilbild = $row->profilbild;
					}
			?>
			<form action="php/bearbeiten.php" method="POST" enctype="multipart/form-data">
				<label for="benutzername">Benutzername:</label>
				<input type="text" id="benutzername" placeholder="Benutzername" value="<?=$username;?>" name="benutzername" required>
				
				<label for="email">E-Mail: </label>
				<input type="email" id="email" placeholder="E-Mail" value="<?=$email;?>" name="email" required>
				
				<label for="altPW">Altes Passwort: </label>
				<input type="password" id="altPW" placeholder="Altes Passwort" name="altPW">
				
				<label for="neuPW">Neues Passwort: </label>
				<input type="password" id="neuPW" placeholder="Neues Passwort" name="neuPW">
				
				<label for="neuPWWdhl">Passwort Wiederholen: </label>
				<input type="password" id="neuPWWdhl" placeholder="Neues Passwort Wiederholen" name="neuPWWdhl">
								
				<button id="submit" name="submit">Speichern</button>
			</form>
			<?php 
				} else {
					echo '<p><p><a href="login.php">Melde dich an</a>, um dein Profil zu sehen</p>';
				}
			?>
		</div>
		<?php include_once('../inc/footer.php'); ?>
	</body>
</html>