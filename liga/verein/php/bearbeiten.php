<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];

    $vereinsId = $_POST['vereinsId'];
    $name = $_POST['vereinsname'];
    $beschreibung = $_POST['vereinsbeschreibung'];

    print_r($_FILES['vereinslogo']);

    $bildBearbeiten = isset($_FILES['vereinslogo']);
    if ($bildBearbeiten) {
        echo "Bild bearbeiten";
        $old_filename = $_POST['old_vereinslogo'];
        $bild = $_FILES['vereinslogo'];
        $upload_folder = '../../../img/vereine/';
        $standartBild = 'keinLogo.png';
        $filename = $vereinsId;
        include('../../../inc/bild_upload.php');
    }

    $logo = ($bildBearbeiten && isset($bildBearbeitet) && $bildBearbeitet ? ", logo = '$new_filename'" : "");
    $eintrag = "UPDATE vereine
                SET name = '$name', beschreibung = '$beschreibung' $logo
                WHERE vereinsId = $vereinsId;";
    $eintragen = mysqli_query($db, $eintrag);
    
    //header("location: ../index.php?verein=$vereinsId&erfolg=Der+Verein+wurde+erfolgreich+bearbeitet");
?>
