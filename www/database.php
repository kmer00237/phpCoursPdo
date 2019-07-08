<?php

require_once("class-chien.php");
require_once("class-master.php");
class Database{
    private $connexion;

    //Le constructeur
    public function __construct(){
        $PARAM_hote="mariadb";                  //Le chemin vers le serveur
        $PARAM_port="3306";                     //Le port de connexion à la base de données
        $PARAM_nom_bd="AnnuaireToutou";         //Le nom de ma base de données
        $PARAM_utilisateur="adminToutou";       //Nom d'utilisateur pour se connecter
        $PARAM_mot_passe="Annu@ireT0ut0u";      //Mot de passe de l'utilisateur pour se connecter

        try{        //Le code qu'on essaye de faire
            $this->connexion = new PDO("mysql:dbname=" .$PARAM_nom_bd.";host=".$PARAM_hote,
                                $PARAM_utilisateur, 
                                $PARAM_mot_passe);
        }catch (Exception $monException){
            echo "Erreur : ".$monException->getMessage()."<br/>"; 
            echo "Code : ".$monException->getCode();
        }
    }

    //Les fonctions (Le comportement)
    public function getConnexion(){
        return $this->connexion;
    }

    //Fonction pour insérer un nouveau maitre
    public function insertMaster($nomMaitre, $telMaitre){

        //Je prépare la requête
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Maitres (nom, telephone) VALUES (:paramNom, :paramTel)");

        //J'exécute la requête
        //En lui passant les valeurs en paramètres
        $pdoStatement->execute(array(
            "paramNom"=>$nomMaitre,
            "paramTel"=>$telMaitre
        ));

        //Pour débugger et vérifier que tout s'est bien passé
        //var_dump($pdoStatement->errorInfo());


        //Je récupère l'id qui a été créé par la base de données
        $id = $this->connexion->lastInsertId();
        return $id;
    }//Fin fonction insertMaster

    //Fonction pour insérer un nouveau chien
    public function insertDog ($nomChien, $ageChien, $raceChien, $maitreChien){

        //Je prépare la requête
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Chiens (nom, age, race, id_maitre) VALUES (:paramNom, :paramAge, :paramRace, :paramMaitre)");
            
        //Pour débugger et vérifier que tout s'est bien passé
        //var_dump($pdoStatement->errorInfo());

        //J'exécute la requête
        //En lui passant les valeurs en paramètres
        $pdoStatement->execute(array(
            "paramNom"=>$nomChien,
            "paramAge"=>$ageChien,
            "paramRace"=>$raceChien,
            "paramMaitre"=>$maitreChien
        ));

        //Je récupère l'id qui a été créé par la base de données
        $id = $this->connexion->lastInsertId();
        return $id;
    }//Fin fonction insertDog

    //Fonction pour récupérer tous les chiens
    public function getAllDogs(){
        //On prépare la reque
        $pdoStatement = $this->connexion->prepare(
            "SELECT id, nom, race FROM Chiens"
        );

        //On exécute la requête
        $pdoStatement->execute();

        //On stocke en php le résultat de la requête
        $chiens = $pdoStatement->fetchAll(PDO::FETCH_CLASS, "Chien");//"::" = "->"

        //Je retourne la liste de chiens
        return $chiens;

    }
    
        // Fonction qui recupère un chien en fonction de son id
        public function getDogById($id){
            // Je prépare ma requête
            $pdoStatement = $this->connexion->prepare(
                "SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
                FROM Chiens c
                INNER JOIN Maitres m
                ON c.id_maitre = m.id
                WHERE c.id = :idChien"
            );

            // J'exécute ma requête
            $pdoStatement->execute(
                array("idChien" => $id)
            );

            // Je recupere et je stocke le resultat
            $monChien = $pdoStatement->fetchObject("Chien");
           
            return $monChien;
        }
        // Fonction pour supprimer un chien de la liste des données
        public function deleteChien($id){
            //Je prépare ma requete auprès de ma base de donnée
            $pdoStatement = $this->connexion->prepare(
                "DELETE
                FROM Chiens
                WHERE id = :idChien"
            );
        //J'exécute la requête
            $pdoStatement->execute(
                (["idChien" => $id])
        );
        //Récupère le code de retour de l'execution de la requête
        $errorCOde =  $pdoStatement->errorCOde();
        if($errorCOde == 0){
            //Si ca c bien passé renvoyer true
            return true;
        }else{
            return false;
        }
        }
        // fonction update qui permet de mettre à jour les informations
        public function updateDog($id, $nom, $age, $race){
            // je prépare ma requete
            $pdoStatement = $this->connexion->prepare(
                "UPDATE Chiens
                SET nom = :nomChien, age = :ageChien, race = raceChien
                WHERE id = :idChien"
            );
            // Exécution de la requete et mapping des valeurs
            $pdoStatement->execute(
                Array(
                    "nomChien" => $nom,
                    "ageChien" => $age,
                    "raceChien" => $race,
                    "idChien" => $id
                )
            );
            // recupère le code de retour de l'execution de la requete
            $errorCOde =  $pdoStatement->errorCOde();
                if($errorCOde == 0){
                //Si ca c bien passé renvoyer true
            return true;
            }else{
                //Si cà s'est mal passé renvoyedr false
            return false;   
            }
        }
       //Fontion pour recupéerer tous les maitres
       public function getAllMaster(){
           //preparer ma requete
           $pdoStatement = $this->connexion->prepare(
               "SELECT * FROM Maitres"
           );
           // Execution de ma requete
           $pdoStatement->execute();
           //Recupere les données
           $listeMaitres = $pdoStatement->fetchAll(PDO::FETCH_CLASS, "Maitre");
           //je retrourne à ma liste
           return $listeMaitres;
       } 
    }   // Fin Database
?>
