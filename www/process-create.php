<?php
//PAGE INTERMEDIARE => QUE du PHP


//Importer et instancier une database
require_once("database.php");

//creation de la connexion avec la database
$database = new Database();


//Récupérer les infos du formulaire avec $_POST
$dataNom = $_POST["nom"];
$dataAge = $_POST["age"];
$dataRace = $_POST["race"];
$dataidMaitre = $_POST["idMaitre"];

//Appeler la function insertDog en lui passant les infos du formulaire
$nouvelId = $database->insertDog($dataNom, $dataAge, $dataRace, $dataidMaitre);

// Rediriger l'utilisateur vers la page profil du nouveau chien
header("Location: afficherChien.php?id=".$nouvelId);

?>