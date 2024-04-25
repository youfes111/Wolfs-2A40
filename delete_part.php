<?php
require("C:/xampp/htdocs/PROJET WEB NOUHA/config/commandes.php");
require("C:/xampp/htdocs/PROJET WEB NOUHA/config/connexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['confirm'])) {
    // Si l'utilisateur a confirmé la suppression, appelez la fonction de suppression ici
    supprimer($id);
    header('location:backendNouha.php');
    exit; // Assurez-vous de terminer l'exécution du script après la redirection
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de suppression</title>
    <style>
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container h2 {
            margin-top: 0;
        }

        .container p {
            margin-bottom: 20px;
        }

        .container form {
            display: inline-block;
        }

        .container form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container form button.cancel {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmation de suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer ce partenaire ? </p>
        <form method="post">
            <button type="submit" name="confirm">Oui, supprimer</button>
        </form>
        <form method="get" action="backendNouha.php">
            <button type="submit" class="cancel">Annuler</button>
        </form>
    </div>
</body>
</html>