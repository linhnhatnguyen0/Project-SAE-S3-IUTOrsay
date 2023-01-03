<section class="search-tab">
    <div class="search-input">
        <input type="text" placeholder="Titre du document" class="search-input-titre" />
        <input type="number" placeholder="Année parution" class="search-input-annee" />
        <input type="text" placeholder="Auteur" class="search-input-auteur" />
        <div class="search-input-categorie">
            <input class="dropdown" type="checkbox" id="dropdown" name="dropdown" />
            <label class="for-dropdown" for="dropdown">Categorie <ion-icon name="chevron-up-outline"></ion-icon>
            </label>
            <div class="search-input-categorie-dropdown">
                <ul>
                    <li><a href="#">Type 1</a></li>
                    <li><a href="#">Type 2</a></li>
                    <li><a href="#">Type 3</a></li>
                    <li><a href="#">Type 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="search-button">
        <button type="button">Rechercher</button>
    </div>
    <div class="search-tag"></div>
</section>