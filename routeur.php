<?php
// Path: routeur.php
$controleur = "controleur";
if (isset($_GET["controleur"])) {
    $controleur = $_GET["controleur"];
}
@require_once("./controleur/" . $controleur . "php");
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "controleurIndex";
}
if (isset($_GET["id"])) {
    $controleur::$action($_GET["id"]);
} else {
    $controleur::$action;
}
?>