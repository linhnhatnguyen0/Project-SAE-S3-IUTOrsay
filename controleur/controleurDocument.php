<?php
require_once("modele/Document.php");
require_once("modele/modele.php");

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
        // echo "<pre>";
        // print_r($tableau);
        // echo "</pre>";
        $titre = "Auteur " . $tableau[1]->getNomAuteur() . " " . $tableau[1]->getPreNomAuteur();
        include("./View/head.php");
        include("./View/headerVisitor.php");
        echo ('<h1 class="title">Résultat: ');
        echo $titre;
        echo ('</h1>');
        include("./View/search-result.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }

}


?>