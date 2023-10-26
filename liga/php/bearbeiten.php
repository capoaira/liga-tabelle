<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $userId = $_SESSION['userId'];
    $ligaId = $_SESSION['ligaBearbeiten']['ligaId'];
    $_SESSION['ligaBearbeiten']['name'] = $_POST['liganame'];
    $_SESSION['ligaBearbeiten']['keywords'] = $_POST['keywords'];
    $_SESSION['ligaBearbeiten']['ligalogo'] = ($_FILES['ligalogo']['error'] == 0 ? $_FILES['ligalogo'] : $_SESSION['ligaBearbeiten']['ligalogo']);
    $_SESSION['ligaBearbeiten']['ligabeschreibung'] = $_POST['ligabeschreibung'];
    $_SESSION['ligaBearbeiten']['vereine'] = $_POST['vereine']??[];

    if (isset($_POST['liganame']) && isset($_POST['vereine'])) {
        $liganame = $_POST['liganame'];
        $keywords = $_POST['keywords']??'';
        $beschreibung = $_POST['ligabeschreibung']??'';

        $old_filename = $_SESSION['ligaBearbeiten']['alt_ligaLogo'];
        $bild = $_SESSION['ligaBearbeiten']['ligalogo'];
        $upload_folder = '../../img/ligen/';
        $standartBild = 'keinLogo.png';
        $filename = $ligaId;
        include_once('../../inc/bild_upload.php');

        if (!$bildBearbeitet) $new_filename = $old_filename;

        $update = "UPDATE ligen
                   SET name = '$liganame', keywords = '$keywords', beschreibung = '$beschreibung', logo = '$new_filename'
                   WHERE ligaId = $ligaId";
        $updaten = mysqli_query($db, $update);

        for ($i=0; $i<count($_POST['vereine']); $i++) {
            $vereinsId = $_POST['vereine'][$i];
            $eintrag = "INSERT INTO `liga-verein` (ligaId, vereinsId)
                        VALUES ('$ligaId', '$vereinsId')";
            $eintragen = mysqli_query($db, $eintrag);
        }
        
        unset($_SESSION['ligaBearbeiten']);
        exit(header("location: ../index.php?liga=$ligaId&erfolg=Liga+wurde+erfolgreich+bearbeitet."));
    } else {
        exit(header('location: ../bearbeiten.php?error=Die+Liga+konnte+leider+nicht+bearbeitet+werden.'));
    }
