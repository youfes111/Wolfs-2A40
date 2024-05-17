<?php

class PartenariatC {
    public function show($partenariat) {
        echo "<table border='1'>";
        echo "<tr><th>ID partenaire</th><th>Nom partenaire</th><th>Pays</th><th>Ville</th><th>Email partenaire</th></tr>";
        echo "<tr>";
        echo "<td>{$partenariat->getIDpart()}</td>";
        echo "<td>{$partenariat->getNomPart()}</td>";
        echo "<td>{$partenariat->getPays()}</td>";
        echo "<td>{$partenariat->getVille()}</td>";
        echo "<td>{$partenariat->getEmailPart()}</td>";
        echo "</tr>";
        echo "</table>";
    }
}
?>
