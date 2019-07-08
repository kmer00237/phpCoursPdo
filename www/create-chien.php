<?php

    // import du fichier database
    require_once("database.php");

    //Instanciation de la class Database
    $database = new Database();
    
    //Recuperation de la liste des maitres
    $nomMaitres = $database->getAllMaster();    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire chien</title>
</head>

<body>
    <!--Choix du chien-->
    <h1>Creation d'un nouveau chien</h1>

        <form action="process-create.php" method="POST">
            <label for="nomChien">Nom</label>
            <input type="text" id="nomChien" name="nom">
            <label for="ageChien">Age</label>
            <input type="number" id="ageChien" name="age">
            <label for="raceChien">Race</label>
            <input type="text" id="raceChien" name="race">

            <label for="choixMaitre">Maitre</label>
            <select id="choixMaitre" name="idMaitre">

                <?php
                foreach($nomMaitres as $maitre){
                    echo "<option value=" .$maitre->getId().">" .$maitre->getNom()."</options>";
                }
                ?>
            <select>

            <input type="submit">
        </form>



  


</body>

</html>