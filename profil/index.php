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
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include('../inc/header.php'); ?>
		<div id="content">
			<?php
				if (isset($_SESSION['userId'])) {
					$userId = $_SESSION['userId'];
					$username = $_SESSION['username'];
					
					$query = mysqli_query($db, "SELECT email, profilbild FROM user WHERE userId = '$userId'");
					if ($row = mysqli_fetch_object($query)) {
						$profilbild = $row->profilbild;
						$email = $row->email;
					}
			?>
			<h1>Profil von user <?=$username;?><a href="bearbeiten.php" class="bearbeiten" title="Bearbeite dein Profil"><img src="../img/bearbeiten.png"></a></h1>
			<img id="pb" src="../img/profile/<?=$profilbild;?>" alt="Profilbild" title="<?=$username;?>">
			<div id="ausgabe">
				<span>Benutzername:</span><span><?php echo $username; ?></span>
				<span>E-Mail:</span><span><?php echo $email; ?></span>
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
