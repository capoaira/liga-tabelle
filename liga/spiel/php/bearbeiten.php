<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_POST['ligaId'];
    $spielId = $_POST['spielId'];
    $spieltagId = $_POST['spieltagId'];
    $heimTore = $_POST['heimVereinTore'];
    $auswTore = $_POST['auswaertsVereinTore'];

    if (isset($_POST['ligaId']) && isset($_POST['spielId'])) {
        $eintrag = "UPDATE spiele
                    SET heimVereinTore = $heimTore, auswaertsVereinTore = $auswTore
                    WHERE spielId = $spielId";
        $eintragen = mysqli_query($db, $eintrag);
        header("location: ../../spieltag/alle.php?liga=$ligaId&erfolg=Spiel+wurde+erfolgreich+bearbeitet#spieltag_$spieltagId");
    } else {
        header("location: ../../spieltag/alle.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>
