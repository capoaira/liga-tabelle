<!DOCTYPE html>
<?php 
	include('../inc/dbconnect.php');
	session_start();
?>
<html>
	<head>
		<title>Mein Profil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/form.css">
		<link rel="stylesheet" href="/ligatabelle/css/profil.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<script language="javascript" type="text/javascript" src="../js/profil.js"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include('../inc/header.php'); ?>
		<div id="content">
			<?php
				if (isset($_GET['error'])) {
					echo '<p>' . $_GET['error'] . '</p>';
				}
				if (isset($_SESSION['userId'])) {
					$userId = $_SESSION['userId'];
					$username = $_SESSION['username'];
					$eigenesProfil = true;

					if (isset($_GET['id']) && $userId != $_GET['id']) {
						$profilId = $_GET['id'];
						$eigenesProfil = false;
					}
					
					$query = mysqli_query($db, "SELECT username, email, profilbild, status, createdAt FROM user WHERE userId = '" . ($eigenesProfil ? $userId : $profilId) . "'");
					if ($row = mysqli_fetch_object($query)) {
						$benutzername = $row->username;
						$profilbild = $row->profilbild;
						$email = $row->email;
						$status = $row->status;
						$createdAt = $row->createdAt;
					}
			?>
			<h1>Profil von user <?=$benutzername;?>
			<?php 
				if ($eigenesProfil) {
					echo '<a href="bearbeiten.php" class="img_btn" title="Bearbeite dein Profil"><img src="../img/bearbeiten.png"></a>';
				}
			?>
			</h1>
			<?php
				if ($eigenesProfil) {
					echo '<figure>';
				}
			?>
				<img id="pb" src="../img/profile/<?=$profilbild;?>" alt="Profilbild" title="<?=$benutzername;?>">
			<?php
				if ($eigenesProfil) {
			?>
					<figcaption>
						<form action="php/bild-bearbeiten.php" method="POST" enctype="multipart/form-data" style="display: unset">
							<label class="img_btn" title="Bearbeite dein Profilbild">
								<img src="../img/bearbeiten.png">
								<input type="file" id="pb_bearbeiten" name="pb_bearbeiten" style="display:none">
							</label>
							<input type="hidden" id="pb_old" name="pb_old" value="<?=$profilbild;?>">
							<button id="submit" name="submit" style="display:none"></button>
						</form>|
						<a href="php/bild-loeschen.php" class="img_btn" title="Lösche dein Profilbild">
							<img src="../img/loeschen.png">
						</a>
					</figcaption>
				</figure>
			<?php
				}
			?>
			<div id="ausgabe">
				<span>Benutzername:</span><span><?= $benutzername; ?></span>
				<span>E-Mail:</span><span><?= $email; ?></span>
				<span>Status:</span><span><?= $status; ?></span>
				<span>Mitglied seit:</span><span><?= $createdAt; ?></span>
			</div>
			<?php 
				} else {
					echo '<p><p><a href="login.php">Melde dich an</a>, um dein Profil zu sehen</p>';
				}
			?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
