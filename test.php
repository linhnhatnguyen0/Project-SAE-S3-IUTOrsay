<?php
require_once("modele/utilisateur.php");
require_once("modele/Auteur.php");
require_once("modele/Categorie.php");
require_once("modele/Document.php");
include("modele/emprunt.php");
require_once("modele/Exemplaire.php");
include("modele/Langue.php");
include("modele/regle.php");
include("modele/TypeDocument.php");
include("modele/typeutilisateur.php");

/*
$document = new Document(1, "Les Misérables", 2002, "Français");
*/

$tab = array(
    "NumDocument" => 2,
    "Titre" => "La Programmation PHP pour les Nuls",
    "AnneeParution" => 2012,
    "Langue" => "Français"
);

$document = new Document($tab);
$document = Document::getDocumentByNumDocument(2);

$titre = $document->get('Titre');
$annee = $document->get('AnneeParution');
$langue = $document->get('Langue');


echo "<p>Le titre de ce document est ".$titre." </p>";

print_r($document);

//Document::addDocument($document->get('NumDocument'), $titre, $annee, $langue);

?>