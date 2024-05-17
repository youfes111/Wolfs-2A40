<?php

require("../config/commandes1.php");
require("../config/connexion.php");

require_once "../controler/ReclamationC.php";
require_once "../model/reclamation.php";
require_once "../model/reponse.php";

$access = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "root", "");
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       
            $query=$access->prepare("SELECT * FROM reclamationsss");
            $query->execute();
            $list=$query->fetchAll();



// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_submit"])){
    // Récupération des données du formulaire
    $IDuser = $_POST["iduser"];
    $Daterec = date('Y-m-d');

    $Descrec = $_POST["descrec"];
    $Typerec = $_POST["typerec"];
    $Statut = $_POST["statut"];

    // Création de l'objet Employe avec les données du formulaire
    $reclamationC = new Reclamation();
    $reclamationC->setIDuser($IDuser);
    $reclamationC->setDaterec($Daterec);
    $reclamationC->setDescrec($Descrec);
    $reclamationC->setTyperec($Typerec);
    $reclamationC->setStatut($Statut);

   
    ajouter($reclamationC->getIDuser(),$reclamationC->getDaterec(),$reclamationC->getDescrec(), $reclamationC->getTyperec(), $reclamationC->getStatut());



}

// ajout rep
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form2_submit"])){
    // Récupération des données du formulaire
  

    $Descrep = $_POST["descrep"];
    $IDrec = $_POST["idrec"];
   
    // Création de l'objet Employe avec les données du formulaire
    $reponseC = new Reponse();
    $reponseC->setDescrep($Descrep);
    $reponseC->setIDrec($IDrec);


   
    ajouter2($reponseC->getDescrep(),$reponseC->getIDrec());



}


