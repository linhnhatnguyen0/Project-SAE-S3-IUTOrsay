<?php
for ($i = 0; $i < count($tableauAuteur); $i++) {
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
    if ($tableauAuteur[$i]->getAnneeNaissance() != NULL) {
        echo ("Année de naissance: " . $tableauAuteur[$i]->getAnneeNaissance());
    } else {
        echo ('Année de naissance: inconnue');
    }
    echo ('<p>');
    Document::getNomDocumentByAuteur($tableauAuteur[$i]->getNumAuteur());
    echo ('</p>
    <a href="');
    echo ("./index.php?controleur=controleurDocument&action=getDocumentByAuteur&id={$tableauAuteur[$i]->getNumAuteur()}");
    echo ('">Consulter
        ses oeuvres</a>
    </div>
    </div>');
}

?>