<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];

    $old_filename = $_POST['pb_old'];
    $bild = $_FILES['pb_bearbeiten'];
    $upload_folder = '../../img/profile/';
    $standartBild = 'keinPB.png';
    $filename = $userId;
	include('../../inc/bild_upload.php');

    if ($bildBearbeitet) {
        $eintrag = "UPDATE user SET profilbild = '$new_filename' WHERE userId = $userId;";
        $eintragen = mysqli_query($db, $eintrag);
        header('location: ../index.php?erfolg=Dein+Profilbild+wurde+geändert.');
    } else {
        header('location: ../index.php?error=Fehler+beim+ändern+des+Passwortes.');
    }
?>