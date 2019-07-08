<?php
//omportation de la database
require_once("database.php");

//creation de la conexion à la base des données
$database = new Database();

//fonction GET permet de recupérer ce que nous avons dans la base de donnés par l'url
$id = $_GET["id"];
?>