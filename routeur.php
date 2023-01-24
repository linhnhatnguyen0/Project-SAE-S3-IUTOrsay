<?php


require_once("./config/connexion.php");
Connexion::connect();

// insertion des fichiers importants óçíþ
require_once("./modele/session.php");
require_once("./controleur/controleur.php");


$controleur = "controleur";
$action = "controleurIndex";
// Path: routeur.php
$tableauControlleur = ["controlleur", "controleurDocument", "controleurUtilisateur"];

if (isset($_GET["controleur"]) && in_array($_GET["controleur"], $tableauControlleur)) {
    $controleur = $_GET["controleur"];
    @require_once("./controleur/" . $controleur . ".php");
}
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "controleurIndex";
}
if (isset($_GET["id"])) {
    $controleur::$action($_GET["id"]);
} else {
    $controleur::$action();
}

?>