<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $spielId = $_GET['spiel'];
    $spieltagId = $_GET['spieltag'];
    $ligaId = $_GET['liga'];

    $loeschen = "DELETE FROM spiele WHERE spielId = '$spielId'";
    $loeschen = mysqli_query($db, $loeschen);

    header("location: ../../spieltag/alle.php?liga=$ligaId&erfolg=Du+hast+das+Spiel+erfolgreich+gelöscht.#spieltag_$spieltagId");
?>
