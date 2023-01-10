<?php
require_once("./config/connexion.php");
Connexion::connect();

class Document
{

  //attribut
  private $NumDocument;
  private $Titre;
  private $AnneeParution;
  private $Autorisation;
  private $NumTypeD;
  private $NumAuteur;
  private $NumCat;
  private $DateAjout;



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


  public static function getDocumentByAuteur($idAuteur)
  {
    $req_prep = "SELECT Titre,NomAuteur,PrenomAuteur,AnneeParution,NomTypeD,NomCat FROM Document NATURAL JOIN TypeDocument, NATURAL JOIN Categorie, NATURAL JOIN Auteur, WHERE numAuteur = :tag;";
    $resultat = Connexion::pdo()->prepare($req_prep);
    $resultat->execute([":tag" => $idAuteur]);
    $resultat->setFetchMode(PDO::FETCH_CLASS, "Document");
    $tableau = $resultat->fetchAll();
    return $tableau;
  }
  public function afficherUne()
  {
    echo ('<div class="search-result-card">
    <div class="search-result-card-img">
        <img src="./img/miserable.jpg" alt="image de la plante">
    </div>
    <div class="search-result-card-title">
        <h3><?php echo $tableau[0]; ?></h3>
        <p><strong>Auteur:</strong> <?php echo ($tableau[1] + " " + $tableau[2]);?></p>
        <p><strong>Année parution:</strong> <?php echo $tableau[3] ?></p>
        <ul>
            <li><?php echo $tableau[4] ?></li>
            <li><?php echo $tableau[5] ?></li>
        </ul>
        <a>Emprunter</a>
    </div>
    </div>');
  }


}

?>