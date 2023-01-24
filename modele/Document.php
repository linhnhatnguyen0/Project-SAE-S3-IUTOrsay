<?php
require_once("./config/connexion.php");
require_once("modele.php");
Connexion::connect();

class Document extends Modele
{

  //attribut
  protected $NumDocument;
  protected $Titre;
  protected $AnneeParution;
  protected $Autorisation;
  protected $NumTypeD;
  protected $NumAuteur;
  protected $NomAuteur;
  protected $PrenomAuteur;
  protected $NumCat;
  protected $DateAjout;



  //getter
  public function getNumDocument()
  {
    return $this->NumDocument;
  }
  public function getTitre()
  {
    return $this->Titre;
  }
  public function getAnneeParution()
  {
    return $this->AnneeParution;
  }
  public function getAutorisation()
  {
    return $this->Autorisation;
  }
  public function getNumAuteur()
  {
    return $this->NumAuteur;
  }
  public function getNomAuteur()
  {
    return $this->NomAuteur;
  }
  public function getPrenomAuteur()
  {
    return $this->PrenomAuteur;
  }
  public function getNumCat()
  {
    return $this->NumCat;
  }
  public function getNumTypeD()
  {
    return $this->NumTypeD;
  }

  public function get($attribut)
  {
    return $this->$attribut;
  }


  //setter
  public function setNumDocument($n)
  {
    $this->NumDocument = $n;
  }
  public function setTitre($t)
  {
    $this->Titre = $t;
  }
  public function setAnneeParution($a)
  {
    $this->AnneeParution = $a;
  }
  public function setAutorisation($au)
  {
    $this->Autorisation = $au;
  }

  public function set($attribut, $valeur)
  {
    $this->$attribut = $valeur;
  }


  public function __construct($donnees = NULL)
  {
    if (!is_null($donnees)) {
      foreach ($donnees as $attribut => $valeur) {
        $this->set($attribut, $valeur);
      }
    }
  }



  public static function getAllDocuments() {
		$requete = "SELECT * FROM Document;";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchMode(PDO::FETCH_CLASS,'Document');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}
  


  public static function searchDoc($titre = NULL, $auteur = NULL, $annee = NULL, $categorie = NULL){
    $requetePreparee = "SELECT * FROM Document NATURAL JOIN Auteur NATURAL JOIN TypeDocument NATURAL JOIN Categorie ";
    $arg = 0;
    if($titre != NULL){
      $requetePreparee = $requetePreparee." WHERE Titre LIKE '%".$titre."%' ";
      $arg = 1;
    }

    if($auteur != NULL  && $arg == 0){
      $requetePreparee = $requetePreparee."WHERE ( CONCAT(NomAuteur, ' ', PrenomAuteur) LIKE '%".$auteur."%' OR CONCAT(PrenomAuteur, ' ', NomAuteur) LIKE '%".$auteur."%' ) ";
      $arg = 1;
    }elseif($auteur != NULL && $arg == 1){
      $requetePreparee = $requetePreparee."AND ( CONCAT(NomAuteur, ' ', PrenomAuteur) LIKE '%".$auteur."%' OR CONCAT(PrenomAuteur, ' ', NomAuteur) LIKE '%".$auteur."%' ) ";
    }
    
    if($annee != NULL && $arg == 0){
      $requetePreparee = $requetePreparee."WHERE AnneeParution = ".$annee." ";
      $arg = 1;
    }elseif($annee != NULL && $arg == 1){
      $requetePreparee = $requetePreparee."AND AnneeParution = ".$annee." ";
    }

    if($categorie != NULL && $arg == 0){
      $requetePreparee = $requetePreparee."WHERE NumCat = ".$categorie." ";
      $arg = 1;
    }elseif($categorie != NULL && $arg == 1){
      $requetePreparee = $requetePreparee."AND NumCat = ".$categorie." ";
    }
    $resultat = Connexion::pdo()->prepare($requetePreparee);
    
    $valeurs = array(
      "t_tag" => $titre,
      "a_tag" => $auteur,
      "an_tag" => $annee,
      "c_tag" => $categorie
    );
    try {
      $resultat->execute($valeurs);
      $resultat->setFetchMode(PDO::FETCH_CLASS,'Document');
      $tableau = $resultat->fetchAll();
      return $tableau;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
      return false;
    }
  }



  public static function addDocument($n, $t, $a)
  {
    $requetePreparee = "INSERT INTO Document (`NumDocument`, `Titre`,`AnneeParution`) VALUES (:n_tag, :t_tag, :a_tag);";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array(
      "n_tag" => $n,
      "t_tag" => $t,
      "a_tag" => $a,
    );
    try {
      $req_prep->execute($valeurs);
      return true;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
      return false;
    }
  }


