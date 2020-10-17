<?php
    require_once('../inc/dbconnect.php');
    session_start();
    session_destroy();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Logout</title>
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
		<?php include_once('../inc/header.php') ?>
		<div id="content">
			<p class="erfolg">Du wurdest erfolgreich ausgeloggt.</p>
		</div>
		<?php include_once('../inc/aside_neuste_ligen.php') ?>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
