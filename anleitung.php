<?php
	require_once('inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Anleitung</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/anleitung.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
        <h1>Anleitung:</h1>
        <h2>Erstellen einer Liga:</h2>
        <p>Um eine neue Liga zu erstellen müssen Sie im Reiter „Liga“ den Unterpunkt „Liga erstellen“ anklicken. Auf der nun angezeigten Seite können Sie ihre Liga nach Ihren Vorstellungen erstellen.</p>
        <img src="/ligatabelle/img/anleitung/liga-erstellen.png">
        <p>Sie müssen einen Namen wählen, ein Logo hochladen sowie eine kurze Beschreibung Ihrer Liga eingeben. Zusätzlich bieten wie Ihnen die Möglichkeit „Keywords“ einzugeben, anhand deren man später Ihre Liga schneller finden kann. Der Letzte Punkt beim Erstellen deiner Liga, ist das „Hinzufügen“ von Vereinen. Bereits erstellte Vereine können in dem Dropdownliste ausgewählt werden. Ist auch dieser Punkt abgeschlossen drücken die auf den Button Erstellen, um Ihre Liga schlussendlich zu erstellen. </p>
        <h2>Erstellen von Vereinen:</h2>
        <p>Wenn noch keine Vereine erstellt wurden, nutzen Sie wärend des Erstellens der Liga in der Dropdownliste den Punkt „Neuen Verein Erstellen“. Es öffnet sich ein Popup-Fenster, indem Sie die Vereinsdaten angeben können. </p>
        <img src="/ligatabelle/img/anleitung/verein-erstellen.png">
        <p>Sind Sie damit fertig, so klicken sie auf „Hinzufügen“. Ihr Verein wird nun automatisch Ihrer Liga zugeordnet. </p>
        <h2>Spieltage erstellen:</h2>
        <p>In der Ligaansicht finden Sie auf der rechten Seite die „Ersteller-Tools“. </p>
        <img src="/ligatabelle/img/anleitung/ersteller-tools.png">
        <p>Um einen neuen Spieltag zu erstellen, klicken Sie auf den Button „Neuer Spieltag“. Es öffnet sich ein Popup-Fenster, indem sie den Zeitraum des Spieltages angeben können. Klicken Sie nach Eingabe auf „Erstellen“. Ihr Spieltag wird mit entsprechender Nummerierung Ihrer Liga zugeordnet. </p>
        <p><span class="warnung">Achtung:</span><br>
        Die Spieltage werden nach eingegebenen Daten sortiert. Wenn Sie nachträglich das Datum bearbeiten, kann sich die Spieltagsreinfolge ändern. </p>
        <h2>Spiel erstellen:</h2>
        <p>Ein weiteres Tool im „Ersteller-Tools“ Bereich ist der Button „Neues Spiel“. Mit diesem können Sie ein neues Spiel erstellen und es einem Spieltag zuordnen. Dazu geben sie in dem Popup-Fenster den Heim-/Auswärtsverein sowie den gewünschten Spieltag, das Datum und die Uhrzeit des Spiels an. Mit dem Button „Erstellen“ fügen Sie das Spiel dem eingetragenen Spieltag hinzu. </p>
        <h2>Automatische Eingabe:</h2>
        <p>Mit dem Button „Generiere alle Spieltage und Spiele“ kannst du dir die lästige manuelle Eingabe aller Spieltage und Spiele sparen. In dem Popup-Fenster siehst du die die Anzahl der benötigten Spieltage. Trage nun für jeden Spieltag das entsprechende Datum ein und klicke auf „Siele Generieren“. Nun werden zu den Spieltagen automatisch alle Spielkombinationen erstellt und zufällig den Spieltagen zugeordnet, sodass jeder Verein an einem Spieltag nur einmal spielt. </p>


        <h2>Eintragen der Spielergebnisse:</h2>
        <p>Um die Ergebnisse eintragen zu können, klicken Sie auf in den „Ersteller Tools“ auf „Spieltage und Spiele“. Dort gibt es am rechten Rand der Spiele einen Button „Bearbeiten“, mit dem sich das Popup-Fenster öffnen lässt. Dort können sie in den entsprechenden Eingabefeldern die gespielten Ergebnisse eintragen. </p>
        <h2>Haben Sie etwas vergessen? </h2>
        <p> Kein Problem. Sie können alle Ligen, Vereine, Spieltage und Spiele jederzeit bearbeiten und Änderungen vornehmen. Klicken Sie dazu einfach auf das „Bearbeiten-Symbol“ <img src="/ligatabelle/img/bearbeiten.png" class="img_btn">.</p>


		</div>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>
