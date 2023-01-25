<?php
for ($i = 0; $i < count($tableauAuteurPopulaire); $i++) {
    echo (' <div class="auteur">
        <div class="auteur-img">
            <img src="./img/Victor_Hugo_001 1.png" alt="" />
        </div>
        <div class="auteur-title">
            <h3>
                ');
    echo ($tableauAuteurPopulaire[$i]->getNomAuteur() . " " . $tableauAuteurPopulaire[$i]->getPreNomAuteur());
    echo ('
    </h3>');
    echo ('<p>');
    if ($tableauAuteurPopulaire[$i]->getAnneeNaissance() != NULL) {
        echo ("Année de naissance: " . $tableauAuteurPopulaire[$i]->getAnneeNaissance());
    } else {
        echo ('Année de naissance: inconnue');
    }
    echo ('</p>');
    echo ('<p>');
    Document::getNomDocumentByAuteur($tableauAuteurPopulaire[$i]->getNumAuteur());
    echo ('</p>
    <a href="');
    echo ("./index.php?controleur=controleurDocument&action=getDocumentByAuteur&id={$tableauAuteurPopulaire[$i]->getNumAuteur()}");
    echo ('">Consulter
        ses oeuvres</a>
    </div>
    </div>');
    if ($i == 3) {
        $i = count($tableauLivrePopulaire);
    }
}

?>