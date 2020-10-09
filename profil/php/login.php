<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    $benutzername = trim($_POST["benutzername"]);
    $passwort = $_POST["passwort"];

    $errorMsg = [];

    // Prüfen ob überall etwas angegeben wurde
    if ($benutzername == '' && $passwort == '') {
        array_push($errorMsg, 'Bitte fülle alle Felder aus.');
    }

    // Prüfen ob Nutzername schon vergeben ist
    $abfrage = "SELECT userId, username, passwort, status FROM user WHERE username = '$benutzername'";
    $ergebnis = mysqli_query($db, $abfrage);

    if ($row=mysqli_fetch_object($ergebnis)) {
        $user_userId = $row->userId;
        $user_username = $row->username;
        $user_passwort = $row->passwort;
        $user_status = $row->status;
        
        if (password_verify($passwort, $user_passwort)) {
            $_SESSION['userId'] = $user_userId;
            $_SESSION['status'] = $user_status;
            $_SESSION['username'] = $user_username;
            header ('location: ../../index.php?erfolg=Du+wurdest+erfolgreich+angemeldet.');
        } else {
            header ('location: ../login.php?error=Passwort ist falsch.');
        }
    } else {
        header ('location: ../login.php?error=Username ist falsch.');
    }
?>