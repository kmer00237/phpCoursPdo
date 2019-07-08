<?php
    class Maitre{
        //Attributs du maitre 
        private $id;
        private $nom;
        private $telephone;

        //Constructeur par défaut

        //fonctions
        public function __set($name, $value){}

        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getTelephone(){
            return $this->telephone;
        }
    }
?>