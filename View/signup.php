<div class="overlay-dark"></div>
<form id="sign-up" class="sign-up" action="index.php" autocomplete="off" method="get">
    <input type="hidden" name="action" value="ajouterUtilisateur">
    <input type="hidden" name="controleur" value="controleurUtilisateur">
    <div class="nom">
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
        <p>Please fill the input</p>
    </div>
    <div class="prenom">
        <label>Prenom</label>
        <input type="text" placeholder="Prenom" name="prenom">
        <p>Please fill the input</p>
    </div>
    <div class="faculte">
        <label>Etablissement</label>
        <input type="text" placeholder="Etablissement" name="etab">
        <p>Please fill the input</p>
    </div>
    <div class="email">
        <label>Email</label>
        <input type="text" placeholder="Email" name="email">
        <p>Please fill the input</p>
    </div>
    <div class="tel">
        <label>Numéro Téléphone</label>
        <input type="text" placeholder="Numéro Téléphone" name="tel">
        <p>Please fill the input</p>
    </div>
    <div class="login-input">
        <label>Login</label>
        <input type="text" placeholder="Login" name="login">
        <p>Please fill the input</p>
    </div>
    <div class="password">
        <label>Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="mdp">
        <p>Please fill the input</p>
    </div>
    <button type="submit" class="sign-up-btn">S'inscrire</button>
</form>