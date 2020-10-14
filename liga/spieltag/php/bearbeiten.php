<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_POST['ligaId'];
    $spieltagId = $_POST['spieltagId'];
    $von = $_POST['von'];
    $bis = $_POST['bis'];

    if (isset($_POST['ligaId']) && isset($_POST['spieltagId'])) {
        $eintrag = "UPDATE spieltage
                    SET von = '$von', bis = '$bis'
                    WHERE spieltagId = $spieltagId";
        $eintragen = mysqli_query($db, $eintrag);
        header("location: ../../spieltag/alle.php?liga=$ligaId&erfolg=Spieltag+wurde+erfolgreich+bearbeitet");
    } else {
        header("location: ../../spieltag/alle.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>