  public static function deleteDocumentByNumDocument($NumDocument)
  {
    $requetePreparee = "DELETE FROM Document WHERE NumDocument = :tag_NumDocument;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_NumDocument" => $NumDocument);
    try {
      $req_prep->execute($valeurs);
      return true;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
    return false;
  }

  public static function getDocumentByNumDocument($NumDocument)
  {
    $requetePreparee = "SELECT * FROM Document WHERE NumDocument = :tag_NumDocument;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_NumDocument" => $NumDocument);
    try {
      $req_prep->execute($valeurs);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Document');
      $v = $req_prep->fetch();
      if (!$v)
        return false;
      return $v;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
    return false;
  }

  public static function updateDocument($document)
  {
    $requetePreparee = "UPDATE Document SET Titre = :t_tag, AnneeParution = :ap_tag, Autorisation = :a_tag, NumTypeD = :td_tag, NumAuteur = :na_tag, NumCat = :c_tag WHERE NumDocument = :n_tag;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array(
      "n_tag" => $document->get('NumDocument'),
      "t_tag" => $document->get('Titre'),
      "ap_tag" => $document->get('AnneeParution'),
      "a_tag" => $document->get('Autorisation'),
      "td_tag" => $document->get('NumTypeD'),
      "na_tag" => $document->get('NumAuteur'),
      "c_tag" => $document->get('NumCat')
    );
    try {
      $req_prep->execute($valeurs);
      return true;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
      return false;
    }
  }

  public function getAuteurByDoc(){
    $requetePreparee = "SELECT * FROM Auteur WHERE NumAuteur = :tag_n;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_n" => $this->NumAuteur);
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

  public function getTypeDocByDoc(){
    $requetePreparee = "SELECT * FROM TypeDocument WHERE NumTypeD = :tag_n;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_n" => $this->NumTypeD);
    try {
      $req_prep->execute($valeurs);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'TypeDocument');
      $v = $req_prep->fetch();
      if (!$v)
        return false;
      return $v;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
    return false;
  }

  public function getCategorieByDoc(){
    $requetePreparee = "SELECT * FROM Categorie WHERE NumCat = :tag_n;";
    $req_prep = Connexion::pdo()->prepare($requetePreparee);
    $valeurs = array("tag_n" => $this->NumCat);
    try {
      $req_prep->execute($valeurs);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
      $v = $req_prep->fetch();
      if (!$v)
        return false;
      return $v;
    } catch (PDOException $e) {
      echo "erreur : " . $e->getMessage() . "<br>";
    }
    return false;
  }

  public static function getDocumentByAuteur($idAuteur)
  {
    $req_prep = "SELECT Titre,NomAuteur,PrenomAuteur,AnneeParution,NomTypeD,NomCat FROM Document NATURAL JOIN TypeDocument NATURAL JOIN Categorie NATURAL JOIN Auteur WHERE numAuteur = :tag;";
    $resultat = Connexion::pdo()->prepare($req_prep);
    $resultat->execute([":tag" => $idAuteur]);
    $resultat->setFetchMode(PDO::FETCH_CLASS, "Document");
    $tableau = $resultat->fetchAll();
    return $tableau;
  }
  public static function getNomDocumentByAuteur($idAuteur)
  {
    $req_prep = "SELECT Titre FROM Document NATURAL JOIN Auteur WHERE numAuteur = :tag;";
    $resultat = Connexion::pdo()->prepare($req_prep);
    $resultat->execute([":tag" => $idAuteur]);
    $resultat->setFetchMode(PDO::FETCH_CLASS, "Document");
    $tableau = $resultat->fetchAll();
    $string = "";
    foreach ($tableau as $value) {
      $string = $string . $value->getTitre() . ", ";
    }
    echo $string;
  }


  public function afficherUne()
  {
    echo ('<div class="search-result-card">
    <div class="search-result-card-img">
        <img src="./img/miserable.jpg" alt="image de la plante">
    </div>
    <div class="search-result-card-title">
        <h3>');
    echo "$this->Titre";
    echo ('</h3>
        <p><strong>Auteur:</strong> ');
    echo ("$this->NomAuteur $this->PrenomAuteur");
    echo ('</p>
        <p><strong>Année parution:</strong>
        ');
    echo "$this->AnneeParution";
    echo ('</p>
        <ul>
            <li>');
    echo "$this->NomTypeD";
    echo ('</li>
            <li>');
    echo "$this->NomCat";
    echo ('</li>
        </ul>
        <a>Emprunter</a>
    </div>
    </div>');
  }


}

?>