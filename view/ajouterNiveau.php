<?php
// Include the necessary files
include("../controler/niveauC.php");

// Initialize error variable
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (
        isset($_POST["certificat"]) &&
        isset($_POST["organisme"]) &&
        isset($_POST["score"])
    ) {
        // Create an instance of niveauC
        $niveauC = new niveauC();

        // Get form data
        $certificat = $_POST["certificat"];
        $organisme = $_POST["organisme"];
        $score = $_POST["score"];

        // Add the niveau
        $result = $niveauC->ajouterNiveau($certificat, $organisme, $score);

        // Check if the niveau was added successfully
        if ($result) {
            // Redirect to a success page or do something else
            header("Location: backendNadine.php");
            exit();
        } else {
            // Handle error if niveau was not added
            $error = "Failed to add niveau.";
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
    <title>Add Niveau</title>
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
        input[type="number"] {
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
    <h2>Add Niveau</h2>
    <form action="ajouterNiveau.php" method="post" id="addNiveauForm">
        <div>
            <label for="certificat">Certificat:</label>
            <input type="text" name="certificat" id="certificat" required>
            <div class="error-message" id="certificatError"></div>
        </div>
        <div>
            <label for="organisme">Organisme:</label>
            <input type="text" name="organisme" id="organisme" required>
            <div class="error-message" id="organismeError"></div>
        </div>
        <div>
            <label for="score">Score:</label>
            <input type="number" name="score" id="score" required>
            <div class="error-message" id="scoreError"></div>
        </div>
        <button type="submit">Add Niveau</button>
    </form>

    <script>
        // JavaScript for input validation
        document.getElementById('addNiveauForm').addEventListener('submit', function(event) {
            var certificatInput = document.getElementById('certificat');
            var certificatError = document.getElementById('certificatError');
            if (!certificatInput.value) {
                event.preventDefault();
                certificatError.textContent = 'Certificat is required';
            } else {
                certificatError.textContent = '';
            }

            var organismeInput = document.getElementById('organisme');
            var organismeError = document.getElementById('organismeError');
            if (!organismeInput.value) {
                event.preventDefault();
                organismeError.textContent = 'Organisme is required';
            } else {
                organismeError.textContent = '';
            }

            var scoreInput = document.getElementById('score');
            var scoreError = document.getElementById('scoreError');
            if (!scoreInput.value) {
                event.preventDefault();
                scoreError.textContent = 'Score is required';
            } else {
                scoreError.textContent = '';
            }
        });
    </script>
</body>
</html>
