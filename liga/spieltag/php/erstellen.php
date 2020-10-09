<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_POST['ligaId'];
    $von = $_POST['von'];
    $bis = $_POST['bis'];

    if (isset($_POST['ligaId']) && isset($_POST['von']) && isset($_POST['bis']) && $von<=$bis) {
        $abfrage = "SELECT erstelltVon FROM ligen WHERE ligaId = '$ligaId'";
        $abfragen = mysqli_query($db, $abfrage);
        // Prüfen ob die Liga exestiert und dem angemeldetem User gehöhrt
        if ($abfragen && $row = mysqli_fetch_object($abfragen)) {
            if ($row->erstelltVon == $_SESSION['userId']) {
                $eintrag = "INSERT INTO spieltage (von, bis, ligaId) VALUES ('$von', '$bis', '$ligaId')";
                $eintragen = mysqli_query($db, $eintrag);

                header("location: ../../index.php?liga=$ligaId&erfolg=Spieltag+wurde+erstellt.");
            } else {
                header("location: ../../index.php?liga=$ligaId&error=Die+Liga+gehört+nicht+dir.");
            }
        } else {
            header("location: ../../index.php?liga=$ligaId&error=Die+Liga+exestiert+nicht..");
        }
    } else {
        header("location: ../../index.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>