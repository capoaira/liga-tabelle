<?php
    include('../../inc/dbconnect.php');
    session_start();
    $userId = $_SESSION["userId"];

    $abfrage = "SELECT profilbild FROM user WHERE userId = $userId";
    $abfragen = mysqli_query($db, $abfrage);
    if ($row = mysqli_fetch_object($abfragen)) {
        $profilbild = $row->profilbild;
        if ($profilbild != 'keinPB.png') unlink("../../img/profile/$profilbild");
    }

    $eintrag = "UPDATE user SET profilbild = 'keinPB.png' WHERE userId = $userId;";
    $eintragen = mysqli_query($db, $eintrag);

    header('location: ../index.php');
?>