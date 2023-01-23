<?php
for ($i = 0; $i < count($tableauLivre); $i++) {
    echo (' <div class="livre-img">
                    <img src="./img/Victor_Hugo_001 1.png" alt="" />
                </div>
                <div class="livre-title">
                    <h3>
                    ');
    echo ($tableauLivre[$i]->getTitre());
    echo ('
        </h3>');
    echo ('<p><strong>Auteur:</strong>');
    echo ($tableauLivre[$i]->getNomAuteur()." ".$tableauLivre[$i]->getPrenomAuteur());
    echo ('</p>
        <a href="');
    echo ("./routeur.php?controleur=controleurDocument&action=getDocumentByAuteur&id={$tableauLivre[$i]->getNumAuteur()}");
    echo ('">Consulter
            ses oeuvres</a>
        </div>
        </div>');
    }








?>
<div class="livre">
                    <div class="livre-img">
                        <img src="./img/Victor_Hugo_001 1.png" alt="" />
                    </div>
                    <div class="livre-title">
                        <h3>HARRY POTTER AND THE MAGICAL SORCERER STONE</h3>
                        <p><strong>Auteur:</strong> J.K.Rowling</p>
                        <p><strong>Année parution:</strong> 1890</p>
                        <ul>
                            <li>Fantastique</li>
                            <li>Roman</li>
                        </ul>
                        <a>Emprunter</a>
                    </div>
                </div>