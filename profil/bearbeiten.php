<!DOCTYPE html>
<?php 
	require_once('../inc/dbconnect.php');
	session_start();

	$isAdmin = isset($_SESSION['status'])  && $_SESSION['status'] == 'admin';
	$darfBearbeiten = $isAdmin || (isset($_GET['id']) && $_GET['id'] == $_SESSION['userId']);
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/ligatabelle/js/showPasswort.js" type="text/javascript"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	</head>
	<body>
		<?php include('../inc/header.php'); ?>
		<div id="content">
			<?php
				if ($darfBearbeiten) {
					$userId = $_GET['id'];

					if (isset($_GET['error'])) {
						echo '<p class="error">'.$_GET['error'].'</p>';
					}
					
					$query = mysqli_query($db, "SELECT * FROM user WHERE userId = '$userId'");
					if ($row = mysqli_fetch_object($query)) {
						$username = $row->username;
						$email = $row->email;
						$profilbild = $row->profilbild;
					}
			?>
			<form action="php/bearbeiten.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$userId;?>">
				
				<label for="benutzername">Benutzername:</label>
				<input type="text" id="benutzername" placeholder="Benutzername" value="<?=$username;?>" name="benutzername" required>
				
				<label for="email">E-Mail: </label>
				<input type="email" id="email" placeholder="E-Mail" value="<?=$email;?>" name="email" required>
				
				<?php if (!$isAdmin) { ?>
				<label for="altPW">Altes Passwort: </label>
				<span class="passwort">
					<input type="password" id="altPW" placeholder="Altes Passwort" name="altPW">
					<label for="show_passwortWdhl_alt"><img src="/ligatabelle/img/auge.png" class="img_btn" title="Passwort anzeigen"></label>
					<input type="checkbox" id="show_passwortWdhl_alt" onchange="showPasswort(this);" style="display:none;">
				</span>
				<?php } ?>
				
				<label for="neuPW">Neues Passwort: </label>
				<span class="passwort">
					<input type="password" id="neuPW" placeholder="Neues Passwort" name="neuPW">
					<label for="show_passwort"><img src="/ligatabelle/img/auge.png" class="img_btn" title="Passwort anzeigen"></label>
					<input type="checkbox" id="show_passwort" onchange="showPasswort(this);" style="display:none;">
				</span>
				
				<label for="neuPWWdhl">Passwort Wiederholen: </label>
				<span class="passwort">
					<input type="password" id="neuPWWdhl" placeholder="Neues Passwort Wiederholen" name="neuPWWdhl">
					<label for="show_passwortWdhl"><img src="/ligatabelle/img/auge.png" class="img_btn" title="Passwort anzeigen"></label>
					<input type="checkbox" id="show_passwortWdhl" onchange="showPasswort(this);" style="display:none;">
				</span>
								
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