//modification
if(isset($_GET['id'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id'];

    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $access->prepare('SELECT * FROM reclamationsss WHERE IDrec = :id');
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
        <li><a href="#"><i class="lni lni-layers"></i> Les offres</a></li>
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="backendTalel.php"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">
            <div id="monRectangle" class="rectangle"></div>
    <div id="overlay2">

    <div class="container" id="form-container" >
        <h2>Modifier les reclamations</h2>

        <form method="POST" name="form_submit" id="form_submit" action="update_rec.php">
            <input type="hidden" name="idrec" value="'.$partnerData['IDrec'].'">
            <div class="form-control">
                <label for="iduser">user id</label>
                <input type="text" id="iduser" name="iduser" value="'.$partnerData['IDuser'].'">
            </div>
            <div class="form-control">
                <label for="descrec">description</label>
                
                <input type="text" id="descrec" name="descrec" value="'.$partnerData['Descrec'].'">
            </div>
            <div class="form-control">
                <label for="typerec">type reclamation</label>
                <input type="text" id="typerec" name="typerec" value="'.$partnerData['Typerec'].'">
            </div>
            <div class="form-control">
            <label for="typerec">Statut</label>
            <input type="text" id="statut" name="statut" value="'.$partnerData['Statut'].'">
        </div>
            <button type="submit" name="form_submit"  id="bouton_modifier">Modifier</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay2");
    overlay.style.display = "flex";

    
    </script>  ';
}
// update reponse

//modification
if(isset($_GET['id2'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id2'];

    // Récupérer les données du partenaire à partir de l'ID
    // Utilisez votre propre logique pour récupérer les données du partenaire à partir de la base de données
    $query = $access->prepare('SELECT * FROM reponse WHERE IDrep = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $repData = $query->fetch(PDO::FETCH_ASSOC);
    
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
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="backendTalel.php"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">

    <div id="overlay4">

    <div class="container" id="form-container" >
        <h2>Modifier la reponse</h2>

        <form method="POST"  class="form2" id="form2" action="update_rec.php">
            <input type="hidden" name="idrep" value="'.$repData['IDrep'].'">
           
            <input type="hidden" name="idrec" value="'.$repData['IDrec'].'">
            
            <div class="form-control">
                <label for="descrep">description reponse</label>
                
                <input type="text" id="descrep" name="descrep" value="'.$repData['Descrep'].'">
            </div>
            
            <button type="submit" name="form2_submit"  id="bouton_modifier">Modifier</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay4");
    overlay.style.display = "flex";
    var rectangle = document.getElementById("monRectangle");
    rectangle.style.display = "block";
    
    </script>  ';
}


// 
if(isset($_GET['id3'])){
    
    // Récupérer l'ID du partenaire depuis les paramètres de requête
    $id = $_GET['id3'];
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
        <li><a href="#"><i class="lni lni-book"></i> Formation linguistique</a></li>
        <li><a href="backendTalel.php"><i class="lni lni-bubble"></i> Reclamation & Réponse</a></li>
        <li><a href="login.php"></i>Log out</a></li>
    
    </ul>
            </ul>
        </div>
        <div class="contenu">
            <div class="navbar">
                
            </div>
            <div class="tables">

    <div id="overlay3">

    <div class="container" id="form-container" >
        <h2>Modifier la reponse</h2>

        <form method="POST"  class="form2" id="form2" action="ajoutrep.php">
        <input type="hidden" name="idrec" value="'.$id.'">
            
            <div class="form-control">
                <label for="descrep">description reponse</label>
                
                <input type="text" id="descrep" name="descrep">
            </div>
            
            <button type="submit"  id="bouton_modifier">Valider</button>
        </form> </div></div></div></div></div>
    ';
    echo '      <script>var overlay = document.getElementById("overlay3");
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="backend_4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="10.png">

    <link rel="stylesheet" href="partenariat1css.css">
    <script src="VerificationReclamation1.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var table = document.getElementById("tableReclamation");
    var rows = table.getElementsByTagName("tr");

    searchInput.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var filter = searchInput.value.toUpperCase();
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var rowDisplayed = false; // Indique si la ligne doit être affichée ou non
                for (var j = 0; j < cells.length; j++) {
                    var txtValue = cells[j].textContent || cells[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        rowDisplayed = true;
                        break; // Si la cellule correspond, passer à la ligne suivante
                    }
                }
                // Afficher ou masquer la ligne en fonction du résultat de la recherche
                rows[i].style.display = rowDisplayed ? "" : "none";
            }
        }
    });
});
</script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sortIdrecIcon = document.getElementById("sortIdrecIcon");
            var sortIDuserIcon = document.getElementById("sortIduserIcon");
            var sortDateIcon = document.getElementById("sortDateIcon");
            var sortDescIcon = document.getElementById("sortDescIcon");
            var sortTypeIcon = document.getElementById("sortTypeIcon");
            var sortStatutIcon = document.getElementById("sortStatutIcon");
           
            var ascendantIdrec = true;
            var ascendantIduser = true;
            var ascendantDate = true;
            var ascendantDesc = true;
            var ascendantType = true;
            var ascendantStatut = true;

            function sortTable(columnIndex, ascending) {
                // Récupérer toutes les lignes du tableau sauf la première (l'en-tête)
                var table = document.getElementById("tableReclamation");
                var rows = Array.from(table.getElementsByTagName("tr")).slice(1);

                // Trier les lignes en fonction du contenu de la colonne
                rows.sort(function(a, b) {
                    var aVal = a.cells[columnIndex].innerText.toLowerCase();
                    var bVal = b.cells[columnIndex].innerText.toLowerCase();
                    return ascending ? (aVal > bVal ? 1 : -1) : (aVal < bVal ? 1 : -1);
                });

                // Mettre à jour le tableau avec les lignes triées
                rows.forEach(function(row) {
                    table.appendChild(row);
                });
            }

            sortIdrecIcon.addEventListener("click", function() {
                sortTable(0, ascendantIdrec);
                ascendantIdrec = !ascendantIdrec;
                sortIdrecIcon.className = ascendantIdrec ? "fas fa-sort-up" : "fas fa-sort-down";
            });
            sortIDuserIcon.addEventListener("click", function() {
                sortTable(0, ascendantIduser);
                ascendantIduser = !ascendantIduser;
                sortIDuserIcon.className = ascendantIduser ? "fas fa-sort-up" : "fas fa-sort-down";
            });
            sortDateIcon.addEventListener("click", function() {
                sortTable(1, ascendantDate);
                ascendantDate = !ascendantDate;
                sortDateIcon.className = ascendantDate ? "fas fa-sort-up" : "fas fa-sort-down";
            });

            sortDescIcon.addEventListener("click", function() {
                sortTable(2, ascendantDesc);
                ascendantDesc = !ascendantDesc;
                sortDescIcon.className = ascendantDesc ? "fas fa-sort-up" : "fas fa-sort-down";
            });

            sortTypeIcon.addEventListener("click", function() {
                sortTable(3, ascendantType);
                ascendantType = !ascendantType;
                sortTypeIcon.className = ascendantType ? "fas fa-sort-up" : "fas fa-sort-down";
            });

            sortStatutIcon.addEventListener("click", function() {
                sortTable(4, ascendantStatut);
                ascendantStatut = !ascendantStatut;
                sortStatutIcon.className = ascendantStatut ? "fas fa-sort-up" : "fas fa-sort-down";
            });
        });
    </script>
</head>

