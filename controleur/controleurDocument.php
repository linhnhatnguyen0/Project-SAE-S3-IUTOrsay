<?php
require_once("modele/Document.php");
require_once("modele/modele.php");
require_once("modele/session.php");
require_once("modele/Categorie.php");
require_once("modele/TypeDocument.php");
class ControleurDocument
{

    public static function getResultSearch()
    {
        $titre = "Résultats de la recherche";
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        if (isset($_GET["cat"])) {
            $tableau = Document::searchDoc($_GET['titre'], $_GET['auteur'], $_GET['annee'], $_GET['cat']);
        } else {
            $tableau = Document::searchDoc($_GET['titre'], $_GET['auteur'], $_GET['annee']);
        }
        
        echo ('<h1 class="title">Résultat: ');
        if(isset($_GET['titre'])){

        }
        if(isset($_GET['auteur'])){
            
        }
        if(isset($_GET['annee'])){
            
        }
        if(isset($_GET['cat'])){
            
        }
        echo $titre;
        echo ('</h1>');

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
        include("./controleur/headerVerify.php");
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