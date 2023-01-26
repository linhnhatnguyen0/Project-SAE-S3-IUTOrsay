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

if (isset($_POST["controleur"]) && in_array($_POST["controleur"], $tableauControlleur)) {
    $controleur = $_POST["controleur"];
    @require_once("./controleur/" . $controleur . ".php");
} else if (isset($_GET["controleur"]) && in_array($_GET["controleur"], $tableauControlleur)) {
    $controleur = $_GET["controleur"];
    @require_once("./controleur/" . $controleur . ".php");
} else {
    $controleur = "controleur";
}
if (isset($_POST["action"])) {
    $action = $_POST["action"];
} else if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "controleurIndex";
}
if (isset($_GET["id"])) {
    $controleur::$action($_GET["id"]);
} else if (isset($_POST["id"])) {
    $controleur::$action($_POST["id"]);
} else {
    $controleur::$action();
}

?>