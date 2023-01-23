<?php
require_once("./config/connexion.php");
require_once("modele.php");
class Auteur extends Modele
{

  //attribut
  private $NumAuteur;
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
  public static function getAuteurById($idAuteur)
  {
    $req_prep = "SELECT * FROM Auteur WHERE numAuteur = :tag;";
    $resultat = Connexion::pdo()->prepare($req_prep);
    $resultat->execute([":tag" => $idAuteur]);
    $resultat->setFetchMode(PDO::FETCH_CLASS, "Auteur");
    $tableau = $resultat->fetchAll();
    return $tableau;
  }
}

?>