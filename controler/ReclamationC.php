<?php

class ReclamtionC {
    public function show($reclamation) {
        echo "<table border='1'>";
        echo "<tr><th>ID reclamation</th><th>Nom reclamation</th><th>Pays</th><th>Ville</th><th>Email reclamation</th></tr>";
        echo "<tr>";
        echo "<td>{$reclamation->getIDrec()}</td>";
        echo "<td>{$reclamation->getIDuser()}</td>";
        echo "<td>{$reclamation->getDaterec()}</td>";
        echo "<td>{$reclamation->getDescrec()}</td>";
        echo "<td>{$reclamation->getTyperec()}</td>";
        echo "</tr>";
        echo "</table>";
    }
}
?>
