<?php

class Formation {
    protected $idlangue;
    protected $iduser;
    protected $idniveau;
    protected $duree;
    

    public function __construct() {
        $this->idlangue = "";
        $this->iduser = "";
        $this->idniveau = "";
        $this->duree = "";
  
    }
//getters
    public function getidlangue() {
        return $this->idlangue;
    }

    public function getiduser() {
        return $this->iduser;
    }
    

    public function getidniveau() {
        return $this->idniveau;
    }


    public function getduree() {
        return $this->duree;
    }

    
//setters

    public function setidlangue($idlangue) {
        $this->idlangue = $idlangue;
    }
    public function setiduser($iduser) {
        $this->iduser = $iduser;
    }
    public function setidniveau($idniveau) {
        $this->idniveau = $idniveau;
    }
    public function setduree($duree) {
        $this->duree = $duree;
    }
        
    
}
?>
