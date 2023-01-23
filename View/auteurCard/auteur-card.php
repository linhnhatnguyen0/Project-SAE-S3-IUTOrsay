<?php
//for ($i = 0; $i < $tableauAuteur; $i++) {
echo (' <div class="auteur">
        <div class="auteur-img">
            <img src="./img/Victor_Hugo_001 1.png" alt="" />
        </div>
        <div class="auteur-title">
            <h3>
                ');
echo ($tableauAuteur1->getNomAuteur() . " " . $tableauAuteur1->getPreNomAuteur());
echo ('
    </h3>');
echo ($tableauAuteur1->getAnneeNaissance());
echo ('<p>');
Document::getNomDocumentByAuteur($tableauAuteur1->getNumAuteur());
echo ('</p>
    <a href="');
echo ("./routeur.php?controleur=controleurDocument&action=getDocumentByAuteur&id={$tableauAuteur1->getNumAuteur()}");
echo ('">Consulter
        ses oeuvres</a>
    </div>
    </div>');
//}

?>