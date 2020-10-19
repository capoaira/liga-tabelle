<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];
    $_SESSION['neueLiga']['name'] = $_POST['liganame'];
    $_SESSION['neueLiga']['keywords'] = $_POST['keywords'];
    $_SESSION['neueLiga']['ligalogo'] = ($_FILES['ligalogo']['error'] == 0 ? $_FILES['ligalogo'] : $_SESSION['neueLiga']['ligalogo']);;
    $_SESSION['neueLiga']['ligabeschreibung'] = $_POST['ligabeschreibung'];
    $_SESSION['neueLiga']['vereine'] = $_POST['vereine']??[];

    if (isset($_POST['vereinsname'])) {
        $vereinsname = $_POST['vereinsname'];
        $beschreibung = $_POST['vereinsbeschreibung']??'';

        $eintrag = "INSERT INTO vereine (name, beschreibung, logo, erstelltVon)
                    VALUES ('$vereinsname', '$beschreibung', 'keinLogo.png', $userId)";
        $eintragen = mysqli_query($db, $eintrag);

        $abfragen = mysqli_query($db, "SELECT vereinsId FROM vereine ORDER BY vereinsId DESC LIMIT 1");
        $verein = mysqli_fetch_object($abfragen);
        $vereinsId = $verein->vereinsId;

        $old_filename = 'keinLogo.png';
        $bild = $_FILES['vereinslogo'];
        $upload_folder = '../../../img/vereine/';
        $standartBild = 'keinLogo.png';
        $filename = $vereinsId;
        include_once('../../../inc/bild_upload.php');

        if (!$bildBearbeitet) $new_filename = 'keinLogo.png';

        $update = mysqli_query($db, "UPDATE vereine SET logo = '$new_filename' WHERE vereinsId = $vereinId");

        $abfrage = "SELECT vereinsId FROM vereine WHERE erstelltVon = '$userId' ORDER BY vereinsId DESC LIMIT 1";
        $abfragen = mysqli_query($db, $abfrage);
        if ($row = mysqli_fetch_object($abfragen)) {
            array_push($_SESSION['neueLiga']['vereine'], $row->vereinsId);
        }
        header('location: ../../erstellen.php?efolg=Der+Verein+wurde+erstellt.');
    } else {
        header('location: ../../erstellen.php?error=Verein+konnte+nicht+hinzugefügt+werden');
    }
?>