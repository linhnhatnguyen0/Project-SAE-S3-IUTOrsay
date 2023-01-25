<?php
for ($i = 0; $i < count($tableauLivrePopulaire) ; $i++) {   
    echo (' <div class="livre">
                <div class="livre-img">
                    <img src="./img/Victor_Hugo_001 1.png" alt="" />
                </div>
                <div class="livre-title">
                    <h3>
                    ');
    echo ($tableauLivrePopulaire[$i]->getTitre());
    echo ('
        </h3>');
    echo ('<p><strong>Auteur:</strong> ');
    $auteur = $tableauLivrePopulaire[$i]->getAuteurByDoc();
    echo ($auteur->getNomAuteur()." ".$auteur->getPrenomAuteur());
    echo ('</p>');
    echo ('<p><strong>Année de parution:</strong> ');
    echo ($tableauLivrePopulaire[$i]->getAnneeParution());
    echo ('</p>');
    echo('<ul>');

    if($tableauLivrePopulaire[$i]->getNumCat() != NULL){
        $categorie = $tableauLivrePopulaire[$i]->getCategorieByDoc();
        echo("<li>".$categorie->getNomCat()."</li>");
    }
    $TypeDoc = $tableauLivrePopulaire[$i]->getTypeDocByDoc();
    echo("<li>".$TypeDoc->getNomTypeD()."</li>");
    echo('</ul>');
    echo("<a href='./index.php?controleur=controleur&action=verifierdispo&numDoc={$tableauLivrePopulaire[$i]->getNumDocument()}&numLangue=1'>Emprunter</a>");
    echo ('
        </div>
        </div>');
    if($i == 3){
        $i = count($tableauLivrePopulaire);
    }
    }








?>
