<form action="index.php" method="get" class="search-tab">
    <input type="hidden" name="controleur" value="controleurDocument" />
    <input type="hidden" name="action" value="getResultSearch" />
    <div class="search-input">
        <input type="text" placeholder="Titre du document" class="search-input-titre" name="titre" />
        <input type="number" placeholder="Année parution" class="search-input-annee" name="annee" />
        <input type="text" placeholder="Auteur" class="search-input-auteur" name="auteur" />
        <div class="search-input-categorie">
            <input class="dropdown" type="checkbox" id="dropdown" name="dropdown" />
            <label class="for-dropdown" for="dropdown" id="nameCat">Categorie <ion-icon
                    name="chevron-up-outline"></ion-icon>
            </label>
            <div class="search-input-categorie-dropdown">
                <ul>
                    <?php
                        foreach ($tableauCategorie as $value) {
                        echo ('<li class="dropdown-li">'.$value->getNomCat().'</li>');
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="search-button">
        <button type="submit">Rechercher</button>
    </div>
</form>