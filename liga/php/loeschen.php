<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $ligaId = $_GET['liga'];

    $loeschen = mysqli_query($db, "DELETE FROM ligen WHERE ligaId = '$ligaId'"); 

    $loeschen = mysqli_query($db, "DELETE FROM `liga-verein` WHERE ligaId = '$ligaId'");

    $loeschen = mysqli_query($db, "DELETE spiele FROM spiele
                                   INNER JOIN spieltage ON spieltage.spieltagId = spiele.spieltagId
                                   WHERE spieltage.ligaId = '$ligaId'"); 

    $loeschen = mysqli_query($db, "DELETE FROM spieltage WHERE ligaId = '$ligaId'");

    header('location: ../index.php?erfolg=Du+hast+die+Liga+erfolgreich+gelöscht')
?>