<?php

Class Exemplaire {

    //attribut
    private $NumExemplaire;
    private $EtatExemplaire;

    //getter
    public function geteNumExemplaire() {return $this->NumExemplaire;}
    public function getEtatExemplaire() {return $this->EtatExemplaire;}


    //setter
    public function setNumExemplaire($n) {$this->NumExemplaire = $n;}
    public function setEtatExemplaire($n) {$this->EtatExemplaire = $c;}


    //constructeur
    public function __construct($num = NULL, $etat = NULL)  {
        if (!is_null($num) && !is_null($etat)) {
          $this->NumExemplaire = $num;
          $this->EtatExemplaire = $etat;
        }
      }

}

?>