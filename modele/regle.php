<?php

Class Regle {

    //attribut
    private $numRegle;
    private $contenu;

    //getter
    public function getnumRegle() {return $this->numRegle;}
    public function getcontenu() {return $this->contenu;}

    //setter
    public function setnumRegle($n) {$this->numRegle = $n;}
    public function setcontenu($c) {$this->NomTcontenuype = $c;}


    //constructeur
    public function __construct($num = NULL, $c = NULL)  {
        if (!is_null($num) && !is_null($c)) {
          $this->numRegle = $num;
          $this->contenu = $c;
        }
      }

}

?>