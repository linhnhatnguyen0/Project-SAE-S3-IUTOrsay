<?php
require_once("./config/connexion.php");
Connexion::connect();

Class Document {

    //attribut
    private $NumDocument;
    private $Titre;
    private $AnneeParution;
    private $Langue;
    private $Autorisation;

    

    //getter
    public function getNumDocument() {return $this->NumUtilisateur;}
    public function getTitre() {return $this->Titre;}
    public function getAnneeParution() {return $this->AnneeParution;}
    public function getLangue() {return $this->Langue;}
    public function getAutorisation() {return $this->Autorisation;}

    public function get($attribut){
      return $this->$attribut;
    }


    //setter
    public function setNumDocument($n) {$this->NumUtilisateur = $n;}
    public function setTitre($t) {$this->Titre = $t;}
    public function setAnneeParution($a) {$this->AnneeParution = $a;}
    public function setLangue($l) {$this->Langue = $l;}
    public function setAutorisation($au) {$this->Autorisation = $au;}

    public function set($attribut, $valeur){
      $this->$attribut = $valeur;
    }

    //constructeur
    /*
    public function __construct($num = NULL, $titre = NULL, $annee = NULL, $lang = NULL)  {
        if (!is_null($num) && !is_null($titre) && !is_null($annee) && !is_null($lang)) {
          $this->NumUtilisateur = $num;
          $this->Titre = $titre;
          $this->AnneeParution = $annee;
          $this->Langue = $lang;
  
        }
      }*/

      public function __construct($donnees = NULL)  {
        if (!is_null($donnees)) {
          foreach($donnees as $attribut => $valeur){
            $this->set($attribut, $valeur);
          }
        }
      }



      public static function addDocument($n, $t, $a, $l) {
        $requetePreparee = "INSERT INTO Document (`NumDocument`, `Titre`,`AnneeParution`, `Langue`) VALUES (:n_tag, :t_tag, :a_tag, :l_tag);";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
        $valeurs = array(
            "n_tag" => $n,
            "t_tag" => $t,
            "a_tag" => $a,
            "l_tag" => $l,
        );
        try {
            $req_prep->execute($valeurs);
            return true;
        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage()."<br>";
            return false;
        }
    }

    public static function getDocumentByNumDocument($NumDocument) {
      $requetePreparee = "SELECT * FROM Document WHERE NumDocument = :tag_NumDocument;";
      $req_prep = Connexion::pdo()->prepare($requetePreparee);
      $valeurs = array("tag_NumDocument" => $NumDocument);
      try {
          $req_prep->execute($valeurs);
          $req_prep->setFetchMode(PDO::FETCH_CLASS,'Document');
          $v = $req_prep->fetch();
          if (!$v)
              return false;
          return $v;
      } catch (PDOException $e) {
          echo "erreur : ".$e->getMessage()."<br>";
      }
      return false;
  }


}

?>