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
		<link rel="icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
			Du wurdest erfolgreich ausgeloggt.
		</div>
		<aside>
			
		</aside>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
