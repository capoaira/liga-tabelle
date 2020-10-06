<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];

    $pb_filename = $_POST['pb_old'];
	$zurueckZumStartOrdner = '../../';
	include('../../inc/bild_upload.php');

    if ($bildBearbeitet) {
        $eintrag = "UPDATE user SET profilbild = '$pb_filename' WHERE userId = $userId;";
        $eintragen = mysqli_query($db, $eintrag);
        header('location: ../index.php');
    } else {
        header('location: ../index.php?error=Das+Profilbild+konnte+leider+nicht+geändert+werden');
    }
?>