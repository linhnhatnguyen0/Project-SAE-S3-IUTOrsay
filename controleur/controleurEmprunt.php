<?php
class controleurEmprunt
{

    public static function ajouterEmprunt()
    {
        Emprunt::addEmprunt($_GET["numU"], $_GET["numE"]);
        Exemplaire::updateExemplaire($_GET["numE"]);
        Controleur::controleurIndex();
    }
}
?>