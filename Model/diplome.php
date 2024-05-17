<?php

class Diplome {
    private int $ID_DIPLOME;
    private string $nom;
    private string $document;
    private string $moyenne;
    private string $date_diplome;

    public function __construct() {
        $this->ID_DIPLOME = 0;
        $this->nom = "";
        $this->document = "";
        $this->moyenne = "";
        $this->date_diplome = date('Y-m-d');
    }

    public function getID_DIPLOME() {
        return $this->ID_DIPLOME;
    }

    public function setID_DIPLOME($n) {
        $this->ID_DIPLOME = $n;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($n) {
        $this->nom = $n;
    }

    public function getDocument() {
        return $this->document;
    }

    public function setDocument($d) {
        $this->document = $d;
    }

    public function getMoyenne() {
        return $this->moyenne;
    }

    public function setMoyenne($m) {
        $this->moyenne = $m;
    }

    public function getdate_diplome() {
        return $this->date_diplome;
    }

    public function setdate_diplome($d) {
        $this->date_diplome = $d;
    }
}


?>