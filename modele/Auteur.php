<?php
require_once("./config/connexion.php");
require_once("modele.php");
class Auteur extends Modele
{
  protected static $objet = "Auteur";

  //attribut
  protected $NumAuteur;
  private $NomAuteur;
  private $PrenomAuteur;
  private $AnneeNaissance;

  //getter
  public function getNumAuteur()
  {
    return $this->NumAuteur;
  }
  public function getNomAuteur()
  {
    return $this->NomAuteur;
  }
  public function getPreNomAuteur()
  {
    return $this->PrenomAuteur;
  }
  public function getAnneeNaissance()
  {
    return $this->AnneeNaissance;
  }


  //setter
  public function setNumAuteur($n)
  {
    $this->NumAuteur = $n;
  }
  public function setNomAuteur($n)
  {
    $this->NomAuteur = $n;
  }
  public function setPreNomAuteur($p)
  {
    $this->PrenomAuteur = $p;
  }
  public function setAnneeNaissance($a)
  {
    $this->AnneeNaissance = $a;
  }



  //constructeur
  public function __construct($num = NULL, $nom = NULL, $prenom = NULL, $annee = NULL)
  {
    if (!is_null($num) && !is_null($nom) && !is_null($prenom) && !is_null($annee)) {
      $this->NumAuteur = $num;
      $this->NomAuteur = $nom;
      $this->PrenomAuteur = $prenom;
      $this->AnneeNaissance = $annee;
    }
  }

  public static function getPopularAuteurs()
  {
    $requete = "SELECT COUNT(*) AS Lignes, NumAuteur, NomAuteur , PrenomAuteur, AnneeNaissance FROM Auteur NATURAL JOIN Document NATURAL JOIN Exemplaire GROUP BY NumAuteur ORDER BY Lignes DESC";
    $resultat = Connexion::pdo()->query($requete);
    $resultat->setFetchMode(PDO::FETCH_CLASS, 'Auteur');
    $tableau = $resultat->fetchAll();
    return $tableau;
  }


  public static function getAuteurById($NumAuteur)
  {
    $requetePreparee = "SELECT * FROM Auteur WHERE NumAuteur = :tag_n;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_n" => $NumAuteur);
    try {
      $req_prep->execute($valeurs);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Auteur');
      $v = $req_prep->fetch();
      if (!$v)
        return false;
      return $v;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
    return false;
  }

}

?>