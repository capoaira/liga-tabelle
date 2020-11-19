<?php
    include('spiel/php/class.php');
    class Verein {
        private $db;            // Datenbankobjekt muss übergeben werden
        private $vereinsId;     // id des Vereins
        private $name;          // Name des Vereins
        private $beschreibung;  // Vereinsbeschreibung
        private $logo;          // Vereinslogo
        private $erstelltVon;   // id des Erstellers des Vereins
        private $ligaId;        // id der Liga in der sich der Verein gerade befindet
        private $spiele;        // Array mit allen Spielen des Vereins

        function __construct($verein, $ligaId, $db) {
            // Im Konstukter werden den Attributen Werten zugeordnet
            $this->ligaId = $ligaId;
            $this->db = $db;
            $this->spiele = [];
            $this->vereinsId = $verein->vereinsId;
            $this->name = $verein->name;
            $this->beschreibung = $verein->beschreibung;
            $this->logo = $verein->logo;
            $this->erstelltVon = $verein->erstelltVon;
            // Um das Array zu füllen müssen die Spiele vereinheitlicht werden
            $this->addHeimSpiele();
            $this->addAuswaetsSpiele();
        }

        // Funktion zur Ausgabe der Tabellenzeilen
        public function getTDs() {
            echo "  <td>{$this->getLogoImg()}</td>";
            echo "  <td><a href=\"verein/index.php?verein={$this->getVereinsId()}\">{$this->name}</a></td>";
            echo "  <td>{$this->getSpiele()}</td>";
            echo "  <td>{$this->getPunkte()}</td>";
            echo "  <td>{$this->getEigeneTore()}</td>";
            echo "  <td class=\"desktop-only\">{$this->getGegenTore()}</td>";
            echo "  <td>{$this->getTorDiff()}</td>";
        }

        // Get - Methoden
        /* Klasse Spiel:
         * Die Klasse Spiel vereinheitlich die Spiele indem sie nicht mehr ein Heim- und Auswärts-
         * Tore unterscheidet, sondern in Eigene und Gegentore
         * Dazu müssen die Heim- und Auswärtsspiele erstmal getrennt aufgerufen werden
        */
        private function addHeimSpiele() {
            $abfrage = "SELECT spiele.spielId, spiele.heimVerein, spiele.heimVereinTore, spiele.auswaertsVereinTore
                        FROM spiele, spieltage, ligen
                        WHERE heimVerein = $this->vereinsId
                        AND spiele.spieltagId = spieltage.spieltagId
                        AND heimVereinTore >= 0 AND auswaertsVereinTore >= 0
                        AND spieltage.ligaId = $this->ligaId
                        AND ligen.ligaId = $this->ligaId";
            $abfragen = mysqli_query($this->db, $abfrage);
            while ($abfragen && $row=mysqli_fetch_object($abfragen)) {
                array_push($this->spiele, new Spiel($row, true));
            }
        }
        private function addAuswaetsSpiele() {
            $abfrage = "SELECT spiele.spielId, spiele.auswaertsVerein, spiele.auswaertsVereinTore, spiele.heimVereinTore
                        FROM spiele, spieltage, ligen
                        WHERE auswaertsVerein = $this->vereinsId
                        AND spiele.spieltagId = spieltage.spieltagId
                        AND heimVereinTore >= 0 AND auswaertsVereinTore >= 0
                        AND spieltage.ligaId = $this->ligaId
                        AND ligen.ligaId = $this->ligaId";
            $abfragen = mysqli_query($this->db, $abfrage);
            while ($abfragen && $row=mysqli_fetch_object($abfragen)) {
                array_push($this->spiele, new Spiel($row, false));
            }
        }

        public function getEigeneTore() {
            $tore = 0;
            for ($i=0; $i<count($this->spiele); $i++) {
                $tore += $this->spiele[$i]->getEigeneTore();
            }
            return $tore;
        }

        public function getGegenTore() {
            $tore = 0;
            for ($i=0; $i<count($this->spiele); $i++) {
                $tore += $this->spiele[$i]->getGegenTore();
            }
            return $tore;
        }

        public function getPunkte() {
            $punkte = 0;
            for ($i=0; $i<count($this->spiele); $i++) {
                $spiel = $this->spiele[$i];
                if ($spiel->getEigeneTore() - $spiel->getGegenTore() > 0) $punkte += 3;
                elseif ($spiel->getEigeneTore() - $spiel->getGegenTore() == 0) $punkte++;
            }
            return $punkte;
        }

        public function getTorDiff() {
            return $this->getEigeneTore() - $this->getGegenTore();
        }

        public function getSpiele() {
            return count($this->spiele);
        }

        /*
         * static damit die funktion auch ohne Object aufgerufen werden kann
         * $a und $b sind vom Type Verein
         * Wenn die Bedingung (z.B. Punkte) ungleich ist wird überprüft welcher Verein mehr
         * Punkte hat. Dieser wird um einen Platz nach oben, bzw. der mit weniger
         * einen nach unten in der Liste verschoben.
         */
        public static function sort($a, $b) {
            if ($a->getPunkte() != $b->getPunkte()) {                       // Punkte
                return ($a->getPunkte() < $b->getPunkte() ? 1 : -1);
            } elseif ($a->getTorDiff() != $b->getTorDiff()) {               // Tor Differenz
                return ($a->getTorDiff() < $b->getTorDiff() ? 1 : -1);
            } elseif ($a->getEigeneTore() != $b->getEigeneTore()) {         // Meißten Tore
                return ($a->getEigeneTore() < $b->getEigeneTore() ? 1 : -1);
            } else {
                return 0;
            }
        }

        // Get - Methoden für Attribute
        public function getVereinsId() {
            return $this->vereinsId;
        }

        public function getName() {
            return $this->name;
        }

        public function getBeschreibung() {
            return $this->beschreibung;
        }

        public function getLogoImg() {
            return '<img src="/ligatabelle/img/vereine/'.$this->logo.'" title="'.$this->name.'">';
        }

        public function getLogoSrc() {
            return $this->logo;
        }

        public function getErstelltVon() {
            return $this->erstelltVon;
        }
    }
?>
