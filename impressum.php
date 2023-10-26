<?php
	require_once('inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Impressum</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/home.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
        <style>
            h2 {
                margin: 1em 0
            }
            ul {
                padding-left: 2em;
            }
        </style>
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
            <p>Diese Seite muss kein Impressum haben, da sie ausschließlich meinem privaten Gebrauch dient. Ich nutze diesen Server um Projekte mit HTML, CSS, JavaScript, PHP und SQL zu testen.</p> 
		</div>
		<?php include_once('inc/aside_neuste_ligen.php') ?>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
