<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];
    $liga = (preg_match('/erstellen.php/', $_SERVER['HTTP_REFERER']) ? 'neueLiga' : 'ligaBearbeiten');
    $_SESSION[$liga]['name'] = $_POST['liganame'];
    $_SESSION[$liga]['keywords'] = $_POST['keywords'];
    $_SESSION[$liga]['ligalogo'] = ($_FILES['ligalogo']['error'] == 0 ? $_FILES['ligalogo'] : $_SESSION[$liga]['ligalogo']);;
    $_SESSION[$liga]['ligabeschreibung'] = $_POST['ligabeschreibung'];
    $_SESSION[$liga]['vereine'] = $_POST['vereine']??[];

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
        include('../../../inc/bild_upload.php');

        if (!$bildBearbeitet) $new_filename = 'keinLogo.png';

        $update = mysqli_query($db, "UPDATE vereine SET logo = '$new_filename' WHERE vereinsId = $vereinsId");

        $abfrage = "SELECT vereinsId FROM vereine WHERE erstelltVon = '$userId' ORDER BY vereinsId DESC LIMIT 1";
        $abfragen = mysqli_query($db, $abfrage);
        if ($row = mysqli_fetch_object($abfragen)) {
            array_push($_SESSION[$liga]['vereine'], $row->vereinsId);
        }
        if ($liga == 'neueLiga') {
            header('location: ../../erstellen.php?efolg=Der+Verein+wurde+erstellt.');
        } else {
            header('location: ../../bearbeiten.php?liga='.$_SESSION['ligaBearbeiten']['ligaId'].'&efolg=Der+Verein+wurde+erstellt.');
        }
    } else {
        if ($liga == 'neueLiga') {
            header('location: ../../erstellen.php?error=Verein+konnte+nicht+hinzugefügt+werden');
        } else {
            header('location: ../../bearbeiten.php?liga='.$_SESSION['ligaBearbeiten']['ligaId'].'&error=Verein+konnte+nicht+hinzugefügt+werden.');
        }
    }
?>