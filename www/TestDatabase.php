<?php
    //Import des fichiers nécéssaires aux tests
    require_once("database.php");

    /////

    //J'affiche le titre de ma page
    echo "<h1> Initiation php Oyé!!! </h1>";

    //J'instancie une nouvelle connexion à ma base de données
    $database = new Database();

    //Affichage du contenu de la variable pour débugger
    //var_dump($database);

    if($database->getConnexion() == null){
        echo "<p> La connexion a échouée </p>";
    }else{
        echo "<p> Connexion réussie </p>";
    }
/*
    //J'insère un nouveau maitre et je récupère son ID
    $nouvelId = $database->insertMaster("Albert", "0764835329");
    echo "<p> Un nouveau maitre a été inséré avec le numéro : $nouvelId</p>";

    //J'insère un nouveau chien et je récupère son ID
    $idChien = $database->insertDog("Milou", "2", "Caniche", $nouvelId);
    echo "<p> Un nouveau chien a été inséré avec le numéro: $idChien</p>";

    //On teste la récupération de la liste de chiens*/
    $listeChiens = $database->getAllDogs();
    echo "<ul>";
    foreach($listeChiens as $chien){
        echo "<li>";
        echo "Le chien numéro ".$chien->getId()." : ".$chien->getNom()." de race ".$chien->getRace();

        echo "</li>";
    }
    echo "</ul>";

   // $chien = $database->getDogById(48);
    //echo $chien->getNom() . " Toutou gentil";

    echo "Le chien est suprimé".$database->deleteChien(44);
        // Appelle de la fonction delete
        $resultat = $database->deleDog(2);
        if(resultat)




    //Appel de la fonction update
    //$id, $nom, $age, $race
    $resultat = $database->updateDog(5, "tutu", 5, "chiwawa");
    if ($resultat == true){
        echo " le chien a bien été mis à jour";
    }else{
        echo "Problème, impossible de mettre à jour le chien";
    }
?>