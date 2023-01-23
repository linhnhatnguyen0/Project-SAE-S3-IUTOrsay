<?php
require_once("modele/Auteur.php");
require_once("modele/Document.php");
class Controleur
{
    public static function controleurIndex()
    {
        $titre = "Médiathèque Paris-Saclay";
        //$document = Document::getDocumentByNumDocument(1);

        $tableauAuteur1 = Auteur::getAuteurById(1);
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/mainPage.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

    public static function controleurSearch()
    {
        $titre = "Recherche";
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/search-tab.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

    function controllerPropos()
    {

    }
}

?>