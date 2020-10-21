<?php
    require_once('../../inc/dbconnect.php');
    session_start();

    require_once('../../inc/global.php');

    $ligaId = $_POST['ligaId'];
    $von = $_POST['von']??[];
    $bis = $_POST['bis']??[];

    if (isset($_POST['ligaId']) && isset($_SESSION['userId']) && istMeineLiga($db, $_SESSION['userId'], $ligaId) && count($von) == count($bis)) {
        // Lösche alle Spieltage und Spiele der Liga
        $loeschen = mysqli_query($db, "DELETE spiele FROM spiele
                                       INNER JOIN spieltage ON spieltage.spieltagId = spiele.spieltagId
                                       WHERE spieltage.ligaId = '$ligaId'"); 
        $loeschen = mysqli_query($db, "DELETE FROM spieltage WHERE ligaId = $ligaId");

        // Speichere Spieltage in DB
        for ($i=0; $i<count($von); $i++) {
            $eintragen = mysqli_query($db, "INSERT INTO spieltage (von, bis, ligaId) VALUES ('$von[$i]', '$von[$i]', '$ligaId')");
        }

        // Frage Vereine der Liga in DB ab
        $abfrage = mysqli_query($db, "SELECT vereinsId FROM `liga-verein` WHERE ligaId = $ligaId ORDER BY vereinsId");
        $vereine = [];
        while ($row = mysqli_fetch_object($abfrage)) {
            array_push($vereine, $row->vereinsId);
        }
        if (count($vereine)%2 == 1) { // Platzhalter für Ligen mit ungerader Anzahl an Vereinen.
            array_push($vereine, 0);
        }
        $anzahlVereine = count($vereine);

        // Frage Spietage der Liga in DB ab
        $abfrage = mysqli_query($db, "SELECT spieltagId FROM spieltage WHERE ligaId = $ligaId ORDER BY von");
        $spieltage = [];
        while ($row = mysqli_fetch_object($abfrage)) {
            array_push($spieltage, $row->spieltagId);
        }

        $spieltageArray = [];
        $matches = [];
        for ($s=1; $s<=count($spieltage)/2; $s++) {
            $spieltageArray[$s] = [
                'vereine' => [],
                'matches' => []
            ];
            for ($h=0; $h<$anzahlVereine; $h++) {
                for ($a=0; $a<$anzahlVereine; $a++) {
                    if (
                        $h != $a &&
                        !in_array($h, $spieltageArray[$s]['vereine']) &&
                        !in_array($a, $spieltageArray[$s]['vereine']) &&
                        !in_array([
                            'ausw' => $a,
                            'heim' => $h
                        ], $matches) &&
                        !in_array([
                            'ausw' => $h,
                            'heim' => $a
                        ], $matches)
                    ) {
                        array_push($spieltageArray[$s]['vereine'], $h);
                        array_push($spieltageArray[$s]['vereine'], $a);
                        $heim = $vereine[$h];
                        $ausw = $vereine[$a];
                        if ($heim != 0 && $ausw != 0) { // Wenn der Platzhalter betroffen ist, wird kein Eintrag vorgenommen.
                            array_push($matches, [
                                'heim' => $h,
                                'ausw' => $a
                            ]);
                            array_push($spieltageArray[$s]['matches'], [
                                'heim' => $h,
                                'ausw' => $a
                            ]);
                            $spieltag = $spieltage[$s-1];
                            $eintrag = mysqli_query($db, "INSERT INTO spiele (heimVerein, heimVereinTore, auswaertsVerein, auswaertsVereinTore, datum, spieltagId)
                                                          VALUES ('$heim', '-1', '$ausw', '-1', '0000-00-00 00:00:00', '$spieltag')");
                        }
                    }
                }
            }
        }
        for ($s=1; $s<=count($spieltage)/2; $s++) {
            for ($i=0; $i<count($spieltageArray[$s]['matches']); $i++) {
                $h = $spieltageArray[$s]['matches'][$i]['ausw'];
                $a = $spieltageArray[$s]['matches'][$i]['heim'];
                $spieltag = $spieltage[$s-1 + count($spieltage)/2];
                $heim = $vereine[$h];
                $ausw = $vereine[$a];
                $eintrag = mysqli_query($db, "INSERT INTO spiele (heimVerein, heimVereinTore, auswaertsVerein, auswaertsVereinTore, datum, spieltagId)
                                              VALUES ('$heim', '-1', '$ausw', '-1', '0000-00-00 00:00:00', '$spieltag')");
            }
        }
        header("location: ../spieltag/alle.php?liga=$ligaId&erfolg=Die+Spieltage+und+Spiele+wurden+erstellt.");
    } else {
        header("location: ../index.php?liga=$ligaId&error=Bitte+fülle+alle+Felder+Korrekt+aus.");
    }
?>