<?php
session_start();

    echo "<a href='/www/streetFigh/index.php'>Retour acceuil</a><br>";
if (is_array($result)) {
    echo '<table border="1">
            <tr>
                <th>Nom</th>
                <th>ATK</th>
                <th>Vie</th>
                <th>Color</th>
            </tr>';

    foreach ($result as $personnage) {
        echo '<tr>
                <td>' . htmlspecialchars($personnage->name) . '</td>
                <td>' . $personnage->atk . '</td>
                <td>' . $personnage->life . '</td>
                <td>' . htmlspecialchars($personnage->color) . '</td>
            </tr>';
    }

    echo '</table>';
} else {
    echo $Personnage;
}
?>
