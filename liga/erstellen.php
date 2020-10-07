<?php
    require_once('../inc/dbconnect.php');
    session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Liga Erstellen</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="/ligatabelle/css/style.css">
        <link rel="stylesheet" href="/ligatabelle/css/liga-erstellen.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../js/verein.js" type="text/javascript"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
            <?php
                if (isset($_SESSION['userId'])) {
                    $userId = $_SESSION['userId'];
            ?>
			<form action="php/erstellen.php" method="POST" enctype="multipart/form-data">
                <input type="text" id="liganame" name="liganame" placeholder="Name der Liga" required>
                <input type="text" id="keywords" name="keywords" placeholder="Keywords">
                <input type="file" id="ligalogo" name="ligalogo">
                <textarea id="ligabeschreibung" name="ligabeschreibung" multiline="true" placeholder="Beschreibe deine Liga"></textarea>
            
                <select id="select" name="verein" onchange="addVerein();">
                    <option value="select">Wähle ein Verein</option>
                    <?php
                        $abfrage = "SELECT vereinsId, name FROM vereine WHERE erstelltVon = '$userId'";
                        $abfragen = mysqli_query($db, $abfrage);
                        while ($row = mysqli_fetch_object($abfragen)) {
                            $vereinsId = $row->vereinsId;
                            $vereinsName = $row->name;
                            echo "<option value=\"$vereinsId\">$vereinsName</option>";
                        }
                    ?>
                    <option value="neuerVerein">Neuen Verein erstellen</option>
                </select>

                <div id="vereinErstellen" style="display:none">
                    <div>
                        <h1>Erstelle einen Verein</h1>
                        <input type="text" id="vereinsname" name="vereinsname" placeholder="Name des Vereins" required>
                        <input type="file" id="vereinslogos" name="vereinslogo">
                        <textarea id="vereinsbeschreibung" name="vereinsbeschreibung" multiline="true" placeholder="Beschreibe den Verein"></textarea>
                        <button formaction="verein/php/erstellen.php">Hinzufügen</button>
                        <a href="javascript:void(0)" class="btn" onclick="closeVerein();">Abbrechen</a>
                    </div>
                </div>
            </form>

            <?php
                } else {
					echo '<p><p><a href="login.php">Melde dich an</a>, um eine Liga zu erstellen.</p>';
				}
            ?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
