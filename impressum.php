<?php
	require_once('inc/dbconnect.php');
	session_start();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/ligatabelle/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/ligatabelle/css/style.css">
		<link rel="stylesheet" href="/ligatabelle/css/home.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
		<meta name="description" content="">
		<meta name="keywords" content="">
        <style>
            h2 {
                margin: 1em 0
            }
            ul {
                padding-left: 2em;
            }
        </style>
	</head>
	<body>
		<?php include_once('inc/header.php') ?>
		<div id="content">
			<?php
				if (isset($_GET['erfolg'])) {
					echo '<p class="erfolg">'.$_GET['erfolg'].'</p>';
				}
			?>
			<h1>Impressum</h1>
            <p>Informationspflicht laut § 5 TMG.</p>
            <p>
            <p>Jannes Balscheit und Sören Gerdts</p>
            <p>Hemmstr 278, <br />28215 Bremen, <br />Deutschland</p>
            <p>
                <strong>Tel.:</strong>+49 1578 1058440<br />
                <strong>E-Mail:</strong> <a target="_blank" href="mailto:jannes-ball@web.de">jannes-ball@web.de</a>
            </p>
            <p style="margin-top:15px;">Quelle: Erstellt mit dem <a title="Impressum Generator Deutschland" href="https://www.adsimple.de/impressum-generator/" target="_blank" rel="follow" style="text-decoration:none;">Impressum Generator</a> von AdSimple in Kooperation mit <a target="_blank" href="https://www.hashtagbeauty.de" target="_blank" rel="follow" title="">hashtagbeauty.de</a>
            </p>
            <h2>EU-Streitschlichtung</h2>
            <p>Gemäß Verordnung über Online-Streitbeilegung in Verbraucherangelegenheiten (ODR-Verordnung) möchten wir Sie über die Online-Streitbeilegungsplattform (OS-Plattform) informieren.<br />
            Verbraucher haben die Möglichkeit, Beschwerden an die Online Streitbeilegungsplattform der Europäischen Kommission unter <a target="_blank" href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&amp;lng=DE" target="_blank" rel="noopener">http://ec.europa.eu/odr?tid=321226366</a> zu richten. Die dafür notwendigen Kontaktdaten finden Sie oberhalb in unserem Impressum.</p>
            <p>Wir möchten Sie jedoch darauf hinweisen, dass wir nicht bereit oder verpflichtet sind, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
            <h2>Haftung für Inhalte dieser Website</h2>
            <p>Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen uns korrekte und aktuelle Informationen bereitzustellen. Laut Telemediengesetz <a target="_blank" href="https://www.gesetze-im-internet.de/tmg/__7.html?tid=321226366" rel="noopener" target="_blank">(TMG) §7 (1)</a> sind wir als Diensteanbieter für eigene Informationen, die wir zur Nutzung bereitstellen, nach den allgemeinen Gesetzen verantwortlich. Leider können wir keine Haftung für die Korrektheit aller Inhalte auf dieser Webseite übernehmen, speziell für jene die seitens Dritter bereitgestellt wurden. Als Diensteanbieter im Sinne der §§ 8 bis 10 sind wir nicht verpflichtet, die von ihnen übermittelten oder gespeicherten Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
            <p>Unsere Verpflichtungen zur Entfernung von Informationen oder zur Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen aufgrund von gerichtlichen oder behördlichen Anordnungen bleiben auch im Falle unserer Nichtverantwortlichkeit nach den §§ 8 bis 10 unberührt. </p>
            <p>Sollten Ihnen problematische oder rechtswidrige Inhalte auffallen, bitte wir Sie uns umgehend zu kontaktieren, damit wir die rechtswidrigen Inhalte entfernen können. Sie finden die Kontaktdaten im Impressum.</p>
            <h2>Haftung für Links auf dieser Website</h2>
            <p>Unsere Webseite enthält Links zu anderen Webseiten für deren Inhalt wir nicht verantwortlich sind. Haftung für verlinkte Websites besteht für uns nicht, da wir keine Kenntnis rechtswidriger Tätigkeiten hatten und haben, uns solche Rechtswidrigkeiten auch bisher nicht aufgefallen sind und wir Links sofort entfernen würden, wenn uns Rechtswidrigkeiten bekannt werden.</p>
            <p>Wenn Ihnen rechtswidrige Links auf unserer Website auffallen, bitte wir Sie uns zu kontaktieren. Sie finden die Kontaktdaten im Impressum.</p>
            <h2>Urheberrechtshinweis</h2>
            <p>Alle Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem Urheberrecht der Bundesrepublik Deutschland. Bitte fragen Sie uns bevor Sie die Inhalte dieser Website verbreiten, vervielfältigen oder verwerten wie zum Beispiel auf anderen Websites erneut veröffentlichen. Falls notwendig, werden wir die unerlaubte Nutzung von Teilen der Inhalte unserer Seite rechtlich verfolgen.</p>
            <p>Sollten Sie auf dieser Webseite Inhalte finden, die das Urheberrecht verletzen, bitten wir Sie uns zu kontaktieren.</p>
            <h2>Bildernachweis</h2>
            <p>Danke an <a target="_blank" href="https://pixabay.com">Pixabay</a> für die Bilder<br>
            Besonderen Dank:</p>
            <ul>
                <li>User <a target="_blank" href="https://pixabay.com/de/users/io-images-1096650/">IO-Images</a></li>
                <li>User <a target="_blank" href="https://pixabay.com/de/users/jorono-1966666/">jorono</a></li>
            </ul>
            <h1>Datenschutzerklärung</h1>
            <h2>Datenschutz</h2>
            <p>Wir haben diese Datenschutzerklärung (Fassung 29.10.2020-321226366) verfasst, um Ihnen gemäß der Vorgaben der <a target="_blank" href="https://eur-lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679&amp;tid=321226366" target="_blank" rel="noopener">Datenschutz-Grundverordnung (EU) 2016/679</a> zu erklären, welche Informationen wir sammeln, wie wir Daten verwenden und welche Entscheidungsmöglichkeiten Sie als Besucher dieser Webseite haben.</p>
            <p>Leider liegt es in der Natur der Sache, dass diese Erklärungen sehr technisch klingen, wir haben uns bei der Erstellung jedoch bemüht die wichtigsten Dinge so einfach und klar wie möglich zu beschreiben.</p>
            <h2>Automatische Datenspeicherung</h2>
            <p>Wenn Sie heutzutage Webseiten besuchen, werden gewisse Informationen automatisch erstellt und gespeichert, so auch auf dieser Webseite.</p>
            <p>Wenn Sie unsere Webseite so wie jetzt gerade besuchen, speichert unser Webserver (Computer auf dem diese Webseite gespeichert ist) automatisch Daten wie</p>
            <ul>
            <li>die Adresse (URL) der aufgerufenen Webseite</li>
            <li>Browser und Browserversion</li>
            <li>das verwendete Betriebssystem</li>
            <li>die Adresse (URL) der zuvor besuchten Seite (Referrer URL)</li>
            <li>den Hostname und die IP-Adresse des Geräts von welchem aus zugegriffen wird</li>
            <li>Datum und Uhrzeit</li>
            </ul>
            <p>in Dateien (Webserver-Logfiles).</p>
            <p>In der Regel werden Webserver-Logfiles zwei Wochen gespeichert und danach automatisch gelöscht. Wir geben diese Daten nicht weiter, können jedoch nicht ausschließen, dass diese Daten beim Vorliegen von rechtswidrigem Verhalten eingesehen werden.</p>
            <h2>Cookies</h2>
            <p>Unsere Website verwendet HTTP-Cookies um nutzerspezifische Daten zu speichern.<br />
            Im Folgenden erklären wir, was Cookies sind und warum Sie genutzt werden, damit Sie die folgende Datenschutzerklärung besser verstehen.</p>
            <h3>Was genau sind Cookies?</h3>
            <p>Immer wenn Sie durch das Internet surfen, verwenden Sie einen Browser. Bekannte Browser sind beispielsweise Chrome, Safari, Firefox, Internet Explorer und Microsoft Edge. Die meisten Webseiten speichern kleine Text-Dateien in Ihrem Browser. Diese Dateien nennt man Cookies.</p>
            <p>Eines ist nicht von der Hand zu weisen: Cookies sind echt nützliche Helferlein. Fast alle Webseiten verwenden Cookies. Genauer gesprochen sind es HTTP-Cookies, da es auch noch andere Cookies für andere Anwendungsbereiche gibt. HTTP-Cookies sind kleine Dateien, die von unserer Website auf Ihrem Computer gespeichert werden. Diese Cookie-Dateien werden automatisch im Cookie-Ordner, quasi dem &#8220;Hirn&#8221; Ihres Browsers, untergebracht. Ein Cookie besteht aus einem Namen und einem Wert. Bei der Definition eines Cookies müssen zusätzlich ein oder mehrere Attribute angegeben werden.</p>
            <p>Cookies speichern gewisse Nutzerdaten von Ihnen, wie beispielsweise Sprache oder persönliche Seiteneinstellungen. Wenn Sie unsere Seite wieder aufrufen, übermittelt Ihr Browser die „userbezogenen“ Informationen an unsere Seite zurück. Dank der Cookies weiß unsere Website, wer Sie sind und bietet Ihnen Ihre gewohnte Standardeinstellung. In einigen Browsern hat jedes Cookie eine eigene Datei, in anderen wie beispielsweise Firefox sind alle Cookies in einer einzigen Datei gespeichert.</p>
            <p>Es gibt sowohl Erstanbieter Cookies als auch Drittanbieter-Cookies. Erstanbieter-Cookies werden direkt von unserer Seite erstellt, Drittanbieter-Cookies werden von Partner-Webseiten (z.B. Google Analytics) erstellt. Jedes Cookie ist individuell zu bewerten, da jedes Cookie andere Daten speichert. Auch die Ablaufzeit eines Cookies variiert von ein paar Minuten bis hin zu ein paar Jahren. Cookies sind keine Software-Programme und enthalten keine Viren, Trojaner oder andere „Schädlinge“. Cookies können auch nicht auf Informationen Ihres PCs zugreifen.</p>
            <p>So können zum Beispiel Cookie-Daten aussehen:</p>
            <ul>
            <li>Name: _ga</li>
            <li>Ablaufzeit: 2 Jahre</li>
            <li>Verwendung: Unterscheidung der Webseitenbesucher</li>
            <li>Beispielhafter Wert: GA1.2.1326744211.152321226366</li>
            </ul>
            <p>Ein Browser sollte folgende Mindestgrößen unterstützen:</p>
            <ul>
            <li>Ein Cookie soll mindestens 4096 Bytes enthalten können</li>
            <li>Pro Domain sollen mindestens 50 Cookies gespeichert werden können</li>
            <li>Insgesamt sollen mindestens 3000 Cookies gespeichert werden können</li>
            </ul>
            <h3>Welche Arten von Cookies gibt es?</h3>
            <p>Die Frage welche Cookies wir im Speziellen verwenden, hängt von den verwendeten Diensten ab und wird in der folgenden Abschnitten der Datenschutzerklärung geklärt. An dieser Stelle möchten wir kurz auf die verschiedenen Arten von HTTP-Cookies eingehen.</p>
            <p>Man kann 4 Arten von Cookies unterscheiden:</p>
            <p>
            <strong>Unbedingt notwendige Cookies<br />
            </strong>Diese Cookies sind nötig, um grundlegende Funktionen der Website sicherzustellen. Zum Beispiel braucht es diese Cookies, wenn ein User ein Produkt in den Warenkorb legt, dann auf anderen Seiten weitersurft und später erst zur Kasse geht. Durch diese Cookies wird der Warenkorb nicht gelöscht, selbst wenn der User sein Browserfenster schließt.</p>
            <p>
            <strong>Funktionelle Cookies<br />
            </strong>Diese Cookies sammeln Infos über das Userverhalten und ob der User etwaige Fehlermeldungen bekommt. Zudem werden mithilfe dieser Cookies auch die Ladezeit und das Verhalten der Website bei verschiedenen Browsern gemessen.</p>
            <p>
            <strong>Zielorientierte Cookies<br />
            </strong>Diese Cookies sorgen für eine bessere Nutzerfreundlichkeit. Beispielsweise werden eingegebene Standorte, Schriftgrößen oder Formulardaten gespeichert.</p>
            <p>
            <strong>Werbe-Cookies<br />
            </strong>Diese Cookies werden auch Targeting-Cookies genannt. Sie dienen dazu dem User individuell angepasste Werbung zu liefern. Das kann sehr praktisch, aber auch sehr nervig sein.</p>
            <p>Üblicherweise werden Sie beim erstmaligen Besuch einer Webseite gefragt, welche dieser Cookiearten Sie zulassen möchten. Und natürlich wird diese Entscheidung auch in einem Cookie gespeichert.</p>
            <h3>Wie kann ich Cookies löschen?</h3>
            <p>Wie und ob Sie Cookies verwenden wollen, entscheiden Sie selbst. Unabhängig von welchem Service oder welcher Website die Cookies stammen, haben Sie immer die Möglichkeit Cookies zu löschen, nur teilweise zuzulassen oder zu deaktivieren. Zum Beispiel können Sie Cookies von Drittanbietern blockieren, aber alle anderen Cookies zulassen.</p>
            <p>Wenn Sie feststellen möchten, welche Cookies in Ihrem Browser gespeichert wurden, wenn Sie Cookie-Einstellungen ändern oder löschen wollen, können Sie dies in Ihren Browser-Einstellungen finden:</p>
            <p>
            <a target="_blank" href="https://support.google.com/chrome/answer/95647?tid=321226366" target="_blank" rel="noopener">Chrome: Cookies in Chrome löschen, aktivieren und verwalten</a>
            </p>
            <p>
            <a target="_blank" href="https://support.apple.com/de-at/guide/safari/sfri11471/mac?tid=321226366" target="_blank" rel="noopener">Safari: Verwalten von Cookies und Websitedaten mit Safari</a>
            </p>
            <p>
            <a target="_blank" href="https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen?tid=321226366" target="_blank" rel="noopener">Firefox: Cookies löschen, um Daten zu entfernen, die Websites auf Ihrem Computer abgelegt haben</a>
            </p>
            <p>
            <a target="_blank" href="https://support.microsoft.com/de-at/help/17442/windows-internet-explorer-delete-manage-cookies?tid=321226366" target="_blank" rel="noopener">Internet Explorer: Löschen und Verwalten von Cookies</a>
            </p>
            <p>
            <a target="_blank" href="https://support.microsoft.com/de-at/help/4027947/windows-delete-cookies?tid=321226366" target="_blank" rel="noopener">Microsoft Edge: Löschen und Verwalten von Cookies</a>
            </p>
            <p>Falls Sie grundsätzlich keine Cookies haben wollen, können Sie Ihren Browser so einrichten, dass er Sie immer informiert, wenn ein Cookie gesetzt werden soll. So können Sie bei jedem einzelnen Cookie entscheiden, ob Sie das Cookie erlauben oder nicht. Die Vorgangsweise ist je nach Browser verschieden. Am besten ist es Sie suchen die Anleitung in Google mit dem Suchbegriff “Cookies löschen Chrome” oder &#8220;Cookies deaktivieren Chrome&#8221; im Falle eines Chrome Browsers oder tauschen das Wort &#8220;Chrome&#8221; gegen den Namen Ihres Browsers, z.B. Edge, Firefox, Safari aus.</p>
            <h3>Wie sieht es mit meinem Datenschutz aus?</h3>
            <p>Seit 2009 gibt es die sogenannten „Cookie-Richtlinien“. Darin ist festgehalten, dass das Speichern von Cookies eine Einwilligung von Ihnen verlangt. Innerhalb der EU-Länder gibt es allerdings noch sehr unterschiedliche Reaktionen auf diese Richtlinien. In Deutschland wurden die Cookie-Richtlinien nicht als nationales Recht umgesetzt. Stattdessen erfolgte die Umsetzung dieser Richtlinie weitgehend in § 15 Abs.3 des Telemediengesetzes (TMG).</p>
            <p>Wenn Sie mehr über Cookies wissen möchten und technischen Dokumentationen nicht scheuen, empfehlen wir <a target="_blank" href="https://tools.ietf.org/html/rfc6265" target="_blank" rel="nofollow noopener">https://tools.ietf.org/html/rfc6265</a>, dem Request for Comments der Internet Engineering Task Force (IETF) namens &#8220;HTTP State Management Mechanism&#8221;.</p>
            <h2>Speicherung persönlicher Daten</h2>
            <p>Persönliche Daten, die Sie uns auf dieser Website elektronisch übermitteln, wie zum Beispiel Name, E-Mail-Adresse, Adresse oder andere persönlichen Angaben im Rahmen der Übermittlung eines Formulars oder Kommentaren im Blog, werden von uns gemeinsam mit dem Zeitpunkt und der IP-Adresse nur zum jeweils angegebenen Zweck verwendet, sicher verwahrt und nicht an Dritte weitergegeben.</p>
            <p>Wir nutzen Ihre persönlichen Daten somit nur für die Kommunikation mit jenen Besuchern, die Kontakt ausdrücklich wünschen und für die Abwicklung der auf dieser Webseite angebotenen Dienstleistungen und Produkte. Wir geben Ihre persönlichen Daten ohne Zustimmung nicht weiter, können jedoch nicht ausschließen, dass diese Daten beim Vorliegen von rechtswidrigem Verhalten eingesehen werden.</p>
            <p>Wenn Sie uns persönliche Daten per E-Mail schicken &#8211; somit abseits dieser Webseite &#8211; können wir keine sichere Übertragung und den Schutz Ihrer Daten garantieren. Wir empfehlen Ihnen, vertrauliche Daten niemals unverschlüsselt per E-Mail zu übermitteln.</p>
            <p>Die Rechtsgrundlage besteht nach <a target="_blank" href="https://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016R0679&amp;from=DE&amp;tid=321226366" target="_blank" rel="noopener">Artikel 6  Absatz 1 a DSGVO</a> (Rechtmäßigkeit der Verarbeitung) darin, dass Sie uns die Einwilligung zur Verarbeitung der von Ihnen eingegebenen Daten geben. Sie können diesen Einwilligung jederzeit widerrufen &#8211; eine formlose E-Mail reicht aus, Sie finden unsere Kontaktdaten im Impressum.</p>
            <h2>Rechte laut Datenschutzgrundverordnung</h2>
            <p>Ihnen stehen laut den Bestimmungen der DSGVO grundsätzlich die folgende Rechte zu:</p>
            <ul>
            <li>Recht auf Berichtigung (Artikel 16 DSGVO)</li>
            <li>Recht auf Löschung („Recht auf Vergessenwerden“) (Artikel 17 DSGVO)</li>
            <li>Recht auf Einschränkung der Verarbeitung (Artikel 18 DSGVO)</li>
            <li>Recht auf Benachrichtigung &#8211; Mitteilungspflicht im Zusammenhang mit der Berichtigung oder Löschung personenbezogener Daten oder der Einschränkung der Verarbeitung (Artikel 19 DSGVO)</li>
            <li>Recht auf Datenübertragbarkeit (Artikel 20 DSGVO)</li>
            <li>Widerspruchsrecht (Artikel 21 DSGVO)</li>
            <li>Recht, nicht einer ausschließlich auf einer automatisierten Verarbeitung — einschließlich Profiling — beruhenden Entscheidung unterworfen zu werden (Artikel 22 DSGVO)</li>
            </ul>
            <p>Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder Ihre datenschutzrechtlichen Ansprüche sonst in einer Weise verletzt worden sind, können Sie sich an die <a class="321226366" href="https://www.bfdi.bund.de" target="_blank" rel="noopener">Bundesbeauftragte für den Datenschutz und die Informationsfreiheit (BfDI)</a> wenden.</p>
            <h2>jQuery CDN Datenschutzerklärung</h2>
            <p>Um Ihnen unsere Website bzw. all unsere einzelnen Unterseiten (Webseiten) auf unterschiedlichen Geräten schnell und problemlos auszuliefern, nutzen wir Dienste von jQuery CDN des Unternehmens jQuery Foundation. jQuery wird über das Content Delivery Network (CDN) des amerikanischen Software-Unternehmens StackPath (LCC 2012 McKinney Ave. Suite 1100, Dallas, TX 75201, USA) verteilt. Durch diesen Dienst werden personenbezogene Daten von Ihnen gespeichert, verwaltet und verarbeitet.</p>
            <p>Ein Content Delivery Network (CDN) ist ein Netzwerk regional verteilter Server, die über das Internet miteinander verbunden sind. Durch dieses Netzwerk können Inhalte, speziell sehr große Dateien, auch bei großen Lastspitzen schnell ausgeliefert werden.</p>
            <p>jQuery nutzt JavaScript-Bibliotheken, um unsere Website-Inhalte zügig ausliefern zu können. Dafür lädt ein CDN-Server die nötigen Dateien. Sobald eine Verbindung zum CDN-Server aufgebaut ist, wird Ihre IP-Adresse erfasst und gespeichert. Das geschieht nur, wenn diese Daten nicht schon durch einen vergangenen Websitebesuch in Ihrem Browser gespeichert sind.</p>
            <p>In den Datenschutz-Richtlinien von StackPath wird ausdrücklich erwähnt, dass StackPath aggregierte und anonymisierte Daten von diversen Diensten (wie eben auch jQuery) für die Erweiterung der Sicherheit und für eigene Dienste benutzen. Diese Daten können Sie als Person allerdings nicht identifizieren.</p>
            <p>Wenn Sie nicht wollen, dass es zu dieser Datenübertragung kommt, haben Sie immer auch die Möglichkeit Java-Scriptblocker wie beispielsweise <a target="_blank" href="https://www.ghostery.com/de/" target="_blank" rel="follow noopener noreferrer">ghostery.com</a> oder <a target="_blank" href="https://noscript.net/" target="_blank" rel="follow noopener noreferrer">noscript.net</a> zu installieren. Sie können aber auch einfach in Ihrem Browser die Ausführung von JavaScript-Codes deaktivieren. Wenn Sie sich für die Deaktivierung von JavaScript-Codes entscheiden, verändern sich auch die gewohnten Funktionen. So wird beispielsweise eine Website nicht mehr so schnell geladen.</p>
            <p>StackPath ist aktiver Teilnehmer beim EU-U.S. Privacy Shield Framework, wodurch der korrekte und sichere Datentransfer persönlicher Daten geregelt wird. Mehr Informationen dazu finden Sie auf <a target="_blank" href="https://www.privacyshield.gov/participant?id=a2zt0000000CbahAAC&amp;status=Active" target="_blank" rel="follow noopener noreferrer">https://www.privacyshield.gov/participant?id=a2zt0000000CbahAAC&amp;status=Active</a>.<br />
            Mehr Informationen zum Datenschutz bei StackPath finden Sie unter <a target="_blank" href="https://www.stackpath.com/legal/privacy-statement/?tid=321226366" target="_blank" rel="noopener noreferrer">https://www.stackpath.com/legal/privacy-statement/</a> und zu jQuery unter <a target="_blank" href="https://openjsf.org/wp-content/uploads/sites/84/2019/11/OpenJS-Foundation-Privacy-Policy-2019-11-15.pdf" target="_blank" rel="follow noopener noreferrer">https://openjsf.org/wp-content/uploads/sites/84/2019/11/OpenJS-Foundation-Privacy-Policy-2019-11-15.pdf</a>.</p>
            <p style="margin-top:15px;">Quelle: Erstellt mit dem <a title="Datenschutz Generator Deutschland" href="https://www.adsimple.de/datenschutz-generator/" target="_blank" rel="follow" style="text-decoration:none;">Datenschutz Generator</a> von AdSimple in Kooperation mit <a target="_blank" href="https://www.justmed.de" target="_blank" rel="follow" title="">justmed.de</a>
            </p>
		</div>
		<?php include_once('inc/aside_neuste_ligen.php') ?>
		<?php include_once('inc/footer.php') ?>
	</body>
</html>