<?php
foreach ($tableau as $value) {
    if(metaphone($value->getTitre()) == metaphone($_GET['titre'])){
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
        //echo $value->getNomTypeD();
        echo ('</li>
                <li>');
        //echo $value->getNomCat();
        echo ('</li>
            </ul>
            <a>Emprunter</a>
        </div>
        </div>');
    }
}
?>