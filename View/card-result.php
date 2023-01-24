<?php
foreach ($tableau as $value) {
        $typeD = $value->getTypeDocByDoc();
        
        echo ('<div class="search-result-card">
        <div class="search-result-card-img">
            <img src="./img/miserable.jpg" alt="image de la plante">
        </div>
        <div class="search-result-card-title">
            <h3>');
        echo $value->getTitre();
        echo ('</h3>
            <p><strong>Auteur:</strong> ');
        echo ($value->getNomAuteur()." ".$value->getPrenomAuteur());
        echo ('</p>
            <p><strong>Année parution:</strong>
            ');
        echo $value->getAnneeParution();
        echo ('</p>
            <ul>
                <li>');
        echo $typeD->getNomTypeD();
        echo ('</li>');
        if($value->getNumCat() != NULL){
            $categorie = $value->getCategorieByDoc();
            echo("<li>".$categorie->getNomCat()."</li>");
        }
        echo ('</ul>
            <a>Emprunter</a>
        </div>
        </div>');
}
?>