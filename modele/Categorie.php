<?php

Class Categorie {

    //attribut
    private $NumCat;
    private $NomCAt;

    

    //getter
    public function getNumCat() {return $this->NumCat;}
    public function getNomCat() {return $this->NomCat;}


    //setter
    public function setNumCat($n) {$this->NumCat = $nu;}
    public function setNomCat($t) {$this->NomCat = $no;}
    

    //constructeur
    public function __construct($num = NULL, $nom = NULL)  {
        if (!is_null($num) && !is_null($nom)) {
          $this->NumCat = $num;
          $this->NomCat = $Nom;
  
        }
      }

}

?>