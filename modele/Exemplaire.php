<?php

class Exemplaire
{

  //attribut
  private $NumExemplaire;
  private $EtatExemplaire;
  private $NumLangue;
  private $NumDocument;


  //getter
  public function geteNumExemplaire()
  {
    return $this->NumExemplaire;
  }
  public function getEtatExemplaire()
  {
    return $this->EtatExemplaire;
  }
  public function getNumLangue()
  {
    return $this->NumLangue;
  }
  public function getNumDocument()
  {
    return $this->NumDocument;
  }

  //setter
  public function setNumExemplaire($n)
  {
    $this->NumExemplaire = $n;
  }
  public function setEtatExemplaire($e)
  {
    $this->EtatExemplaire = $e;
  }
  public function setNumLangue($n)
  {
    $this->NumLangue = $n;
  }
  public function setgetNumDocument($n)
  {
    $this->getNumDocument = $n;
  }


  //constructeur
  public function __construct($num = NULL, $etat = NULL)
  {
    if (!is_null($num) && !is_null($etat)) {
      $this->NumExemplaire = $num;
      $this->EtatExemplaire = $etat;
    }
  }

  public static function verifierDisponible(){
    
  }

}

?>