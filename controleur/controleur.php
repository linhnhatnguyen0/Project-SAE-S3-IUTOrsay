<?php
require_once("modele/Auteur.php");
require_once("modele/Document.php");
require_once("modele/Categorie.php");
require_once("modele/TypeDocument.php");
require_once("modele/Exemplaire.php");
require_once("modele/session.php");
class Controleur
{
    public static function controleurIndex()
    {
        $titre = "Médiathèque Paris-Saclay";
        $Auteur1 = Auteur::getAuteurById(1);
        $Auteur2 = Auteur::getAuteurById(2);
        $Auteur3 = Auteur::getAuteurById(3);
        $Auteur4 = Auteur::getAuteurById(4);
        $tableauAuteur = array($Auteur1, $Auteur2, $Auteur3, $Auteur4);

        $Document1 = Document::getDocumentByNumDocument(1);
        $Document4 = Document::getDocumentByNumDocument(2);
        $Document3 = Document::getDocumentByNumDocument(8337);
        $Document2 = Document::getDocumentByNumDocument(26505);

        $tableauLivre = array($Document1, $Document2, $Document3, $Document4);

        $tableauAuteurPopulaire = Auteur::getPopularAuteurs();
        $tableauLivrePopulaire = Document::getPopularDocuments();
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        include("./View/mainPage.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

    public static function controleurSearch()
    {
        $titre = "Recherche";
        $tableauCategorie = Categorie::getAllCategories();
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        include("./View/search-tab.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

    public static function verifierdispo()
    {
        $titre = "verifier dispo";
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        $tableauExemplaireDispo = Exemplaire::listerExemplaireDisponible($_GET['numDoc'], $_GET['numLangue']);
        if (count($tableauExemplaireDispo) > 0) {
            //Cas où il y a des exemplaires disponibles
        } else {
            //Cas où il n'y a pas d'exemplaire disponible
            echo ("<h1>Pas d'exemplaire disponible pour " . $_GET['numDoc'] . " en langue " . $_GET['numLangue'] . "</h1>");
        }
        include("./View/signup.php");
        include("./View/footer.php");
    }


}

?>