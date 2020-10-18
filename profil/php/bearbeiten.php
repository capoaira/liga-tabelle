<?php
	require_once('../../inc/dbconnect.php');
	session_start();

	$isAdmin = isset($_SESSION['status'])  && $_SESSION['status'] == 'admin';
	
	$userId = $_POST['id'];
	
	$email = $_POST['email'];
	$benutzername = $_POST['benutzername'];
	$pwAendern = false;

	if ((trim($_POST['altPW']) != '' || $isAdmin) && trim($_POST['neuPW']) != ''  && trim($_POST['neuPWWdhl']) != '' ) {
		echo 'PW Ändern';
		$pwAendern = true;
		$altPW = $_POST['altPW']??'';
		$neuPW = $_POST['neuPW'];
		$neuPWWdhl = $_POST['neuPWWdhl'];
		$abfrage = "SELECT passwort FROM user WHERE userId = '$userId'";
		$ergebnis = mysqli_query($db, $abfrage);

		$pwKannGeaendertWerden = false;
		if ($row=mysqli_fetch_object($ergebnis)) {
			$user_passwort = $row->passwort;
			
			if ((password_verify($altPW, $user_passwort) || $isAdmin) && $neuPW == $neuPWWdhl) {
				$pwKannGeaendertWerden = true;
				$neuPW = password_hash($neuPW, PASSWORD_DEFAULT);
			}
		}
	}

	$eintrag = "UPDATE user SET username = '$benutzername', email = '$email'" . ($pwAendern && $pwKannGeaendertWerden ? ", passwort = '$neuPW'" : "") . " WHERE userId = $userId;";
	$eintragen = mysqli_query($db, $eintrag);

	if ($pwAendern && !$pwKannGeaendertWerden) header('location: ../bearbeiten.php?id='.$userId.'&error=Das+Paswort+konnte+nicht+geändert+werden.');
	else header('location: ../index.php?id='.$userId.'&erfolg=Dein+Profil+wurde+bearbeitet');
?>
