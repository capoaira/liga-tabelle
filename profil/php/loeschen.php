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

        $abfrage = mysqli_query($db, "SELECT logo FROM vereine WHERE erstelltVon = '$userId'");
        while ($verein = mysqli_fetch_object($abfrage)) {
            $logo = $verein->logo;
            if ($logo != 'keinLogo.png') unlink("../../img/vereine/$logo");
        }

    	$loeschen = mysqli_query($db, "DELETE vereine WHERE erstelltVon = '$userId'");

        $abfrage = mysqli_query($db, "SELECT logo FROM ligen WHERE erstelltVon = '$userId'");
        while ($liga = mysqli_fetch_object($abfrage)) {
            $logo = $liga->logo;
            if ($logo != 'keinLogo.png') unlink("../../img/ligen/$logo");
        }

        $loeschen = mysqli_query($db, "DELETE FROM ligen WHERE erstelltVon = '$userId'");

        $abfrage = mysqli_query($db, "SELECT profilbild FROM user WHERE userId = '$userId'");
        $row = mysqli_fetch_object($abfrage);
        $profilbild = $row->profilbild;
        if ($profilbild != 'keinPB.png') unlink("../../img/profile/$profilbild");

        $loeschen = mysqli_query($db, "DELETE FROM user WHERE userId = '$userId'");

        header('location: ../../admin.php?erfolg=Du+hast+den+Benutzer+erfolgreich+gelöscht');
    }
?>