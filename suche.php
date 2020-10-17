<?php
    require_once('inc/dbconnect.php');
    session_start();

    $suche = $_GET['suche']??'';
    if (!is_numeric($suche)) $suche = "%".trim($suche)."%";
    $durchsuchen = [
        'ligen' => isset($_GET['liga']),
        'user' => isset($_GET['user']),
        'vereine' => isset($_GET['verein']),
    ];
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Suche</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/suche.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
<?php
    if (isset($_GET['error'])) {
        echo '<p class="error">'.$_GET['error'].'</p>';
    }
    if (isset($_GET['erfolg'])) {
        echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
    }
    
    if ($durchsuchen['ligen']) {
        if (is_numeric($suche)) $abfrage = "SELECT * FROM ligen WHERE ligaId LIKE '$suche'";
        else $abfrage = "SELECT * FROM ligen WHERE name LIKE '$suche' OR keywords LIKE '$suche' OR beschreibung LIKE '$suche'";
        $abfragen = mysqli_query($db, $abfrage);
        if ($abfragen->num_rows > 0) {
            echo "<h2>Ligen:</h2>";
        }
        while ($abfragen && $liga=mysqli_fetch_object($abfragen)) {
            $abfrage_user = mysqli_query($db, "SELECT username FROM user WHERE userId = $liga->erstelltVon");
            $user = mysqli_fetch_object($abfrage_user);
?>
            <a href="liga/index.php?liga=<?=$liga->ligaId?>" class="block" title="<?=$liga->name?>">
                <img src="img/ligen/<?=$liga->logo?>">
                <span class="info">
                    <h1><?=$liga->name?></h1>
                    <span>Erstellt von: <?=$user->username?></span>
                    <span><?=$liga->beschreibung?></span>
                </span>
            </a>
<?php 
        }
    }
    
    if ($durchsuchen['user']) {
        if (is_numeric($suche)) $abfrage = "SELECT * FROM user WHERE userId LIKE '$suche'";
        else $abfrage = "SELECT * FROM user WHERE username LIKE '$suche'";
        $abfragen = mysqli_query($db, $abfrage);
        if ($abfragen->num_rows > 0) {
            echo "<h2>Benutzer:</h2>";
        }
        while ($abfragen && $user=mysqli_fetch_object($abfragen)) {
?>
            <a href="profil/index.php?id=<?=$user->userId?>" class="block" title="<?=$user->username?>">
                <img src="img/profile/<?=$user->profilbild?>">
                <span class="info">
                    <span class="h1"><?=$user->username?></span>
                </span>
            </a>
<?php 
        }
    }
    
    if ($durchsuchen['vereine']) {
        if (is_numeric($suche)) $abfrage = "SELECT * FROM vereine WHERE vereinsId LIKE '$suche'";
        else $abfrage = "SELECT * FROM vereine WHERE name LIKE '$suche' OR beschreibung LIKE '$suche'";
        $abfragen = mysqli_query($db, $abfrage);
        if ($abfragen->num_rows > 0) {
            echo "<h2>Vereine:</h2>";
        }
        while ($abfragen && $verein=mysqli_fetch_object($abfragen)) {
            $abfrage_user = mysqli_query($db, "SELECT username FROM user WHERE userId = $verein->erstelltVon");
            $user = mysqli_fetch_object($abfrage_user);
?>
            <a href="liga/verein/index.php?verein=<?=$verein->vereinsId?>" class="block" title="<?=$verein->name?>">
                <img src="img/vereine/<?=$verein->logo?>">
                <span class="info">
                    <h1><?=$verein->name?></h1>
                    <span>Erstellt von: <?=$user->username?></span>
                    <span><?=$verein->beschreibung?></span>
                </span>
            </a>
<?php 
        }
    }
?>
		</div>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
