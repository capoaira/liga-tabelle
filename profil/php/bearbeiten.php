<?php
	include('../../inc/dbconnect.php');
	session_start();
	
	$userId = $_SESSION['userId'];
	
	$email = $_POST['email'];
	$benutzername = $_POST['benutzername'];
	$pwAendern = false;

	if (trim($_POST['altPW']) != '' && trim($_POST['altPW']) != ''  && trim($_POST['altPW']) != '' ) {
		echo 'PW Ändern';
		$pwAendern = true;
		$altPW = $_POST['altPW'];
		$neuPW = $_POST['neuPW'];
		$neuPWWdhl = $_POST['neuPWWdhl'];
		$abfrage = "SELECT passwort FROM user WHERE userId = '$userId'";
		$ergebnis = mysqli_query($db, $abfrage);

		$pwKannGeaendertWerden = false;
		if ($row=mysqli_fetch_object($ergebnis)) {
			$user_passwort = $row->passwort;
			
			if (password_verify($altPW, $user_passwort) && $neuPW == $neuPWWdhl) {
				$pwKannGeaendertWerden = true;
				$neuPW = password_hash($neuPW, PASSWORD_DEFAULT);
			}
		}
	}

	$pb_filename = $_POST['pb_old'];
	$zurueckZumStartOrdner = '../../';
	include('../../inc/bild_upload.php');

	$eintrag = "UPDATE user SET username = '$benutzername', email = '$email'" . ($bildBearbeitet ? ", profilbild = '$pb_filename'" : "") . ($pwAendern && $pwKannGeaendertWerden ? ", passwort = '$neuPW'" : "") . " WHERE userId = $userId;";
	$eintragen = mysqli_query($db, $eintrag);

	if ($pwAendern && !$pwKannGeaendertWerden) header('location: ../bearbeiten.php?error=pw');
	else header('location: ../index.php');
?>
