<?php
require_once("./modele/utilisateur.php");
class ControleurUtilisateur extends Controleur
{
    public static function controleurIndexConnected()
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
        $l = $_GET["login"];
        $mdp = $_GET["mdp"];
        if (Utilisateur::checkMDP($l, $mdp)) {
            $_SESSION["login"] = $l;
            include("./View/head.php");
            include("./View/headerUtilisateur.php");
            include("./View/mainPage.php");
            include("./View/footer.php");
        } else {
            Controleur::controleurIndex();
        }
    }
}
?>