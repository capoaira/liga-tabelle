<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];
    $_SESSION['neueLiga']['name'] = $_POST['liganame'];
    $_SESSION['neueLiga']['keywords'] = $_POST['keywords'];
    $_SESSION['neueLiga']['ligalogo'] = ($_FILES['ligalogo']['error'] == 0 ? $_FILES['ligalogo'] : $_SESSION['neueLiga']['ligalogo']);
    $_SESSION['neueLiga']['ligabeschreibung'] = $_POST['ligabeschreibung'];
    $_SESSION['neueLiga']['vereine'] = $_POST['vereine']??[];

    if (isset($_POST['liganame']) && isset($_POST['vereine'])) {
        $liganame = $_POST['liganame'];
        $keywords = $_POST['keywords']??'';
        $beschreibung = $_POST['ligabeschreibung']??'';

        $old_filename = 'keinLogo.png';
        $bild = $_SESSION['neueLiga']['ligalogo'];
        $upload_folder = '../../img/ligen/';
        $standartBild = 'keinLogo.png';
        $abfrage = "SELECT * FROM ligen"; // Abfragen, welche die letzte ligaId ist, damit das Logo den richtigen Namen bekommt
        $abfragen = mysqli_query($db, $abfrage);
        $filename = mysqli_num_rows($abfragen)+1;
        $ligaId = $filename;
        include_once('../../inc/bild_upload.php');

        if (!$bildBearbeitet) $new_filename = 'keinLogo.png';

        $eintrag = "INSERT INTO ligen (name, beschreibung, logo, erstelltVon, keywords)
                    VALUES ('$liganame', '$beschreibung', '$new_filename', '$userId', '$keywords')";
        $eintragen = mysqli_query($db, $eintrag);

        for ($i=0; $i<count($_POST['vereine']); $i++) {
            $vereinsId = $_POST['vereine'][$i];
            $eintrag = "INSERT INTO `liga-verein` (ligaId, vereinsId)
                        VALUES ('$ligaId', '$vereinsId')";
            $eintragen = mysqli_query($db, $eintrag);
        }
        
        unset($_SESSION['neueLiga']);
        header("location: ../index.php?liga=$ligaId");
    } else {
        header('location: ../erstellen.php?error=Die+Liga+konnte+leider+nicht+erstellt+werden');
    }
?>
