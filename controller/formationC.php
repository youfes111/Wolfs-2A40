<?php

class 
FormationC {
    public function show($formation) {
        echo "<table border='1'>";
        echo "<tr><th>ID partenaire</th><th>Nom partenaire</th><th>Pays</th><th>Ville</th><th>Email partenaire</th></tr>";
        echo "<tr>";
        echo "<td>{$formation->getidlangue()}</td>";
        echo "<td>{$formation->getiduser()}</td>";
        echo "<td>{$formation->getidniveau()}</td>";
        echo "<td>{$formation->getduree()}</td>";
        echo "</tr>";
        echo "</table>";
    }
}
?>
