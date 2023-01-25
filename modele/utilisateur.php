<?php

class Utilisateur
{

  //attribut
  private $NumUtilisateur;
  private $NomUtilisateur;
  private $PrenomUtilisateur;
  private $AdresseUtilisateur;
  private $TelephoneUtilisateur;
  private $loginUtilisateur;
  private $mdpUtilisateur;
  private $bloque;
  private $nbEmprunt;

  //getter
  public function getNumUtilisateur()
  {
    return $this->NumUtilisateur;
  }
  public function getNomUtilisateur()
  {
    return $this->NomUtilisateur;
  }
  public function getPrenomUtilisateur()
  {
    return $this->PrenomUtilisateur;
  }
  public function getAdresseUtilisateur()
  {
    return $this->AdresseUtilisateur;
  }
  public function getTelephoneUtilisateur()
  {
    return $this->TelephoneUtilisateur;
  }
  public function getLoginUtilisateur()
  {
    return $this->loginUtilisateur;
  }
  public function getMdpUtilisateur()
  {
    return $this->mdpUtilisateur;
  }
  public function getBloque()
  {
    return $this->bloque;
  }
  public function getNbEmprunt()
  {
    return $this->nbEmprunt;
  }

  public function get($attribut)
  {
    return $this->$attribut;
  }

  //setter
  public function setNumUtilisateur($n)
  {
    $this->NumUtilisateur = $n;
  }
  public function setNomUtilisateur($n)
  {
    $this->NomUtilisateur = $n;
  }
  public function setPrenomUtilisateur($p)
  {
    $this->PrenomUtilisateur = $p;
  }
  public function setAdresseUtilisateur($a)
  {
    $this->AdresseUtilisateur = $a;
  }
  public function setTelephoneUtilisateur($t)
  {
    $this->TelephoneUtilisateur = $t;
  }
  public function setLoginUtilisateur($l)
  {
    $this->loginUtilisateur = $l;
  }
  public function setMdpUtilisateur($m)
  {
    $this->mdpUtilisateur = $m;
  }
  public function setBloque($b)
  {
    $this->bloque = $b;
  }
  public function setNbEmprunt($n)
  {
    $this->nbEmprunt = $n;
  }


  public function set($attribut, $valeur)
  {
    $this->$attribut = $valeur;
  }



  //constructeur
  public function __construct($num = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $telephone = NULL, $login = NULL, $mdp = NULL)
  {
    if (!is_null($num) && !is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($telephone) && !is_null($login) && !is_null($mdp)) {
      $this->NumUtilisateur = $num;
      $this->NomUtilisateur = $nom;
      $this->PrenomUtilisateur = $prenom;
      $this->AdresseUtilisateur = $adresse;
      $this->TelephoneUtilisateur = $telephone;
      $this->loginUtilisateur = $login;
      $this->mdpUtilisateur = $mdp;
      $this->bloque = false;
      $this->nbEmprunt = 0;
    }
  }



  /*
  public static function ajouterUtilisateur($NomUtilisateur, $PrenomUtilisateur, $AdresseUtilisateur, $TelephoneUtilisateur, $loginUtilisateur, $mdpUtilisateur, $NumType, ) {
  $requetePreparee = "INSERT INTO Recette (`libelle`,`difficulte`, `description`) VALUES (:tag_libelle, :tag_difficulte, :tag_description);";
  $req_prep = Connexion::pdo()->prepare($requetePreparee);
  $valeurs = array(
  "tag_libelle" => $libelle,
  "tag_difficulte" => $difficulte,
  "tag_description" => $description,
  );
  try {
  $req_prep->execute($valeurs);
  } catch (PDOException $e) {
  echo "erreur : ".$e->getMessage()."<br>";
  }
  }*/

  public static function checkMDP($l, $m)
  {
    $requetePreparee = "SELECT * FROM Utilisateur WHERE loginUtilisateur = :l_tag and mdpUtilisateur = :m_tag;";
    $req_prep = connexion::pdo()->prepare($requetePreparee);
    $valeurs = array(
      "l_tag" => $l,
      "m_tag" => $m
    );
    $req_prep->execute($valeurs);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
    $tabUtilisateurs = $req_prep->fetchAll();
    if (sizeof($tabUtilisateurs) == 1)
      return true;
    else
      return false;
  }


}

?>