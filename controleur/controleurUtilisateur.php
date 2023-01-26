<?php
require_once("./modele/utilisateur.php");
require_once("./controleur/controleur.php");
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
        $tableauAuteurPopulaire = Auteur::getPopularAuteurs();
        $tableauLivrePopulaire = Document::getPopularDocuments();
        $l = $_POST["login"];
        $mdp = $_POST["mdp"];
        if (Utilisateur::checkMDP($l, $mdp)) {
            $_SESSION["login"] = $l;
            include("./View/head.php");
            include("./View/headerUtilisateur.php");
            include("./View/mainPage.php");
            include("./View/footer.php");
        } else {
            ControleurUtilisateur::afficherLogin();
        }
    }
    public static function deconnecterUtilisateur()
    {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 1);
        Controleur::controleurIndex();
    }
    public static function afficherLogin()
    {
        $titre = "Login";
        include("./View/head.php");
        include("./View/login.php");
        include("./View/footer.php");

    }
    public static function afficherSignUp()
    {
        $titre = "Sign Up";
        include("./View/head.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }
    public static function afficherAccount()
    {
        $titre = "Account detail";
        $login = $_SESSION["login"];
        $tableau = Utilisateur::getUtilisateurByLogin($login);
        // echo "<pre>";
        // print_r($tableau);
        // echo "</pre>";
        include("./View/head.php");
        include("./View/profil.php");
        include("./View/footer.php");
    }
    public static function ajouterUtilisateur()
    {
        $titre = "modification utilisateur";
        $n = $_POST["nom"];
        $p = $_POST["prenom"];
        $et = $_POST["etab"];
        $e = $_POST["email"];
        $tel = $_POST["tel"];
        $l = $_POST["login"];
        $m = $_POST["mdp"];
        $b = Utilisateur::ajouterUtilisateur($n, $p, $et, $e, $tel, $l, $m);
        self::controleurIndexConnected();
    }
    public static function updateUtilisateur()
    {
        $titre = "modification utilisateur";
        $n = $_POST["nom"];
        $p = $_POST["prenom"];
        $et = $_POST["etab"];
        $e = $_POST["email"];
        $tel = $_POST["tel"];
        $login = $_SESSION["login"];
        $b = Utilisateur::updateUtilisateur($n, $p, $et, $e, $tel, $login);
        if ($b) {
            echo ("vrai");
        } else {
            echo ("false");
        }
        self::controleurIndex();
    }
}
?>