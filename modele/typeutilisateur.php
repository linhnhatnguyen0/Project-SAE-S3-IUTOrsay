<?php

Class TypeUtilisateur {

    //attribut
    private $NumType;
    private $NomType;

    //getter
    public function getNumType() {return $this->NumType;}
    public function getNomType() {return $this->NomType;}

    //setter
    public function setNumType($n) {$this->NumType = $n;}
    public function setNomType($n) {$this->NomType = $n;}


    //constructeur
    public function __construct($num = NULL, $nom = NULL)  {
        if (!is_null($num) && !is_null($nom)) {
          $this->NumType = $num;
          $this->NomType = $nom;
        }
      }

}

?>