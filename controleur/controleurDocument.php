<?php
require_once("modele/Document.php");

class ControleurDocument {

    public static function lireDocument(){
        $numDocument = $_GET['numDocument'];
        $document = Document::getDocumentByNumDocument($numDocument);

        $titre = $document->get('NomDocument');

    }

}


?>