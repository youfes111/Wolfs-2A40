<?php

class login{

    private int $idUser;
    private string $user;
    private string $userPrenom;
    private string $mdp;
    private string $email;

    public function  __construct() {
        $this->idUser=0;
        $this->user="";
        $this->userPrenom="";
        $this->mdp="";
        $this->email="";
    }
    public function getidUser() {return  $this->idUser;}
    public function setidUser($n) {$this->idUser =$n ;}

    public function getuser() {return  $this->user;}
    public function setuser($n) {$this->user =$n ;}
    public function getPrenom(){ return   $this->userPrenom;}  
    public function setPrenom($p){ $this->userPrenom = $p;}
    public function getEmail() {return $this->email;}
    public function setEmail($e) {$this->email = $e;}
    public function getmdp() {return  $this->mdp;}
    public function setmdp($n) {$this->mdp =$n ;}


}



?>