<body>
<div class="wrapper">
    
    <div class="sidebar">
            <div class="sidebar-header">
                <!-- <h3>Menu</h3> -->
                <button class="sidebar-toggle">
                <img src="fichier 3 1.png" alt="StudyGo">
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
           
            <div class="tables">

    <button id="btnAjouter">Ajouter </button>
    <div class="titre"><h2>Les reclamations</h2></div>
    <div class="search-box" id="hb">
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" id="searchInput" placeholder="Rechercher...">
            </div>
            
    <table id="tableReclamation">
        <thead>
          <?php
            echo "<tr>";
                    echo "<th>IDrec<i id='sortIdrecIcon' class='fas fa-sort'> </i></th>";
                    echo "<th>IDuser<i id='sortIduserIcon' class='fas fa-sort'> </i></th>";
                    echo "<th>Date reclamation<i id='sortDateIcon' class='fas fa-sort'></i> </th>";
                    echo "<th>Description<i id='sortDescIcon' class='fas fa-sort'></i> </th>";
                    echo "<th>Type de reclamation<i id='sortTypeIcon' class='fas fa-sort'></i> </th>";
                    echo "<th>Statut<i id='sortStatutIcon' class='fas fa-sort'></i> </th>";
                    echo "</tr>";
            ?>
        </thead>
        <tbody>
            <?php
            
                // Récupération des données de la table "partenariat"
                $query = $access->query('SELECT * FROM reclamationsss');
                 
                while ($row = $query->fetch()) {
                   
                    echo "<tr>";
                    echo "<td>".$row['IDrec']."</td>";
                    echo "<td>".$row['IDuser']."</td>";
                    echo "<td>".$row['Daterec']."</td>";
                    echo "<td>".$row['Descrec']."</td>";
                    echo "<td>".$row['Typerec']."</td>";
                    echo "<td>".$row['Statut']."</td>";
                    echo '<td> <a href="?id='.$row['IDrec'].'"> <i class="fas fa-edit icon" ></i> </a> </td>';

                     echo '<td> <a href="delete_rec.php?id='.$row['IDrec'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
                    echo' <td><a href="?id3='.$row['IDrec'].'">Répondre </a></td>';
                }
           
            ?>
    
        </tbody>
    </table>
 <!-- reponse affichage -->
 
    <div class="titre"><h2>Les réponses</h2></div>

    <table id="tableReclamation2">
        <thead> <?php
            echo "<tr>";
                    echo "<th>ID réponse</th>";
                    echo "<th>Description réonse</th>";
                    echo "<th>Id reclamation</th>";
                    echo "</tr>";
        ?></thead>
        <tbody>
            <?php
            
                // Récupération des données de la table "partenariat"
                $query = $access->query('SELECT * FROM reponse');
                
                while ($row = $query->fetch()) {
                    $counter = 1; 
                    echo "<tr>";
                    echo "<td>".$row['IDrep']."</td>";
                    echo "<td>".$row['Descrep']."</td>";
                    echo "<td>".$row['IDrec']."</td>";
                    echo '<td> <a href="?id2='.$row['IDrep'].'"> <i class="fas fa-edit icon" ></i> </a> </td>';

                    echo '<td> <a href="delete_rep.php?id2='.$row['IDrep'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
                    echo "</tr>";
                }
           
            ?>
    
        </tbody>
    </table>
 

 <!-- ajout rep -->
 <div id="overlay3">


    <div class="container" id="form-container" >
        <div class="header">
            <h2>Ajouter une reponse</h2>
            <span id="close-form3">&times;</span>
    <!-- Reste du formulaire -->
        </div>
        <form  method="POST" class="form2" id="form2" onsubmit="return validateForm2()">
            
      

            <div class="form-control">
                <label for="">Descreption de reponse :</label>
                <input type="text" id="descrep"  name="descrep" placeholder="descreption">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>
            

            <div class="form-control">
                        <label for="">ID reclamation</label>
                        <select id="idrec" name="idrec">
                            <?php foreach($list as $List): ?>
                                <option value="<?= $List['IDrec'];?>"><?= $List['IDrec'];?></option>
                            <?php endforeach ; ?>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
            </div>

           

            

<button type="submit" name="form2_submit" > <i class="fas fa-user-plus"></i> Ajouter</button>
</div>
        </form>
        </div>
    </div>

 <!--  -->
    <div id="overlay">


    <div class="container" id="form-container" >
        <div class="header">
            <h2>Ajouter une reclamation</h2>
            <span id="close-form">&times;</span>
    <!-- Reste du formulaire -->
        </div>
        <form  method="POST" class="form" id="form" onsubmit="return validateForm()">
            
      

            <div class="form-control">
                <label for="">ID user</label>
                <input type="text" id="iduser"  name="iduser" placeholder="ID user">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

           

            <div class="form-control">
                <label for="">Description</label>
                <textarea id="descrec" name="descrec" rows="5"  ></textarea><br><br>

                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>
            <div class="form-control ">
                <label for="">Statut</label>
                <input type="text" id="statut"  name="statut" placeholder="Statut" value="en attente">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

  <label>Type de réclamation</label>


<br class="form-control2">


  <label>
    <input type="radio" name="typerec" value="Formation linguistique"> Formation linguistique
  </label>
            
  <label>
    <input type="radio" name="typerec" value="Étudier à l'étranger"> Étudier à l'étranger
  </label>
  
  <label>
    <input type="radio" name="typerec" value="Technique"> Technique
  </label>

           
            
<button type="submit" name="form_submit"> <i class="fas fa-user-plus"></i> Ajouter</button>
</div>
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

    // rep
    var btnAjouter2 = document.getElementById('btnAjouter2');
        var overlay3 = document.getElementById('overlay3');
        btnAjouter2.addEventListener('click', function() {
            overlay3.style.display = 'flex';
        });
       
    //close button
    var closeForm = document.getElementById('close-form3');
    closeForm.addEventListener('click', function() {
    overlay3.style.display = 'none'; 
    });
    
    
    </script>
</body>
</html>

