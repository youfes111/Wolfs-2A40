<?php

require_once '../Controller/formationC.php';
require_once '../Model/formation.php';
require_once '../Controller/niveauC.php' ;
require_once '../Model/niveau.php';
require_once '../config.php';

$formationC = new formationC();
$listsforms = $formationC->list_formations() ;

$niveauC = new niveauC();
$listsNiveau = $niveauC->ListNiveaux() ;

// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $idformation = $_POST["idformation"];
    $langue = $_POST["langue"];
    $niveau = $_POST["niveau"];
    $date_de_debut = $_POST["date_de_debut"];
    $date_de_fin = $_POST["date_de_fin"];
    $duree = $_POST["duree"];
    $prix = $_POST["prix"];
    $titre = $_POST["titre"];
    $description = $_POST["description"];


    // Création de l'objet Employe avec les données du formulaire
    $formationC = new Formation();
    $formationC->setidformation($idformation);
    $formationC->setlangue($langue);
    $formationC->setniveau($niveau);
    $formationC->setdate_de_debut($date_de_debut);
    $formationC->setdate_de_fin($date_de_fin);
    $formationC->setduree($duree);
    $formationC->setprix($prix);
    $formationC->settitre($titre);
    $formationC->setdescription($description);
    ajouter($formationC->getidformation(), $formationC->getlangue(),$formationC->getniveau(),$formationC->getdate_de_debut(),$formationC->getdate_de_fin(),$formationC->getduree(),$formationC->getprix(),$formationC->gettitre(),$formationC->getdescription());

}


//modification
if(isset($_GET['id'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id'];
    $conn = config::getConnexion();
    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $conn->prepare('SELECT * FROM formation WHERE id_formation = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $formationdata = $query->fetch(PDO::FETCH_ASSOC);
    
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
        <li><a href="#"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="backendNadine.php"><i class="lni lni-book"></i> Formation linguistique</a></li>
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
    <div class="container">
    <h2>Modifier la formation</h2>

    <form method="POST" action="update_formation.php">
        <input type="hidden" name="id_formation" value="'.$formationdata['id_formation'].'">
        
        <div class="form-control">
            <div class="left-label">
                <label for="iduser">ID user </label>
                <label for="niveau">Niveau</label>
                <label for="date_de_debut">Date de début</label>
                <label for="date_de_fin">Date de fin</label>
                <label for="duree">Durée</label>
            </div>
            <div class="right-label">
                <label for="prix">Prix</label>
                <label for="titre">Titre</label>
                <label for="description">Description</label>
            </div>
        </div>
        
        <div class="form-control">
            <div class="left-input">
                <input type="text" id="langue" name="langue" value="'.$formationdata['langue'].'">
                <input type="text" id="niveau" name="niveau" value="'.$formationdata['niveau'].'">
                <input type="text" id="date_de_debut" name="date_de_debut" value="'.$formationdata['date_de_debut'].'">
                <input type="text" id="date_de_fin" name="date_de_fin" value="'.$formationdata['date_de_fin'].'">
                <input type="text" id="duree" name="duree" value="'.$formationdata['duree'].'">
            </div>
            <div class="right-input">
                <input type="text" id="prix" name="prix" value="'.$formationdata['prix'].'">
                <input type="text" id="titre" name="titre" value="'.$formationdata['titre'].'">
                <input type="text" id="description" name="description" value="'.$formationdata['description'].'">
            </div>
        </div>

        <button type="submit" id="bouton_modifier">Modifier</button>
    </form>
</div>

    </div>
</div>
<style>
.container {
    width: 20%;
    margin-left:100px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-control {
    margin-bottom: 20px;
    display: flex;
}

.left-label, .right-label {
    flex: 1;
}

.left-input, .right-input {
    flex: 1;
    margin-left: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}


</style>
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
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="backend_2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="10.png">

<link rel="stylesheet" href="formationcss.css">
    <script src="VerificationFormation.js"></script>
</head>

<body>
       <table>
        <tr>
            <td></td>
            <td></td>
        </tr>
       </table>
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
                <form action="ajouterFormation.php" method="post" >
                    <button type="submit" id="btnAjouter">Ajouter formation</button>
                </form>
            <div class="titre"><h2>Les formations</h2></div>
                    
                <table id="tableFormation">
                    <thead>
                        
                    </thead
                    <tbody>
                        <?php
                        
                        echo $listsforms ;
                        ?>
                    </tbody>
                </table>
                
<br>
<br>
<br>
<br>
<form action="ajouterNiveau.php" method="post" >
                    <button type="submit" id="btnAjouter">Ajouter Niveau</button>
                </form>
                <div class="titre"><h2>Les Niveaux</h2></div>
                    
                    <table id="tableFormation">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <?php
                            
                            echo $listsNiveau ;
                            ?>
                        </tbody>
                    </table>
                

    <div id="overlay">


    <div class="container" id="form-container" >
        <div class="header">
            <h2>Ajouter une formation</h2>
            <span id="close-form">&times;</span>
    <!-- Reste du formulaire -->
        </div>
        <form  method="POST" class="form" id="form" onsubmit="return validateForm()">
            
        <div class="form-control ">
                <label for="">ID formation</label>
                <input type="text" id="idformation"  name="idformation" placeholder="id formation">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Langue</label>
                <input type="text" id="langue"  name="langue" placeholder="langue">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for=""> Niveau</label>
                <input type="text" id="niveau"  name="niveau" placeholder="niveau">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Date de debut</label>
                <input type="text" id=date_de_debut"  name="date_de_debut" placeholder="date_de_debut">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Date de fin/label>
                <input type="text" id="date_de_fin"  name="date_de_fin" placeholder="date_de_fin">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>


            <div class="form-control">
                <label for="">Duree</label>
                <input type="text" id="duree"  name="duree" placeholder="duree">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Prix</label>
                <input type="text" id="prix"  name="prix" placeholder="prix">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Titre</label>
                <input type="text" id="titre"  name="titre" placeholder="titre">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Description</label>
                <input type="text" id="description"  name="description" placeholder="description">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

           
            
            <button type="submit" > <i class="fas fa-user-plus"></i> Ajouter</button>

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
    </script>
</body>
</html>