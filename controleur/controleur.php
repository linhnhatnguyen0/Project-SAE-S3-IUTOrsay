<?php
require_once("modele/Auteur.php");
require_once("modele/Document.php");
require_once("modele/Categorie.php");
require_once("modele/TypeDocument.php");
require_once("modele/Exemplaire.php");
require_once("modele/emprunt.php");
require_once("modele/session.php");
require_once("./controleur/controleurUtilisateur.php");
require_once("./controleur/controleurDocument.php");
require_once("./controleur/controleurEmprunt.php");
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
        if (!Session::userConnected() && !Session::userConnecting()) {
            ControleurUtilisateur::afficherLogin();
        } else {
            $titre = "verifier dispo";
            $tableauExemplaireDispo = Exemplaire::listerExemplaireDisponible($_GET['numDoc']);
            $tableau = Document::getDocumentByNumDocument($_GET["numDoc"]);

            $titreDoc = $tableau->getTitre();
            $nomAuteur = Auteur::getAuteurById($tableau->getNumAuteur());
            $nomA = $nomAuteur->getNomAuteur() . $nomAuteur->getPrenomAuteur();
            $annee = $tableau->getAnneeParution();
            $nomTypeD = $tableau->getTypeDocByDoc()->getNomTypeD();
            $nomCat = $tableau->getCategorieByDoc()->getNomCat();
            $login = $_SESSION["login"];
            include("./View/head.php");
            include("./controleur/headerVerify.php");
            if ($tableauExemplaireDispo != NULL) {
                //Cas où il y a des exemplaires disponibles
                $notification = '<p>Une exemplaire est disponible</p>
                <a href="./index.php?controleur=controleurEmprunt&action=ajouterEmprunt&numE=' . $tableauExemplaireDispo . '&numU=' . $login . '">Emprunter</a>';
            } else {
                $notification = "<p>Pas de exemplaire disponible</p>";
                echo "<pre>";
                echo ($tableauExemplaireDispo);
                echo "</pre>";
                //Cas où il n'y a pas d'exemplaire disponible
            }
            include("./View/emprunter-form.php");
            include("./View/footer.php");
        }
    }




    public static function aPropos()
    {
        $titre = "A propos";
        include("./View/head.php");

        include("./controleur/headerVerify.php");

        include("./View/Infos.php");

        include("./View/footer.php");
    }

    public static function cata_main()
    {
        $titre = "A propos";
        include("./View/head.php");

        include("./controleur/headerVerify.php");

        include("./View/cata-main.php");

        include("./View/footer.php");
    }


}

?>