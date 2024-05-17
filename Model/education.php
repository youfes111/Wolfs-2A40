<?php

class education{

    private int $ID_EDUCATION;
    private string $photo;
    private string $Etat;
    private string $emplacement;
    private int $ID_Diplome_E;
    private int $ID_USER_E;

    public function  __construct() {
        $this->ID_EDUCATION=0;
        $this->photo="";
        $this->Etat="";
        $this->emplacement="";
        $this->ID_Diplome_E=0;
        $this->ID_USER_E=0;
    }
    public function getID_EDUCATION() {return  $this->ID_EDUCATION;}
    public function setID_EDUCATION($n) {$this->ID_EDUCATION =$n ;}

    public function getphoto() {return  $this->photo;}
    public function setphoto($n) {$this->photo =$n ;}
    public function getEtat(){ return   $this->Etat;}  
    public function setEtat($p){ $this->Etat = $p;}
    public function getemplacement() {return $this->emplacement;}
    public function setemplacement($e) {$this->emplacement = $e;}
    public function getID_Diplome_E() {return  $this->ID_Diplome_E;}
    public function setID_Diplome_E($n) {$this->ID_Diplome_E =$n ;}
    public function getID_USER_E() {return  $this->ID_USER_E;}
    public function setID_USER_E($n) {$this->ID_USER_E =$n ;}

}



?>