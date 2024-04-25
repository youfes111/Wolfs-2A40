<?php

require("C:/xampp/htdocs/PROJET WEB NOUHA/config/commandes.php");
require("C:/xampp/htdocs/PROJET WEB NOUHA/config/connexion.php");

require_once "C:/xampp/htdocs/PROJET WEB NOUHA/controller/PartenariatC.php";
require_once "C:/xampp/htdocs/PROJET WEB NOUHA/model/partenariat.php";



// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nompart = $_POST["nompart"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $emailpart = $_POST["emailpart"];

    // Création de l'objet Employe avec les données du formulaire
    $partenaireC = new Partenariat();
    
    $partenaireC->setNomPart($nompart);
    $partenaireC->setPays($pays);
    $partenaireC->setVille($ville);
    $partenaireC->setEmailPart($emailpart);

  // Création de l'objet EmployeC pour afficher les informations avec la méthode show()
  $partenaireS = new PartenariatC();
ajouter($partenaireC->getNomPart(),$partenaireC->getPays(),$partenaireC->getVille(), $partenaireC->getEmailPart());



}


//modification
if(isset($_GET['id'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id'];

    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $access->prepare('SELECT * FROM partenariat WHERE IDpart = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $partnerData = $query->fetch(PDO::FETCH_ASSOC);
    
    // Afficher le formulaire de modification avec les données du partenaire
    echo '
    
    <div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="logo.png" alt="StudyGo">
                                </button>
            </div>
            
            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
        <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
        <hr>
        <h6>Les gestions</h6>
        <div class="backend_1">
        <li><a href="#"><i class="lni lni-users"></i> Les clients</a></li>
        <li><a href="backendNouha.php"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="#"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">

    <div id="overlay2">

    <div class="container" id="form-container" >
        <h2>Modifier le partenaire</h2>

        <form method="POST" action="update_part.php">
            <input type="hidden" name="idpart" value="'.$partnerData['IDpart'].'">
            <div class="form-control">
                <label for="nompart">Nom partenaire</label>
                <input type="text" id="nompart" name="nompart" value="'.$partnerData['NomPart'].'">
            </div>
            <div class="form-control">
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" value="'.$partnerData['pays'].'">
            </div>
            <div class="form-control">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="'.$partnerData['ville'].'">
            </div>
            <div>
                <label for="emailpart">Email partenaire</label>
                <input type="email" id="emailpart" name="emailpart" value="'.$partnerData['EmailPart'].'">
            </div>
            <button type="submit" id="bouton_modifier">Modifier</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay2");
    overlay.style.display = "flex";

    
    </script>  ';
}



?>




<!DOCTYPE html>

<html lang="fr">
<head>
    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des offres</title>
    <link rel="stylesheet" href="awesome/css/all.min.css">
    <link rel="stylesheet" href="partenariatcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="backend_2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="10.png">

    <script src="VerificationPartenariat.js"></script>

</head>

<body>

    
<div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="logo.png" alt="StudyGo">
                </button>
            </div>
            
            <ul class="sidebar-nav">
                <hr>
                <ul class="sidebar-nav">
        <li><a href="backend_1.php"><i class="lni lni-dashboard"></i> Dashboard</a></li>
        <hr>
        <h6>Les gestions</h6>
        <div class="backend_1">
        <li><a href="#"><i class="lni lni-users"></i> Les clients</a></li>
        <li><a href="backendNouha.php"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="#"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
    
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">



            <button id="btnAjouter">Ajouter</button>
            <div class="titre"><h2>Les partenaires</h2></div>

<table id="tablePartenariat">
    <thead>
    </thead>
    <tbody>
        <?php
        
            // Récupération des données de la table "partenariat"
            $query = $access->query('SELECT * FROM partenariat');
             echo "<tr>";
                echo "<td>IDpart</td>";
                echo "<td>NomPart</td>";
                echo "<td>Pays</td>";
                echo "<td>Ville</td>";
                echo "<td>Email partenaire</td>";
                echo "</tr>";
            while ($row = $query->fetch()) {
               
                echo "<tr>";
                echo "<td>".$row['IDpart']."</td>";
                echo "<td>".$row['NomPart']."</td>";
                echo "<td>".$row['pays']."</td>";
                echo "<td>".$row['ville']."</td>";
                echo "<td>".$row['EmailPart']."</td>";

                echo '<td> <a href="?id='.$row['IDpart'].'"> <i class="fas fa-edit icon"" ></i> </a> </td>';

                echo '<td> <a href="delete_part.php?id='.$row['IDpart'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
            }
                    
        ?>
        
    </tbody>
</table>

    <div id="overlay">
        <div class="container" id="form-container" >
            <div class="header">
                <h2>Ajouter un partenaire</h2>
                <span id="close-form">&times;</span>
        <!-- Reste du formulaire -->
            </div>
                <form  method="POST" class="form" id="form" onsubmit="return validateForm()">
                        
                  
                    <div class="form-control">
                            <label for="">Nom partenaire</label>
                            <input type="text" id="nompart"  name="nompart" placeholder="Nom partenaire">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            
                            <small>Message d'erreur</small>
                    </div>

                    <div class="form-control">
                            <label for="">Pays</label>
                            <input type="text" id="pays"  name="pays" placeholder="Pays">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            
                            <small>Message d'erreur</small>
                    </div>

                    <div class="form-control">
                            <label for="">Ville</label>
                            <input type="text" id="ville"  name="ville" placeholder="Ville">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation"></i>
                            
                            <small>Message d'erreur</small>
                    </div>

                    <div class="form-control ">
                        <label for="">Email partenaire</label>
                        <input type="email" id="emailpart"  name="emailpart" placeholder="ronasdev@gmail.com">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                       

                        <small>Message d'erreur</small>
                    </div>
                    
                    <button type="submit"  > <i class="fas fa-user-plus"></i> Ajouter</button>

                </form>
        </div>
    </div>
</div>
</div>
</div>
</div>





<script>

    //fonction button ajout pour afficher la formulaire
        var btnAjouter = document.getElementById('btnAjouter');
        var overlay = document.getElementById('overlay');
        btnAjouter.addEventListener('click', function() {
            overlay.style.display = 'flex';
        });
       
    //close button
    var closeForm = document.getElementById('close-form');
    closeForm.addEventListener('click', function() {
    overlay.style.display = 'none'; 
    });
    var closeForm = document.getElementById('close-form2');
    closeForm.addEventListener('click', function() {
    overlay2.style.display = 'none'; 
  
    });
    
    </script>
</body>
</html>

