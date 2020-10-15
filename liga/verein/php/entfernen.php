<?php
	require_once('../../../inc/dbconnect.php');
    session_start();

    $vereinsId = $_GET['verein'];
    $ligaId = $_GET['liga'];
    $return = $_GET['return'];

    $loeschen = "DELETE FROM `liga-verein` WHERE vereinsId = '$vereinsId'";
    $loeschen = mysqli_query($db, $loeschen);

    $loeschen = "DELETE FROM spiele WHERE heimVerein = '$vereinsId'
                OR auswaertsVerein = '$vereinsId'";
    $loeschen = mysqli_query($db, $loeschen);

    $id = array_search($vereinsId, $_SESSION['neueLiga']['vereine']);
    if ($_SESSION['neueLiga']['vereine']) unset($_SESSION['neueLiga']['vereine'][$id]);

    header("location: $return?liga=$ligaId&erfolg=Du+hast+den+Verein+Erfolgreich+aus+der+Liga+entfernt.");
?>
