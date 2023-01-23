<?php
for ($i = 0; $i < $tableauAuteur; $i++) {
    echo (' <div class="auteur">
        <div class="auteur-img">
            <img src="./img/Victor_Hugo_001 1.png" alt="" />
        </div>
        <div class="auteur-title">
            <h3>
                ');
    echo ($tableauAuteur[$i]->getNomAuteur() . " " . $tableauAuteur[$i]->getPreNomAuteur());
    echo ('
    </h3>');
    echo ($tableauAuteur[$i]->getAnneeNaissance());
    echo ('<p>');
    Document::getNomDocumentByAuteur($tableauAuteur[$i]->getNumAuteur());
    echo ('</p>
    <a href="');
    echo ("./routeur.php?controleur=controleurDocument&action=getDocumentByAuteur&id={$tableauAuteur[$i]->getNumAuteur()}");
    echo ('">Consulter
        ses oeuvres</a>
    </div>
    </div>');
}

?>