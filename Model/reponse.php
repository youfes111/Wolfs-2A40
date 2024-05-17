<?php

class Reponse {
    protected $IDrep;
    protected $Descrep;
    protected $IDrec;
   

    public function __construct() {
        $this->IDrep = "";
        $this->Descrep = "";
        $this->IDrec = "";

    }
//getters
    public function getIDrep() {
        return $this->IDrep;
    }

    public function getDescrep() {
        return $this->Descrep;
    }
    

 


    public function getIDrec() {
        return $this->IDrec;
    }

   
//setters

    public function setIDrep($IDrep) {
        $this->IDrep = $IDrep;
    }
    public function setDescrep($Descrep) {
        $this->Descrep = $Descrep;
    }
    public function setIDrec($IDrec) {
        $this->IDrec = $IDrec;
    }
 
    public static function listrep()
    {
        $access = new PDO("mysql:host=localhost;dbname=reclamation;charset=utf8", "root", "");
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        try{
            $query=$access->prepare("SELECT * FROM reponse");
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
