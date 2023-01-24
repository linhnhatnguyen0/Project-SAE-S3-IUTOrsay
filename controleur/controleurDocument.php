<?php
require_once("modele/Document.php");
require_once("modele/modele.php");
require_once("modele/Categorie.php");
require_once("modele/TypeDocument.php");
class ControleurDocument
{

    public static function getResultSearch()
    {
        $titre = "yahoo";
        include("./View/head.php");
        include("./View/headerVisitor.php");
        $Document1 = Document::getDocumentByNumDocument(1);
        echo metaphone($Document1->getTitre())."</br>";
        if(isset($_GET["cat"])){
            $tableau = Document::searchDoc($_GET['titre'],$_GET['auteur'], $_GET['annee'], $_GET['cat']);
        }else{
            $tableau = Document::searchDoc($_GET['titre'],$_GET['auteur'], $_GET['annee']);
        }
        
        include("./View/search-result.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

    public static function lireDocument()
    {
        $numDocument = $_GET['numDocument'];
        $document = Document::getDocumentByNumDocument($numDocument);

        $titre = $document->get('NomDocument');

    }
    public static function getDocumentByAuteur($idAuteur)
    {
        $tableau = Document::getDocumentByAuteur($idAuteur);
        // echo "<pre>";
        // print_r($tableau);
        // echo "</pre>";
        $titre = "Auteur " . $tableau[1]->getNomAuteur() . " " . $tableau[1]->getPreNomAuteur();
        include("./View/head.php");
        include("./View/headerVisitor.php");
        echo ('<h1 class="title">Résultat: ');
        echo $titre;
        echo ('</h1>');
        include("./View/byAuthor-result.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

}


?>