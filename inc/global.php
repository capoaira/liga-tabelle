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
?>
