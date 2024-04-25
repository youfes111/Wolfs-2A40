<?php

require("C:/xampp/htdocs/PROJET WEB NOUHA/config/commandes.php");
require("C:/xampp/htdocs/PROJET WEB NOUHA/config/connexion.php");

require_once "C:/xampp/htdocs/PROJET WEB NOUHA/controller/PartenariatC.php";
require_once "C:/xampp/htdocs/PROJET WEB NOUHA/model/partenariat.php";



// Vérification si le formulaire est soumiss
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $idpart = $_POST["idpart"];
    $nompart = $_POST["nompart"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $emailpart = $_POST["emailpart"];

    // Création de l'objet Employe avec les données du formulaire
    $partenaireC = new Partenariat();
    $partenaireC->setIDpart($idpart);
    $partenaireC->setNomPart($nompart);
    $partenaireC->setPays($pays);
    $partenaireC->setVille($ville);
    $partenaireC->setEmailPart($emailpart);

  // Création de l'objet EmployeC pour afficher les informations avec la méthode show()
  $partenaireS = new PartenariatC();
    ajouter($partenaireC->getIDpart(), $partenaireC->getNomPart(),$partenaireC->getPays(),$partenaireC->getVille(), $partenaireC->getEmailPart());



}

//suppression 
if(isset($_GET['delete_msg'])){
    ?>
   <script>
   alert('suppression effectuée');
   </script>
   <?php
   
}
//modification
if(isset($_GET['id'])){
    echo "<tr>";
    echo "<td>IDpart</td>";
    echo "<td>NomPart</td>";
    echo "<td>Pays</td>";
    echo "<td>Ville</td>";
    echo "<td>Email partenaire</td>";
    echo "</tr>";
}


?>




<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de form avec js</title>
    <link rel="stylesheet" href="awesome/css/all.min.css">
    <link rel="stylesheet" href="partenariatcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="VerificationPartenariat.js"></script>
</head>

<body>
    <button id="btnAjouter">Ajouter</button>

    <table id="tablePartenariat">
        <thead>
            <tr>
                <th>Les partenaires</th>
            </tr>
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

                
                    
                
           
                    echo '<td> <a href="delete_page.php?id='.$row['IDpart'].'"> <i class="fas fa-trash-alt icon" ></i> </a> </td>';
                }
           
            ?>
            <?php
if(isset($_GET['delete_msg'])){
    echo"Suppression effectuée";
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
            
        <div class="form-control ">
                <label for="">ID partenaire</label>
                <input type="text" id="idpart"  name="idpart" placeholder="ID partenaire">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Nom partenaire</label>
                <input type="text" id="nompart"  name="nompart" placeholder="Nom partenaire">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Pays</label>
                <input type="text" id="pays"  name="pays" placeholder="Pays">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
                <small>Message d'erreur</small>
            </div>

            <div class="form-control">
                <label for="">Ville</label>
                <input type="text" id="ville"  name="ville" placeholder="Ville">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <br>
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
    <div id="editFormContainer"></div>

    
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
    function showEditForm(id) {
        alert('gg');
    // Récupérer les données du partenaire à partir de l'ID
    // Effectuer une requête AJAX pour récupérer les données du partenaire à partir de l'ID
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_partner_data.php?id=" + id, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Créer le formulaire de modification avec les données récupérées
            var partnerData = JSON.parse(xhr.responseText);
            var formContainer = document.getElementById("editFormContainer");
            formContainer.innerHTML = `
                <div class="edit-form">
                    <h2>Modifier le partenaire</h2>
                    <form method="POST" onsubmit="return validateEditForm()">
                        <input type="hidden" name="idpart" value="${partnerData.IDpart}">
                        <div class="form-control">
                            <label for="nompart">Nom partenaire</label>
                            <input type="text" id="nompart" name="nompart" value="${partnerData.NomPart}">
                        </div>
                        <div class="form-control">
                            <label for="pays">Pays</label>
                            <input type="text" id="pays" name="pays" value="${partnerData.pays}">
                        </div>
                        <div class="form-control">
                            <label for="ville">Ville</label>
                            <input type="text" id="ville" name="ville" value="${partnerData.ville}">
                        </div>
                        <div class="form-control">
                            <label for="emailpart">Email partenaire</label>
                            <input type="email" id="emailpart" name="emailpart" value="${partnerData.EmailPart}">
                        </div>
                        <button type="submit">Modifier</button>
                    </form>
                </div>
            `;
        }
    };
    xhr.send();
}
    
    </script>
</body>
</html>

