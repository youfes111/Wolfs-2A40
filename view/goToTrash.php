<?php
require_once '../controler/formationC.php' ;


if (isset($_GET['id']))
{
    $id=$_GET['id'];
}

    $form=new formationC();
    $res= $form -> switchEtat($id,"suprime");

        header('location:backendNadine.php');
        exit();
    
    
    


?>