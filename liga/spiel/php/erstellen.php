<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_POST['ligaId'];
    $heim = $_POST['heimverein'];
    $ausw = $_POST['auswaertsverein'];
    $spiltag = $_POST['spieltag'];

    if (isset($_POST['ligaId']) && $heim != 'default' && $ausw != 'default' && $spiltag != 'default' && $heim != $ausw) {
        $eintrag = "INSERT INTO spiele (heimVerein, heimVereinTore, auswaertsVerein, auswaertsVereinTore, spieltagId)
                    VALUES ('$heim', '-1', '$ausw', '-1', '$spiltag')";
        $eintragen = mysqli_query($db, $eintrag);
        header("location: ../../index.php?liga=$ligaId&erfolg=Spiel+wurde+erstellt");
    } else {
        header("location: ../../index.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>