<?php

class Langue
{

  //attribut
  private $NumAuteur;
  private $CodeLangue;
  private $Langue;

  //getter
  public function getNumLangue()
  {
    return $this->Langue;
  }
  public function getCodeLangue()
  {
    return $this->CodeLangue;
  }
  public function getLangue()
  {
    return $this->Langue;
  }


  //setter
  public function setNumLangue($n)
  {
    $this->Langue = $n;
  }
  public function setCodeLangue($c)
  {
    $this->CodeLangue = $c;
  }
  public function setLangue($l)
  {
    $this->Langue = $l;
  }



  //constructeur
  public function __construct($num = NULL, $code = NULL, $langue = NULL)
  {
    if (!is_null($num) && !is_null($code) && !is_null($langue)) {
      $this->Langue = $num;
      $this->CodeLangue = $code;
      $this->Langue = $langue;

    }
  }

}

?>