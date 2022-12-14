<?php

Class Emprunt {

    //attribut
    private $NumEmprunt;
    private $DateEmprunt;
    private $DateRenduPrevu;
    private $DateRenduReelle;

    //getter
    public function getNumEmprunt() {return $this->NumEmprunt;}
    public function getDateEmprunt() {return $this->DateEmprunt;}
    public function getDateRenduPrevu() {return $this->DateRenduPrevu;}
    public function getDateRenduReelle() {return $this->DateRenduReelle;}


    //setter
    public function setNumEmprunt($n) {$this->NumEmprunt = $n;}
    public function setDateEmprunt($d) {$this->DateEmprunt = $d;}
    public function setDateRenduPrevu($d) {$this->DateRenduPrevu = $d;}
    public function setDateRenduReelle($d) {$this->DateRenduReelle = $d;}


    //constructeur
    public function __construct($num = NULL, $dateE = NULL, $dateRP = NULL, $dateRR = NULL)  {
        if (!is_null($num) && !is_null($dateE) && !is_null($dateRP) && !is_null($dateRR) ) {
          $this->NumEmprunt = $num;
          $this->DateEmprunt = $dateE;
          $this->DateRenduPrevu = $dateRP;
          $this->DateRenduReelle = $dateRR;
        }
      }

}

?>