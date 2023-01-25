<form id="sign-up" class="sign-up" action="index.php" autocomplete="off" method="get">
    <input type="hidden" name="action" value="ajouterUtilisateur">
    <input type="hidden" name="controleur" value="controleurUtilisateur">
    <div class="nom">
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
    </div>
    <div class="prenom">
        <label>Prenom</label>
        <input type="text" placeholder="Prenom" name="prenom">
    </div>
    <div class="faculte">
        <label>Etablissement</label>
        <input type="text" placeholder="Etablissement" name="etab">
    </div>
    <div class="email">
        <label>Email</label>
        <input type="text" placeholder="Email" name="email">
    </div>
    <div class="login-input">
        <label>Login</label>
        <input type="text" placeholder="Login" name="login">
    </div>
    <div class="password">
        <label>Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="mdp">
    </div>
    <div class="tel">
        <label>Numéro Téléphone</label>
        <input type="text" placeholder="Numéro Téléphone" name="tel">
    </div>
    <button type="submit">S'inscrire</button>
</form>