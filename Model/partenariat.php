<?php


require("C:/xampp/htdocs/projet_v5/config/connexion.php");

class Partenariat {
    protected $IDpart;
    protected $NomPart;
    protected $pays;
    protected $adresse;
    protected $EmailPart;

    public function __construct() {
        $this->IDpart = "";
        $this->NomPart = "";
        $this->pays = "";
        $this->adresse = "";
        $this->EmailPart = "";
    }
//getters
    public function getIDpart() {
        return $this->IDpart;
    }

    public function getNomPart() {
        return $this->NomPart;
    }
    

    public function getPays() {
        return $this->pays;
    }


    public function getAdresse() {
        return $this->adresse;
    }

    public function getEmailPart() {
        return $this->EmailPart;
    }
//setters

    public function setIDpart($IDpart) {
        $this->IDpart = $IDpart;
    }
    public function setNomPart($NomPart) {
        $this->NomPart = $NomPart;
    }
    public function setPays($pays) {
        $this->pays = $pays;
    }
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
    public function setEmailPart($EmailPart) {
        $this->EmailPart = $EmailPart;
    }
    public static function listpartenariat()
    {
        $access = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "root", "");
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        try{
            $query=$access->prepare("SELECT * FROM partenariat");
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
