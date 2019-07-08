<?php

require_once("database.php");

//creation de la connexion
$database = new Database();

//Recuperation de la liste des chiens
$listesChiens = $database->getAllDogs();

?>

<html>
        <header>
                <link rel="stylesheet" href="style.css">
        </header>
        <body>
                <a href="create-chien.php">Nouveau chien</a>
                <br>
                <h1>Liste des chiens</h1>
                <h2>Annuaire</h2>
                <ul>
                        <?php foreach($listesChiens as $chien) {?>
                        
                <li>
                <?php echo "<a href = afficherChien.php?id=".$chien->getId().">";
                        echo "Le chien numéro".$chien->getId()." : ".$chien->getNom()." de race ".$chien->getRace();
                      echo "</a>"  
                ?>
                </li>

                <?php } ?>
                </ul>
                </body>
                </html>

                