<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $vereinsId = $_GET['verein'];
    $ligaId = $_GET['liga'];

    $loeschen = "DELETE FROM `liga-verein` WHERE vereinsId = '$vereinsId'";
    $loeschen = mysqli_query($db, $loeschen);

    $loeschen = "DELETE FROM spiele WHERE heimVerein = '$vereinsId'
                OR auswaertsVerein = '$vereinsId'";
    $loeschen = mysqli_query($db, $loeschen);

    $abfrage = mysqli_query($db, "SELECT logo FROM vereine WHERE vereinsId = '$vereinsId'");
    $row = mysqli_fetch_object($abfrage);
    $logo = $row->logo;
    if ($logo != 'keinLogo.png') unlink("../../../img/vereine/$logo");

    $loeschen = "DELETE FROM vereine WHERE vereinsId = '$vereinsId'";
    $loeschen = mysqli_query($db, $loeschen);

    header("location: ../../index.php?liga=$ligaId&erfolg=Du+hast+den+Verein+Erfolgreich+gelöscht.");
?>
