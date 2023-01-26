<?php
require_once("modele.php");

class Exemplaire extends Modele
{
  protected static $objet = "Exemplaire";

  //attribut
  private $NumExemplaire;
  private $EtatExemplaire;
  private $NumLangue;
  protected $NumDocument;

  //getter
  public function getNumExemplaire()
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
    $this->NumDocument = $n;
  }


  //constructeur
  public function __construct($num = NULL, $etat = NULL)
  {
    if (!is_null($num) && !is_null($etat)) {
      $this->NumExemplaire = $num;
      $this->EtatExemplaire = $etat;
    }
  }

  // public static function listerExemplaireDisponible($nd, $l){
  //   $requetePreparee1 = "SELECT * FROM Exemplaire NATURAL JOIN Emprunt WHERE NumDocument = ".$nd;
  //   $resultat1 = Connexion::pdo()->query($requetePreparee1);
  //   try {
  //     $resultat1->setFetchMode(PDO::FETCH_CLASS,'Exemplaire');
  //     $tableau = $resultat1->fetchAll();
  //     if(count($tableau) == 0){
  //       $requetePreparee2 = "SELECT * FROM Exemplaire WHERE NumDocument = ".$nd." AND NumLangue = ".$l." ";
  //       $resultat2 = Connexion::pdo()->query($requetePreparee2);
  //       $resultat2->setFetchMode(PDO::FETCH_CLASS,'Exemplaire');
  //       $tableau = $resultat2->fetchAll();
  //       return $tableau;
  //     }else{
  //       $requetePreparee2 = "SELECT * FROM Exemplaire NATURAL JOIN Emprunt WHERE DateRenduReelle IS NOT NULL AND NumDocument = ".$nd." AND NumLangue = ".$l." ";
  //       $resultat2 = Connexion::pdo()->query($requetePreparee2);  
  //       $resultat2->setFetchMode(PDO::FETCH_CLASS,'Exemplaire');
  //       $tableau = $resultat2->fetchAll();
  //       return $tableau;
  //     }
  //   } catch (PDOException $e) {
  //     echo "erreur : " . $e->getMessage() . "<br>";
  //     return false;
  //   }

  // }
  public static function listerExemplaireDisponible($nd)
  {
    $requetePreparee1 = "SELECT EtatExemplaire FROM Exemplaire WHERE NumDocument = " . $nd;
    echo ($requetePreparee1);
    $resultat1 = Connexion::pdo()->query($requetePreparee1);
    try {
      $resultat1->setFetchMode(PDO::FETCH_CLASS, 'Exemplaire');
      $tableau = $resultat1->fetchAll();
      echo "<pre>";
      print_r($tableau);
      echo "</pre>";
      foreach ($tableau as $value) {
        if ($value->getEtatExemplaire() == "Bon") {
          return true;
        } else
          return false;
      }
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
      return false;
    }
  }


}

?>