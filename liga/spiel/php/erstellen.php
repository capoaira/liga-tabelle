<?php
    require_once('../../../inc/dbconnect.php'); // Anbindung an die Datenbank
    session_start();                            // Starte Session um auf Userdaten zugreifen zu können

    $ligaId = $_POST['ligaId'];                 // id der liga zu der das Spiel gehöhrt
    $heim = $_POST['heimverein'];               // Heim Manschaft
    $ausw = $_POST['auswaertsverein'];          // Auswärtsmanschaft
    $datum = $_POST['date'].' '.$_POST['time']; // Datum und Uhrzeit des Spiels
    $spieltag = $_POST['spieltag'];             // id des Spieltages zu der das Spiel gehört

    // Abfragen um falsche Eingaben zu vermeiden
    /* Bedingungen
     * 1. Die LigaId ist angegeben
     * 2./3. Heim- und Auswärtsverein muss angegben sein und darf nicht auf default
     *       also "Verein Auswählen" sein
     * 4. Der Spieltag muss angegeben sind und darf nicht auf default ("Spieltag auswählen) stehen
     * 5. Heim- und Auswärsverein dürfen nicht die selben sein
    */
    if (isset($_POST['ligaId']) && $heim != 'default' && $ausw != 'default' && $spieltag != 'default' && $heim != $ausw) {
        $eintrag = "INSERT INTO spiele (heimVerein, heimVereinTore, auswaertsVerein, auswaertsVereinTore, datum, spieltagId)
                    VALUES ('$heim', '-1', '$ausw', '-1', '$datum', '$spieltag')";
        $eintragen = mysqli_query($db, $eintrag);
        // Weiterleitung auf die Ligaseite mit Erfolgsmeldung
        header("location: ../../index.php?liga=$ligaId&erfolg=Spiel+wurde+erstellt");
    } else { // Bedingungen nicht erfüllt
        // Weiterleitung auf Ligaseite mit Fehlermeldung
        header("location: ../../index.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+korrekt+aus.");
    }
?>