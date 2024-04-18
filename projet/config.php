<?php

class config{

    private static $pdo = null;
    public static function getConnexion(){
        if(!isset(self::$pdo)){
            $servername="localhost";
            $username= "root";
            $password= "";
            $dbname= "atelierphp";
            try{
                self::$pdo=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
                [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]
            );
            //echo "connected succesfully";
            }
            catch(Exception $e){
                die('erreur: '.$e->getMessage());
            }
        }
        return self::$pdo;
    }
}


        


        
    





?>