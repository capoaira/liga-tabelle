<?php
	$extension = strtolower(pathinfo($_FILES['pb_bearbeiten']['name'], PATHINFO_EXTENSION));
	$bildBearbeitet = false;
	if (!empty($extension)) {
		$upload_folder = $zurueckZumStartOrdner.'img/profile/'; //Das Upload-Verzeichnis
		$filename = $userId;
		$pb_error = false;

		// Überprüfung der PB-Endung
		$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
		if(!in_array($extension, $allowed_extensions)) {
			$pb_error = true;
		}
	
		// Überprüfung der PB-Größe
		$max_size = 5*1024*1024; // 5MB
		if($_FILES['pb_bearbeiten']['size'] > $max_size) {
			$pb_error = true;
		}

		// Überprüfung dass das Bild keine Fehler enthält
		if(function_exists('exif_imagetype')) { // Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
			$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
			$detected_type = exif_imagetype($_FILES['pb_bearbeiten']['tmp_name']);
			if(!in_array($detected_type, $allowed_types)) {
				$pb_error = true;
			}
		}

		//Pfad zum Upload
		$new_path = $upload_folder . $filename . '.' . $extension;
		
		if (!$pb_error) {
			//Alles okay, verschiebe das PB an neuen Pfad
			if ($pb_filename != 'keinPB.png') unlink($zurueckZumStartOrdner."img/profile/$pb_filename");
			move_uploaded_file($_FILES['pb_bearbeiten']['tmp_name'], $new_path);
			$pb_filename = $filename . '.' . $extension;
			$bildBearbeitet = true;
		}
	}
?>
