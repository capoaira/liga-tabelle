<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_GET['liga'];
    $spieltagId = $_GET['spieltag'];

    $loeschen = "DELETE FROM spieltage WHERE spieltagId = '$spieltagId'";
    $loeschen = mysqli_query($db, $loeschen);

    header("location: ../alle.php?liga=$ligaId&erfolg=Du+hast+den+Spieltag+erfolgreich+gelöscht.");
?>
