<?php
    require_once('../../../inc/dbconnect.php');
    session_start();

    $ligaId = $_POST['ligaId'];
    $heim = $_POST['heimverein'];
    $ausw = $_POST['auswaertsverein'];
    $datum = $_POST['date'].' '.$_POST['time'];
    $spieltag = $_POST['spieltag'];

    if (isset($_POST['ligaId']) && $heim != 'default' && $ausw != 'default' && $spieltag != 'default' && $heim != $ausw) {
        $eintrag = "INSERT INTO spiele (heimVerein, heimVereinTore, auswaertsVerein, auswaertsVereinTore, datum, spieltagId)
                    VALUES ('$heim', '-1', '$ausw', '-1', '$datum', '$spieltag')";
        $eintragen = mysqli_query($db, $eintrag);
        header("location: ../../index.php?liga=$ligaId&erfolg=Spiel+wurde+erstellt");
    } else {
        header("location: ../../index.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>