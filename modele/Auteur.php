<?php

Class Auteur {

    //attribut
    private $NumAuteur;
    private $NomAuteur;
    private $PreNomAuteur;
    private $AnneeNaissance;

    //getter
    public function getNumAuteur() {return $this->NumAuteur;}
    public function getNomAuteur() {return $this->NomAuteur;}
    public function getPreNomAuteur() {return $this->PreNomAuteur;}
    public function getAnneeNaissance() {return $this->AnneeNaissance;}


    //setter
    public function setNumAuteur($n) {$this->NumAuteur = $n;}
    public function setNomAuteur($n) {$this->NomAuteur = $n;}
    public function setPreNomAuteur($p) {$this->PreNomAuteur = $p;}
    public function setAnneeNaissance($a) {$this->AnneeNaissance = $a;}



    //constructeur
    public function __construct($num = NULL, $nom = NULL, $prenom = NULL, $annee = NULL)  {
        if (!is_null($num) && !is_null($nom) && !is_null($prenom) && !is_null($annee)) {
          $this->NumAuteur = $num;
          $this->NomAuteur = $nom;
          $this->PreNomAuteur = $prenom;
          $this->AnneeNaissance = $annee;
        }
      }

}

?>