<?php

Class Langue {

    //attribut
    private $NumAuteur;
    private $CodeLangue;
    private $Langue;

    //getter
    public function getNumLangue() {return $this->NumLangue;}
    public function getCodeLangue() {return $this->CodeLangue;}
    public function getLangue() {return $this->Langue;}


    //setter
    public function setNumLangue($n) {$this->NumLangue = $n;}
    public function setCodeLangue($n) {$this->CodeLangue = $c;}
    public function setLangue($p) {$this->Langue = $L;}



    //constructeur
    public function __construct($num = NULL, $nom = NULL, $L = NULL)  {
        if (!is_null($num) && !is_null($code) && !is_null($L)) {
          $this->NumLangue = $num;
          $this->CodeLangue = $code;
          $this->Langue = $L;

        }
      }

}

?>