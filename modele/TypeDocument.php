<?php

class TypeDocument
{

  //attribut
  private $NumTypeD;
  private $NomTypeD;



  //getter
  public function getNumTypeD()
  {
    return $this->NumTypeD;
  }
  public function getNomTypeD()
  {
    return $this->NomTypeD;
  }


  //setter
  public function setNumTypeD($n)
  {
    $this->NumTypeD = $n;
  }
  public function setNomTypeD($t)
  {
    $this->NomTypeD = $t;
  }


  //constructeur
  public function __construct($num = NULL, $nom = NULL)
  {
    if (!is_null($num) && !is_null($nom)) {
      $this->NumTypeD = $num;
      $this->NomTypeD = $nom;
    }
  }

}

?>