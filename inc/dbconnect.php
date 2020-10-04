<?php
	$db = mysqli_connect("localhost", "root", "", "liga-tabelle");
	if(!$db) {
	  exit("Verbindungsfehler: " . mysqli_connect_error());
	}
?>
