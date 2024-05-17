<?php


require("C:/xampp/htdocs/projet_v5/config/connexion.php");

class Offre {
    protected $IDoffre;
    protected $programme;
    protected $domaine;
    protected $niveau;
    protected $bac;
    protected $NbPlace;
    protected $frais;
    protected $bourse;
    protected $IDpart;
    protected $img;
    protected $NomPart;

    public function __construct() {
        $this->IDoffre = "";
        $this->programme = "";
        $this->domaine = "";
        $this->niveau = "";
        $this->bac = "";
        $this->NbPlace = "";
        $this->frais = "";
        $this->bourse = "";
        $this->IDpart = "";
        $this->img = "";
        $this->NomPart = "";
    }
//getters
    public function getIDoffre() {
        return $this->IDoffre;
    }

    public function getProgramme() {
        return $this->programme;
    }
    

    public function getDomaine() {
        return $this->domaine;
    }


    public function getNiveau() {
        return $this->niveau;
    }

    public function getBac() {
        return $this->bac;
    }
    public function getNbPlace() {
        return $this->NbPlace;
    }

    public function getFrais() {
        return $this->frais;
    }
    

    public function getBourse() {
        return $this->bourse;
    }


    public function getIDpart() {
        return $this->IDpart;
    }

    
    public function getNompart() {
        return $this->NomPart;
    }
 
    public function getImg() {
        return $this->img;
    }


//setters

    public function setIDoffre($IDoffre) {
        $this->IDoffre = $IDoffre;
    }
    public function setProgramme($programme) {
        $this->programme = $programme;
    }
    public function setDomaine($domaine) {
        $this->domaine = $domaine;
    }
    public function setNiveau($niveau) {
        $this->niveau = $niveau;
    }
    public function setBac($bac) {
        $this->bac = $bac;
    }
    public function setNbPlace($NbPlace) {
        $this->NbPlace = $NbPlace;
    }
    public function setFrais($frais) {
        $this->frais = $frais;
    }
    public function setBourse($bourse) {
        $this->bourse = $bourse;
    }
    
    public function setIDpart($IDpart) {
        $this->IDpart = $IDpart;
    }
    public function setImg($img) {
        $this->img = $img;
    }
    public function setNompart($NomPart) {
        $this->NomPart = $NomPart;
    }

    // 
    public static function listoffre()
    {
        $access = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "root", "");
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        try{
            $query=$access->prepare("SELECT * FROM partenariat JOIN offre ON partenariat.IDpart = offre.IDpart;");
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
