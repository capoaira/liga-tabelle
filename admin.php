<?php
	require_once('inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/admin.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
				if (isset($_GET['error'])) {
					echo '<p class="error">'.$_GET['error'].'</p>';
                }
                if ($_SESSION['status'] === 'admin') {
            ?>
            <h1>Admintools</h1>
            <p>Als andmin hast du die Möglichkeit alle Profile, Ligen, Vereine, Spieltage und Spiele zu bearbeitene, genau so wie es auch die Ersteller können.</p>
            <p>Hier hast du die Möglichkeit gezielt nach Benutzern, Ligen und/oder Vereinen zu suchen. Auf den jeweiligen seiten kannst du diese dann ändern.<br>
            Die Suche funktionert mit Stichworten oder ID</p>
            <form id="admin_form" action="suche.php" method="GET">
                <label for="adminsuche">Suche: </label><input type="text" id="adminsuche" name="suche" placeholde="Stichwort oder ID">
                <div>
                    <label for="liga">Ligen:</label><input type="checkbox" id="liga" name="liga" value="true" checked>
                    <label for="user">Benutzer:</label><input type="checkbox" id="user" name="user" value="true" checked>
                    <label for="verein">Vereine:</label><input type="checkbox" id="verein" name="verein" value="true" checked>
               </div>
               <button id="submit" name="submit">Suchen</button>
            </form>
            <?php
                } else {
                    echo '<p class="error">Du bist nicht berechtig diese Seite zu nutzen!</p>';
                }
            ?>
        </div>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
