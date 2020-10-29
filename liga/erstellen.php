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
        <script src="../js/liga-erstellen.js" type="text/javascript"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../inc/header.php') ?>
		<div id="content">
            <?php
                if (isset($_SESSION['userId'])) {
                    $userId = $_SESSION['userId'];
                    if (isset($_GET['erfolg'])) {
                        echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
                    }
                    if (isset($_GET['error'])) {
                        echo '<p class="error">'.$_GET['error'].'</p>';
                    }
            ?>
            <h1>Erstelle deine Liga</h1>
			<form action="php/erstellen.php" method="POST" enctype="multipart/form-data">
                <input type="text" id="liganame" name="liganame" value="<?=$_SESSION['neueLiga']['name']??''?>" placeholder="Name der Liga" required>
                <input type="text" id="keywords" name="keywords" value="<?=$_SESSION['neueLiga']['keywords']??''?>" placeholder="Keywords">
                <label id="img_input">
                    <span class="btn">Logo Auswählen</span>
                    <?php
                        if (isset($_SESSION['neueLiga']['ligalogo'])) {
                            $bildname = $_SESSION['neueLiga']['ligalogo']['name'];
                            echo "<span>$bildname</span>";
                        } else {
                            echo '<span>Wähle ein Logo für deine Liga</span>';
                        }
                    ?>
                    <input type="file" id="ligalogo" name="ligalogo" onchange="changeBild(this)" accept="image/png, image/jpeg, image/gif" style="display:none">
                </label>
                
                <textarea id="ligabeschreibung" name="ligabeschreibung" multiline="true" placeholder="Beschreibe deine Liga"><?=$_SESSION['neueLiga']['ligabeschreibung']??''?></textarea>

                <div id="vereine">
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
                    <div id="vereinsListe">
                        <?php
                            if (isset($_SESSION['neueLiga']['vereine'])) {
                                $abfrage = "SELECT vereinsId, name FROM vereine WHERE erstelltVon = '$userId'";
                                $abfragen = mysqli_query($db, $abfrage);
                                while ($row = mysqli_fetch_object($abfragen)) {
                                    if (in_array($row->vereinsId, $_SESSION['neueLiga']['vereine'])) {
                                        $vereinsId = $row->vereinsId;
                                        $name = $row->name;
                                        echo "<label>$name";
                                        echo "  <input type=\"hidden\" name=\"vereine[]\" value=\"$vereinsId\">";
                                        echo '  <img src="../img/loeschen.png" class="img_btn" onclick="this.parentNode.remove();">';
                                        echo '</label>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>

                <button id="submit" name="submit" title="Liga erstellen">Erstellen</button>

                <!-- Popup um den Verein zu erstellen -->
                <div id="vereinErstellen" class="popup_background" style="display:none">
                    <div class="popup_content">
                        <h1>Erstelle einen Verein</h1>
                        <input type="text" id="vereinsname" name="vereinsname" placeholder="Name des Vereins">
                        <label id="img_input">
                            <span class="btn">Logo Auswählen</span>
                            <span>Wähle ein Logo für deinen Verein</span>
                            <input type="file" id="vereinslogo" name="vereinslogo" onchange="changeBild(this)" accept="image/png, image/jpeg, image/gif" style="display:none">
                        </label>
                        <textarea id="vereinsbeschreibung" name="vereinsbeschreibung" multiline="true" placeholder="Beschreibe den Verein"></textarea>
                        <button formaction="verein/php/erstellen.php" title="Verein Erstellen und zur Liga hinzufügen">Hinzufügen</button>
                        <a href="javascript:void(0)" class="btn" onclick="closeVerein();">Abbrechen</a>
                    </div>
                </div>
            </form>

            <?php
                } else {
					echo '<p><p><a href="../profil/login.php" title="Login">Melde dich an</a>, um eine Liga zu erstellen.</p>';
				}
            ?>
		</div>
		<?php include_once('../inc/footer.php') ?>
	</body>
</html>
