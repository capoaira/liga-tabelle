<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $benutzername = trim($_POST["benutzername"]);
    $email = trim($_POST["email"]);
    $passwort = $_POST["passwort"];
    $passwortWdhl = $_POST["passwortWdhl"];

    $errorMsg = [];

    // Prüfen ob überall etwas angegeben wurde
    if ($benutzername == '' && $email == '' && $passwort == '' && $passwortWdhl == '' ) {
        array_push($errorMsg, 'Bitte fülle alle Felder aus.');
    }

    // Prüfen ob Nutzername schon vergeben ist
    $abfrage = "SELECT userId FROM user WHERE username = '$benutzername'";
    $ergebnis = mysqli_query($db, $abfrage);

    if ($ergebnis && $row=mysqli_fetch_object($ergebnis)) {
        array_push($errorMsg, 'Der Benutzername ist schon vergeben.');
    }

    // Prüfen ob Email schon vergeben ist
    $abfrage = "SELECT userId FROM user WHERE email = '$email'";
    $ergebnis = mysqli_query($db, $abfrage);

    if ($ergebnis && $row=mysqli_fetch_object($ergebnis)) {
        array_push($errorMsg, 'Die E-Mail Adresse ist schon vergeben.');
    }

    // Prüfen ob Email eine gültige Emailadresse ist
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errorMsg, 'Die eigegebene E-Mail ist keine E-Mail.');
    }

    // Prüfen ob das PW = Wdhl PW ist
    if ($passwort != $passwortWdhl) {
        array_push($errorMsg, 'Das wiederholte Passwort stimmt nicht mit dem Passwort überein.');
    }

    if (count($errorMsg) == 0) { // Alles richtig
        // PW Verschlüsseln
        $passwort = password_hash($passwort, PASSWORD_DEFAULT);
        
        // Eintrag in Datanbank
        $eintrag = "INSERT INTO user (username, email, passwort, profilbild, status)
                    VALUES ('$benutzername', '$email', '$passwort', 'keinPB.png', 'member')";
        $eintragen = mysqli_query($db, $eintrag);

        header('location: ../login.php?registriert=erfolgreich');
    } else {
        header('location: ../registrieren.php?errorMsg=' . join('<br>', $errorMsg));
    }
?>