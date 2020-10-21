<?php
    function istMeineLiga($db, $meineId, $ligaId) {
        $istMeineLiga = false;
        $abfrage = mysqli_query($db, "SELECT erstelltVon FROM ligen WHERE ligaId='$ligaId'");
        if ($abfrage && $row=mysqli_fetch_object($abfrage)) {
            if ($row->erstelltVon == $meineId) $istMeineLiga = true;
        }
        return $istMeineLiga;
    }

    function istMeinVerein($db, $meineId, $vereinsId) {
        $istMeineVerein = false;
        $abfrage = mysqli_query($db, "SELECT erstelltVon FROM vereine WHERE vereinsId='$vereinsId'");
        if ($abfrage && $row=mysqli_fetch_object($abfrage)) {
            if ($row->erstelltVon == $meineId) $istMeineVerein = true;
        }
        return $istMeineVerein;
    }

    function getDatumInUseremFormat($datum) {
        $datum = explode(' ', $datum);
        if (isset($datum[1])) {
            $uhrzeit = explode(':', $datum[1]);
        }
        $datum = explode('-', $datum[0]);
        if (!isset($uhrzeit)) {
            return date('d.m.Y', mktime(0, 0, 0, $datum[1], $datum[2], $datum[0]));
        } else {
            return date('d.m.Y H:i \U\h\r', mktime($uhrzeit[0], $uhrzeit[1], 0, $datum[1], $datum[2], $datum[0]));
        }
    }
?>
