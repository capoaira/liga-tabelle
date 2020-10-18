<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    if (isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {

        $userId = $_GET['user'];

        $loeschen = mysqli_query($db, "DELETE spiele FROM spiele
                                       INNER JOIN spieltage ON spieltage.spieltagId = spiele.spieltagId
                                       INNER JOIN ligen ON spieltage.ligaId = ligen.ligaId
                                       WHERE ligen.erstelltVon = '$userId'");

        $loeschen = mysqli_query($db, "DELETE spieltage FROM spieltage
                                       INNER JOIN ligen ON spieltage.ligaId = ligen.ligaId
                                       WHERE ligen.erstelltVon = '$userId'");

        $loeschen = mysqli_query($db, "DELETE `liga-verein` FROM `liga-verein`
                                       INNER JOIN ligen ON `liga-verein`.ligaId = ligen.ligaId
                                       WHERE ligen.erstelltVon = '$userId'");

    	$loeschen = mysqli_query($db, "DELETE vereine WHERE erstelltVon = '$userId'";

        $loeschen = mysqli_query($db, "DELETE FROM ligen WHERE erstelltVon = '$userId'"); 

        $loeschen = mysqli_query($db, "DELETE FROM user WHERE userId = '$userId'");

        header('location: ../../admin.php?erfolg=Du+hast+den+Benutzer+erfolgreich+gelöscht');
    }
?>