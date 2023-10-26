<?php
error_reporting(0); // Quick & Dirty fix For bplaced, so that `header('location : ...');` works
$db = mysqli_connect("localhost", "root", "", "capoaira_ligatabelle");
if (!$db) {
	exit("Verbindungsfehler: " . mysqli_connect_error());
}
