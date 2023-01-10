<?php
require_once("modele/Document.php");

class ControleurDocument
{

    public static function lireDocument()
    {
        $numDocument = $_GET['numDocument'];
        $document = Document::getDocumentByNumDocument($numDocument);

        $titre = $document->get('NomDocument');

    }
    public static function getDocumentByAuteur($idAuteur)
    {
        $tableau = Document::getDocumentByAuteur($idAuteur);
        $titre = "Auteur" + $tableau[1] + " " + $tableau[2];
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/mainPage.php");
        include("./View/search-result.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

}


?>