<?php
	require_once('../../inc/dbconnect.php');
    session_start();
	
	require_once('../../inc/global.php');
	
	$userId = $_SESSION['userId'??0];
	$vereinsId = $_GET['verein']??0;
	$darfBearbeiten = istMeinVerein($db, $userId, $vereinsId) || (isset($_SESSION['status']) && $_SESSION['status'] == 'admin');
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/liga-erstellen.css">
		<link rel="stylesheet" href="/ligatabelle/css/verein.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/ligatabelle/js/liga-erstellen.js" type="text/javascript"></script>
        <script src="/ligatabelle/js/verein.js" type="text/javascript"></script>
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('../../inc/header.php') ?>
		<div id="content">
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
				if (isset($_GET['error'])) {
					echo '<p class="error">'.$_GET['error'].'</p>';
				}
				$abfrage = mysqli_query($db, "SELECT * FROM vereine WHERE vereinsId = $vereinsId");
				$verein = mysqli_fetch_object($abfrage);
				$abfrage = mysqli_query($db, "SELECT * FROM user WHERE userId = $verein->erstelltVon");
				$user = mysqli_fetch_object($abfrage);
			?>
			<div class="verein_block">
				<img src="/ligatabelle/img/vereine/<?=$verein->logo?>">
				<div class="verein_info">
					<div>
						<span class="h1"><?=$verein->name?></span>
						<?php
							if ($darfBearbeiten) {
								echo '<a href="javascript:void(0)" onclick="openPopup()"><img src="/ligatabelle/img/bearbeiten.png" class="img_btn"></a>';
								echo '<a href="php/loeschen.php?verein='.$vereinsId.'"><img src="/ligatabelle/img/loeschen.png" class="img_btn"></a>';
							}
						?>
					</div>
					<span class="ersteller">Erstellt von <a href="../../profil/index.php?id=<?=$verein->erstelltVon?>"><?=$user->username?></a></span>
					<span class="beschreibung"><?=$verein->beschreibung?></span>
				</div>
			</div>

			<!-- Popup um den Verein zu bearbeiten -->
			<div id="vereinBearbeiten" class="popup_background" style="display:none">
				<div class="popup_content">
					<form action="php/bearbeiten.php" method="POST" enctype="multipart/form-data">
						<h1>Bearbeite den Verein</h1>
						<input type="hidden" value="<?=$verein->vereinsId?>" name="vereinsId">
						<input type="hidden" value="<?=$verein->logo?>" name="old_vereinslogo">
						<input type="text" id="vereinsname" name="vereinsname">
						<label id="img_input">
							<span class="btn">Logo Auswählen</span>
							<span>Ändere das Vereins Logo</span>
							<input type="file" id="vereinslogo" name="vereinslogo" onchange="changeBild(this)" accept="image/png, image/jpeg, image/gif" style="display:none">
						</label>
						<textarea id="vereinsbeschreibung" name="vereinsbeschreibung" multiline="true" placeholder="Beschreibe den Verein"></textarea>
						
						<button>Bearbeiten</button>
						<a href="javascript:void(0)" class="btn" onclick="$('#vereinBearbeiten').css('display', 'none');">Abbrechen</a>
					</form>
				</div>
			</div>
		</div>
		<?php include_once('../../inc/footer.php') ?>
	</body>
</html>
