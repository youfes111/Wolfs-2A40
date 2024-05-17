<?php
// Include necessary files
include("../controler/niveauC.php");

// Check if the ID parameter is provided in the URL
if (isset($_GET["id"])) {
    // Get the niveau ID from the URL parameter
    $id_niveau = $_GET["id"];

    // Create an instance of niveauC
    $niveauC = new niveauC();

    // Delete the niveau
    $result = $niveauC->deleteNiveau($id_niveau);

    // Check if the niveau was deleted successfully
    if ($result) {
        // Redirect to a success page or do something else
        header("Location: backendNadine.php");
        exit();
    } else {
        // Handle error if niveau was not deleted
        echo "Failed to delete niveau.";
    }
} else {
    // Redirect or display an error message if ID parameter is missing
    echo "Niveau ID is missing.";
}
?>
