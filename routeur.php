<?php
// Path: routeur.php
@include("./View/controlleur.php");
// Path: controlleur.php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "controllerIndex";
}
$controlleur = new Controlleur();
$controlleur->$page();
?>