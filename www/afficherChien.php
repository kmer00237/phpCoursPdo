+<?php
require_once("database.php");
//creation de la nouvelle connexion
$database = new Database();
//fonction GET permet de recupérer ce que nous avons dans la base de donnés par l'url
$id = $_GET["id"];
// Recupere un chien en fonction de son id
$chien = $database->getDogById($id);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil chien</title>
</head>
<body class="bg-1">
 

 <!--correction Sandra exercice 13-->
<div class=infoChien> 
<h1>Information chien</h1>
<p>Nom : <?php echo $chien->getNom();?></p>
<p>Age : <?php echo $chien->getAge();?></p>
<p>Race : <?php echo $chien->getRace();?></p>
</div>

<div class=infoMaitre>
<h1>Information maitre</h1>
<p>Nom : <?php echo $chien->getNomMaitre();?></p>
<p>Telephone : <?php echo $chien->getTelephone();?></p>
</div>

<br><br>
<a href=process-delete.php?<?php echo $chien->getId();?>">Delete</a>
<button onclick="window.location.href = 'http://localhost/listeChiens.php';">Vers à la liste</button>
  
</body>
</html>