<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];
    $_SESSION['neueLiga']['name'] = $_POST['liganame'];
    $_SESSION['neueLiga']['keywords'] = $_POST['keywords'];
    $_SESSION['neueLiga']['ligabeschreibung'] = $_POST['ligabeschreibung'];
    $_SESSION['neueLiga']['ligalogo'] = $_FILES['ligalogo'];
    //$_SESSION['neueLiga']['vereine'] = $_POST['vereine'];

    if (isset($_POST['vereinsname'])) {
        $vereinsname = $_POST['vereinsname'];
        $beschreibung = $_POST['vereinsbeschreibung']??'';

        $old_filename = 'keinLogo.png';
        $bildId = 'vereinslogo';
        $upload_folder = '../../../img/vereine/';
        $standartBild = 'keinLogo.png';
        $abfrage = "SELECT * FROM vereine";
        $abfragen = mysqli_query($db, $abfrage);
        $filename = mysqli_num_rows($abfragen)+1;
        include_once('../../../inc/bild_upload.php');

        if (!$bildBearbeitet) $new_filename = 'keinLogo.png';

        $eintrag = "INSERT INTO vereine (name, beschreibung, logo, erstelltVon)
                    VALUES ('$vereinsname', '$beschreibung', '$new_filename', $userId)";
        $eintragen = mysqli_query($db, $eintrag);
        header('location: ../../erstellen.php?session=true');
    } else {
        header('location: ../../erstellen.php?error=Verein+konnte+nicht+hinzugefügt+werden&session=true');
    }
?>