<?php

class Reclamation {
    protected $IDrec;
    protected $IDuser;
    protected $Daterec;
    protected $Descrec;
    protected $Typerec;
    protected $Statut;

    public function __construct() {
        $this->IDrec = "";
        $this->IDuser = "";
        $this->Daterec = "";
        $this->Descrec = "";
        $this->Typerec = "";
        $this->Statut = "";
    }
//getters
    public function getIDrec() {
        return $this->IDrec;
    }

    public function getIDuser() {
        return $this->IDuser;
    }
    

    public function getDaterec() {
        return $this->Daterec;
    }


    public function getDescrec() {
        return $this->Descrec;
    }

    public function getTyperec() {
        return $this->Typerec;

    }
    
    public function getStatut() {
        return $this->Statut;
    }
//setters

    public function setIDrec($IDrec) {
        $this->IDrec = $IDrec;
    }
    public function setIDuser($IDuser) {
        $this->IDuser = $IDuser;
    }
    public function setDaterec($Daterec) {
        $this->Daterec = $Daterec;
    }
    public function setDescrec($Descrec) {
        $this->Descrec = $Descrec;
    }
    public function setTyperec($Typerec) {
        $this->Typerec = $Typerec;
    }
    public function setStatut($Statut) {
        $this->Statut = $Statut;
    }
    public static function listrec()
    {
        $access = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "root", "");
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        try{
            $query=$access->prepare("SELECT * FROM reponse  RIGHT JOIN reclamationsss ON reponse.IDrec = reclamationsss.IDrec;");
            $query->execute();
            $data=$query->fetchAll();
        }
     catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    return $data ;
    }
}
?>
