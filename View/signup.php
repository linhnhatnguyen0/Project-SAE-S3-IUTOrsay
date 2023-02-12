<div class="overlay-dark">
    <a href="./index.php?controleur=controleur&action=controleurIndex" class="arrow"><ion-icon
            name="arrow-back-outline"></ion-icon>Retourne</a>
</div>
<form id="sign-up" class="sign-up" action="index.php" autocomplete="off" method="post">
    <input type="hidden" name="action" value="ajouterUtilisateur">
    <input type="hidden" name="controleur" value="controleurUtilisateur">
    <div class="nom">
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
        <p>Remplissez le input</p>
    </div>
    <div class="prenom">
        <label>Prenom</label>
        <input type="text" placeholder="Prenom" name="prenom">
        <p>Remplissez le input</p>
    </div>
    <div class="faculte">
        <label>Etablissement</label>
        <input type="text" placeholder="Etablissement" name="etab">
        <p>Remplissez le input</p>
    </div>
    <div class="email">
        <label>Email</label>
        <input type="text" placeholder="Email" name="email">
        <p>Remplissez le input</p>
    </div>
    <div class="tel">
        <label>Numéro Téléphone</label>
        <input type="text" placeholder="Numéro Téléphone" name="tel">
        <p>Remplissez le input</p>
    </div>
    <div class="login-input">
        <label>Login</label>
        <input type="text" placeholder="Login" name="login">
        <p>Remplissez le input</p>
    </div>
    <div class="password">
        <label>Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="mdp">
        <p>Remplissez le input</p>
    </div>
    <button type="submit" class="sign-up-btn">S'inscrire</button>
</form>