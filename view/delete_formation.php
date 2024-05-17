<?php
require_once '../controler/formationC.php' ;


if (isset($_GET['id']))
{
    $id=$_GET['id'];
}

    $form=new formationC();
    $res= $form -> deleteFormation($id);
    if ($res) {
        header('location:backendNadine.php');
        exit();
    }
    else {
        echo 'formation laaaa ' ;
    }
    


?>