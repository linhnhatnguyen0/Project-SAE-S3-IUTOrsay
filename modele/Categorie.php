<?php

class Categorie
{

  //attribut
  private $NumCat;
  private $NomCat;



  //getter
  public function getNumCat()
  {
    return $this->NumCat;
  }
  public function getNomCat()
  {
    return $this->NomCat;
  }


  //setter
  public function setNumCat($n)
  {
    $this->NumCat = $n;
  }
  public function setNomCat($t)
  {
    $this->NomCat = $t;
  }


  //constructeur
  public function __construct($num = NULL, $nom = NULL)
  {
    if (!is_null($num) && !is_null($nom)) {
      $this->NumCat = $num;
      $this->NomCat = $nom;

    }
  }

  public static function getAllCategories() {
		$requete = "SELECT * FROM Categorie;";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Categorie');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}

}

?>