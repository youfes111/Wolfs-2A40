<?php
include("../controler/formationC.php");
include("../controler/niveauC.php");

// Initialize error variable
$error = "";

   // Fetch existing levels (niveau) from the database
   $niveauC = new niveauC();
   $niveaux = $niveauC->listNiveaux1();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (
        isset($_POST["langue"]) &&
        isset($_POST["niveau"]) &&
        isset($_POST["date_de_debut"]) &&
        isset($_POST["date_de_fin"]) &&
        isset($_POST["duree"]) &&
        isset($_POST["prix"]) &&
        isset($_POST["titre"]) &&
        isset($_POST["description"])
    ) {
        // Create an instance of formationC
        $formationC = new formationC();

        // Get form data
        $langue = $_POST["langue"];
        $niveau = $_POST["niveau"];
        $date_de_debut = $_POST["date_de_debut"];
        $date_de_fin = $_POST["date_de_fin"];
        $duree = $_POST["duree"];
        $prix = $_POST["prix"];
        $titre = $_POST["titre"];
        $description = $_POST["description"];

        // Add the formation
        $result = $formationC->ajouterFormation($langue, $niveau, $date_de_debut, $date_de_fin, $duree, $prix, $titre, $description);

        // Check if the formation was added successfully
        if ($result) {
            // Redirect to a success page or do something else
            header("Location: backendNadine.php");
            exit();
        } else {
            // Handle error if formation was not added
            $error = "Failed to add formation.";
        }
    } else {
        $error = "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Formation</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h2>Add Formation</h2>
    <form action="ajouterFormation.php" method="post" id="addFormationForm">
        <div>
            <label for="langue">Langue:</label>
            <input type="text" name="langue" id="langue" required>
            <div class="error-message" id="langueError"></div>
        </div>
        <div>
        <label for="niveau">Niveau:</label>
            <select name="niveau" id="niveau" required style="width: 100%;">
                <?php foreach ($niveaux as $niveau) { ?>
                    <option value="<?php echo $niveau['id_niveau']; ?>"><?php echo $niveau['id_niveau'] . ' - Certificat: ' . $niveau['certificat']; ?></option>
                <?php } ?>
            </select>
            <div class="error-message" id="niveauError"></div>
        </div>

        <div>
            <label for="date_de_debut">Date de Début:</label>
            <input type="date" name="date_de_debut" id="date_de_debut" required>
            <div class="error-message" id="dateDeDebutError"></div>
        </div>
        <div>
            <label for="date_de_fin">Date de Fin:</label>
            <input type="date" name="date_de_fin" id="date_de_fin" required>
            <div class="error-message" id="dateDeFinError"></div>
        </div>
        <div>
            <label for="duree">Durée:</label>
            <input type="number" name="duree" id="duree" required>
            <div class="error-message" id="dureeError"></div>
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" name="prix" id="prix" required>
            <div class="error-message" id="prixError"></div>
        </div>
        <div>
            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre" required>
            <div class="error-message" id="titreError"></div>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
            <div class="error-message" id="descriptionError"></div>
        </div>
        <button type="submit">Add Formation</button>
    </form>

    <script>
        // JavaScript for input validation
        document.getElementById('addFormationForm').addEventListener('submit', function(event) {
            var langueInput = document.getElementById('langue');
            var langueError = document.getElementById('langueError');
            if (!langueInput.value) {
                event.preventDefault();
                langueError.textContent = 'Langue is required';
            } else {
                langueError.textContent = '';
            }

            var niveauInput = document.getElementById('niveau');
            var niveauError = document.getElementById('niveauError');
            if (!niveauInput.value) {
                event.preventDefault();
                niveauError.textContent = 'Niveau is required';
            } else {
                niveauError.textContent = '';
            }

            var dateDeDebutInput = document.getElementById('date_de_debut');
            var dateDeDebutError = document.getElementById('dateDeDebutError');
            if (!dateDeDebutInput.value) {
                event.preventDefault();
                dateDeDebutError.textContent = 'Date de début is required';
            } else {
                dateDeDebutError.textContent = '';
            }

            var dateDeFinInput = document.getElementById('date_de_fin');
            var dateDeFinError = document.getElementById('dateDeFinError');
            if (!dateDeFinInput.value) {
                event.preventDefault();
                dateDeFinError.textContent = 'Date de fin is required';
            } else {
                dateDeFinError.textContent = '';
            }

            var dureeInput = document.getElementById('duree');
            var dureeError = document.getElementById('dureeError');
            if (!dureeInput.value) {
                event.preventDefault();
                dureeError.textContent = 'Durée is required';
            } else {
                dureeError.textContent = '';
            }

            var prixInput = document.getElementById('prix');
            var prixError = document.getElementById('prixError');
            if (!prixInput.value) {
                event.preventDefault();
                prixError.textContent = 'Prix is required';
            } else {
                prixError.textContent = '';
            }

            var titreInput = document.getElementById('titre');
            var titreError = document.getElementById('titreError');
            if (!titreInput.value) {
                event.preventDefault();
                titreError.textContent = 'Titre is required';
            } else {
                titreError.textContent = '';
            }

            var descriptionInput = document.getElementById('description');
            var descriptionError = document.getElementById('descriptionError');
            if (!descriptionInput.value) {
                event.preventDefault();
                descriptionError.textContent = 'Description is required';
            } else {
                descriptionError.textContent = '';
            }
        });
    </script>
</body>
</html>

