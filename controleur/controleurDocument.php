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
        $titre = "Résultat de la recherche";
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        if (isset($_POST["cat"])) {
            $tableau = Document::searchDoc($_POST['titre'], $_POST['auteur'], $_POST['annee'], $_POST['cat']);
        } else {
            $tableau = Document::searchDoc($_POST['titre'], $_POST['auteur'], $_POST['annee']);
        }

        echo ('<h1 class="title">Résultat de la recherche');
        if ($_POST['titre'] != NULL) {
            echo (': ' . $_POST['titre']);
        }
        echo ('</h1>');

        include("./View/search-result.php");
        include("./View/footer.php");
    }

    public static function lireDocument()
    {
        $numDocument = $_POST['numDocument'];
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
        include("./View/footer.php");
    }

}


?>