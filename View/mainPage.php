<section class="main-page" id="main-page">
    <section class="acceuil">
        <div class="img-1"></div>
        <div class="img-2"></div>
        <div class="img-3"></div>
        <div class="img-4"></div>
        <div class="text">
            <span>Bienvenue à</span>
            <h1>Médiathèque Paris-Saclay</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia,
                accusantium quis facilis doloribus voluptates nobis itaque magnam
                sint porro illum molestias ipsam repudiandae ducimus dolorem odit,
                nam, ullam repellat ex.
            </p>
            <button type="button" id="decouvrir-btn">DÉCOUVRIR</button>
        </div>
    </section>
    <section class="preferee">
        <div class="preferee-window">
            <div class="preferee-wd-left"></div>
            <div class="preferee-wd-right"></div>
            <div class="preferee-text-button-window">
                <h1>PRÉFÉRÉE</h1>
                <button type="button" id="preferee-button-open">Ouvrir</button>
            </div>
        </div>
        <div class="preferee-decor">
            <h1 class="left">PREFEREE</h1>
            <h1 class="right">PREFEREE</h1>
        </div>
        <div class="preferee-auteurs">
            <h1>AUTEURS</h1>
            <div class="line"></div>
            <div class="auteurs">
                <?php include("./View/card/auteur-card.php") ?>
            </div>
        </div>
        <div class="preferee-livres">
            <h1>LIVRES</h1>
            <div class="line"></div>
            <div class="livres">
                <?php include("./View/card/livre-card.php") ?>
            </div>
        </div>
    </section>
    <section class="connu">
        <div class="connu-window">
            <div class="connu-wd-left"></div>
            <div class="connu-wd-right"></div>
            <div class="connu-text-button-window">
                <h1>CONNU</h1>
                <button type="button" id="connu-button-open">Ouvrir</button>
            </div>
        </div>
        <div class="connu-decor">
            <h1 class="left">CONNU</h1>
            <h1 class="right">CONNU</h1>
        </div>
        <div class="connu-auteurs">
            <h1>AUTEURS</h1>
            <div class="line"></div>
            <div class="auteurs">
                <?php include("./View/card/auteur-card.php") ?>
            </div>
        </div>
        <div class="connu-livres">
            <h1>LIVRES</h1>
            <div class="line"></div>
            <div class="livres">
                <?php include("./View/card/livre-card.php") ?>
            </div>
        </div>
    </section>
</section>