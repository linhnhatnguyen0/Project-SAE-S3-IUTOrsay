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
        $tableauAuteur2 = Auteur::getAuteurById(2);
        $tableauAuteur3 = Auteur::getAuteurById(3);
        $tableauAuteur4 = Auteur::getAuteurById(4);
        $tableauAuteur = array($tableauAuteur1,$tableauAuteur2,$tableauAuteur3,$tableauAuteur4);
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