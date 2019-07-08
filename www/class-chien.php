<?php
    class Chien{
        //Attributs
        //Attributs spécifique au chien
        private $id;
        private $nom;
        private $age;
        
        private $race;
        //Attributs du maitre chien
        private $nomMaitre;
        private $telephone;

        //Constructeur par défaut

        //Fonctions
        public function __set($name, $value){}
        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getAge(){
            return $this->age;
        }
        public function getRace(){
            return $this->race;
        }
        public function getNomMaitre(){
            return $this->nomMaitre;
        }
        public function getTelephone(){
            return $this->telephone;
        }
    }
?>