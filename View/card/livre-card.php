<?php
for ($i = 0; $i < count($tableauLivre); $i++) {   
    echo (' <div class="livre">
                <div class="livre-img">
                    <img src="./img/Victor_Hugo_001 1.png" alt="" />
                </div>
                <div class="livre-title">
                    <h3>
                    ');
    echo ($tableauLivre[$i]->getTitre());
    echo ('
        </h3>');
    echo ('<p><strong>Auteur:</strong> ');
    $auteur = $tableauLivre[$i]->getAuteurByDoc();
    echo ($auteur->getNomAuteur()." ".$auteur->getPrenomAuteur());
    echo ('</p>');
    echo ('<p><strong>Année de parution:</strong> ');
    echo ($tableauLivre[$i]->getAnneeParution());
    echo ('</p>');
    echo('<ul>');

    if($tableauLivre[$i]->getNumCat() != NULL){
        $categorie = $tableauLivre[$i]->getCategorieByDoc();
        echo("<li>".$categorie->getNomCat()."</li>");
    }
    $TypeDoc = $tableauLivre[$i]->getTypeDocByDoc();
    echo("<li>".$TypeDoc->getNomTypeD()."</li>");
    echo('</ul>');
    echo('<a>Emprunter</a>');
    echo ('
        </div>
        </div>');
    }








?>
