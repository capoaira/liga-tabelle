<?php
	$extension = strtolower(pathinfo($_FILES[$bildId]['name'], PATHINFO_EXTENSION));
	$bildBearbeitet = false;
	if (!empty($extension)) {
		$error = false;

		// Überprüfung der PB-Endung
		$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
		if(!in_array($extension, $allowed_extensions)) {
			$error = true;
		}
	
		// Überprüfung der PB-Größe
		$max_size = 5*1024*1024; // 5MB
		if($_FILES[$bildId]['size'] > $max_size) {
			$error = true;
		}

		// Überprüfung dass das Bild keine Fehler enthält
		if(function_exists('exif_imagetype')) { // Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
			$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
			$detected_type = exif_imagetype($_FILES[$bildId]['tmp_name']);
			if(!in_array($detected_type, $allowed_types)) {
				$error = true;
			}
		}

		//Pfad zum Upload
		$new_path = $upload_folder . $filename . '.' . $extension;
		
		if (!$error) {
			//Alles okay, verschiebe das PB an neuen Pfad
			if ($old_filename != $standartBild) unlink($upload_folder.$old_filename);
			move_uploaded_file($_FILES[$bildId]['tmp_name'], $new_path);
			$new_filename = $filename . '.' . $extension;
			$bildBearbeitet = true;
		}
	}
?>
