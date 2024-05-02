<?php
require_once '../config.php';
require_once '../controller/formationC.php';
require_once '../controller/niveauC.php';

// Initialize error variable
$error = "";

// Check if the formation ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $id_formation = $_GET['id'];

    // Retrieve existing formation data based on the provided ID
    $formationC = new formationC();
    $formation = $formationC->getFormation($id_formation);

    // Check if the formation exists
    if (!$formation) {
        // Redirect to an error page or handle the error accordingly
        header("Location: error.php");
        exit();
    }

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
            // Get form data
            $langue = $_POST["langue"];
            $niveau = $_POST["niveau"];
            $date_de_debut = $_POST["date_de_debut"];
            $date_de_fin = $_POST["date_de_fin"];
            $duree = $_POST["duree"];
            $prix = $_POST["prix"];
            $titre = $_POST["titre"];
            $description = $_POST["description"];

            // Update the formation
            $result = $formationC->updateFormation($id_formation, $langue, $niveau, $date_de_debut, $date_de_fin, $duree, $prix, $titre, $description);
            //var_dump($result);
            // Check if the formation was updated successfully
            if ($result) {
                // Redirect to a success page or do something else
                header("Location: backendNadine.php");
                exit();
            } else {
                // Handle error if formation was not updated
                $error = "Failed to update formation.";
            }
        } else {
            $error = "Please fill all required fields.";
        }
    }
} else {
    // If ID parameter is not provided, redirect to an error page or handle the error accordingly
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Formation</title>
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
    <h2>Update Formation</h2>
    <form action="update_formation.php?id=<?php echo $id_formation; ?>" method="post" id="updateFormationForm">
        <div>
            <label for="id_formation">ID Formation:</label>
            <input type="text" name="id_formation" id="id_formation" value="<?php echo $id_formation; ?>" readonly>
        </div>
        <div>
            <label for="langue">Langue:</label>
            <input type="text" name="langue" id="langue" value="<?php echo $formation['langue']; ?>" required>
            <div class="error-message" id="langueError"></div>
        </div>
        <div>
            <label for="niveau">Niveau:</label>
            <select name="niveau" id="niveau" required>
                <?php
                // Loop through each level and create an option tag
                foreach ($niveaux as $n) {
                    $selected = ($formation['niveau'] == $n['id_niveau']) ? 'selected' : '';
                    echo '<option value="' . $n['id_niveau'] . '" ' . $selected . '>' . $n['id_niveau'] . '</option>';
                }
                ?>
            </select>
            <div class="error-message" id="niveauError"></div>
        </div>

        <div>
        <label for="niveau">Niveau:</label>
        <select name="niveau" id="niveau" required style="width: 100%;">
            <?php foreach ($niveaux as $niveau) { ?>
                <option value="<?php echo $niveau['id_niveau']; ?>" <?php echo ($formation['niveau'] == $niveau['id_niveau']) ? 'selected' : ''; ?>>
                    <?php echo $niveau['id_niveau'] . ' - Certificat: ' . $niveau['certificat']; ?>
                </option>
            <?php } ?>
        </select>
        <div class="error-message" id="niveauError"></div>
    </div>
        <!-- Include other input fields with their respective values -->
        <!-- Ensure each input field is prefilled with the existing formation data -->
        <div>
            <label for="date_de_debut">Date de Début:</label>
            <input type="date" name="date_de_debut" id="date_de_debut" value="<?php echo $formation['date_de_debut']; ?>" required>
            <div class="error-message" id="dateDeDebutError"></div>
        </div>
        <div>
            <label for="date_de_fin">Date de Fin:</label>
            <input type="date" name="date_de_fin" id="date_de_fin" value="<?php echo $formation['date_de_fin']; ?>" required>
            <div class="error-message" id="dateDeFinError"></div>
        </div>
        <div>
            <label for="duree">Durée:</label>
            <input type="number" name="duree" id="duree" value="<?php echo $formation['duree']; ?>" required>
            <div class="error-message" id="dureeError"></div>
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" name="prix" id="prix" value="<?php echo $formation['prix']; ?>" required>
            <div class="error-message" id="prixError"></div>
        </div>
        <div>
            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre" value="<?php echo $formation['titre']; ?>" required>
            <div class="error-message" id="titreError"></div>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?php echo $formation['description']; ?></textarea>
            <div class="error-message" id="descriptionError"></div>
        </div>
        <button type="submit">Update Formation</button>
    </form>

    <!-- JavaScript for input validation -->
    <script>
        document.getElementById('updateFormationForm').addEventListener('submit', function(event) {
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
