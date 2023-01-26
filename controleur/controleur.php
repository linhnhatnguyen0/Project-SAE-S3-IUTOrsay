<?php
require_once("modele/Auteur.php");
require_once("modele/Document.php");
require_once("modele/Categorie.php");
require_once("modele/TypeDocument.php");
require_once("modele/Exemplaire.php");
require_once("modele/emprunt.php");
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
        include("./View/footer.php");
    }

    public static function controleurSearch()
    {
        $titre = "Recherche";
        $tableauCategorie = Categorie::getAllCategories();
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        include("./View/search-tab.php");
        include("./View/footer.php");
    }

    public static function verifierdispo()
    {
        $titre = "verifier dispo";
        include("./View/head.php");
        include("./controleur/headerVerify.php");
        $tableauExemplaireDispo = Exemplaire::listerExemplaireDisponible($_POST['numDoc'], $_POST['numLangue']);
        /* -- TEST D'AJOUT D'EMPRUNT --
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d');
        echo ($date);
        Emprunt::addEmprunt($date, 1, 67); 
        */
        if(count($tableauExemplaireDispo) > 0){
            //Cas où il y a des exemplaires disponibles

            //test getDocumentById();
            $doc = $tableauExemplaireDispo[0]->getDocumentById();
            echo ($doc->getNumDocument());
        } else {
            //Cas où il n'y a pas d'exemplaire disponible
            echo ("<h1>Pas d'exemplaire disponible pour " . $_POST['numDoc'] . " en langue " . $_POST['numLangue'] . "</h1>");
        }
        include("./View/footer.php");
    }

    


    public static function aPropos(){
        $titre = "A propos";
        include("./View/head.php");

        include("./controleur/headerVerify.php");

        include("./View/Infos.php");
        
        include("./View/footer.php");
    }

    public static function cata_main(){
        $titre = "A propos";
        include("./View/head.php");

        include("./controleur/headerVerify.php");

        include("./View/cata-main.php");
        
        include("./View/footer.php");
    }


}

?>