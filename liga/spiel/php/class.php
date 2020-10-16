<?php 
    class Spiel {
        private $spielId;
        private $vereinsId;
        private $eigeneTore;
        private $gegenTore;

        function __construct($spiel, $isHeim) {
            $this->spielId = $spiel->spielId;
            if ($isHeim) {
                $this->vereinsId = $spiel->heimVerein;
                $this->eigeneTore = $spiel->heimVereinTore;
                $this->gegenTore = $spiel->auswaertsVereinTore;
            } else {
                $this->vereinsId = $spiel->auswaertsVerein;
                $this->eigeneTore = $spiel->auswaertsVereinTore;
                $this->gegenTore = $spiel->heimVereinTore;
            }
        }

        public function getEigeneTore() {
            return ($this->eigeneTore == -1 ? '-' : $this->eigeneTore);
        }

        public function getGegenTore() {
            return ($this->gegenTore == -1 ? '-' : $this->gegenTore);
        }
    }
?>
