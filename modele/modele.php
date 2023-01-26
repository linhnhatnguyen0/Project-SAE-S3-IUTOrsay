<?php
class Modele
{
    public function get($attribut)
    {
        return $this->$attribut;
    }

    public function getDocumentById()
    {
        $requetePreparee = "SELECT * FROM Document WHERE NumDocument = :tag_NumDocument;";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
        $valeurs = array("tag_NumDocument" => $this->NumDocument);
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

}
?>