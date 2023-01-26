<section class="account-detail">
  <ul class="account-detail-menu">
    <li>
      <ion-icon name="person-outline"></ion-icon>
      <a href="">Account detail</a>
    </li>
    <li>
      <ion-icon name="lock-closed-outline"></ion-icon>
      <a href="">Changer mot de passe</a>
    </li>
    <li>
      <ion-icon name="log-out-outline"></ion-icon>
      <a href="">Se déconnecter</a>
    </li>
  </ul>
  <form class="account-detail-form" action="index.php" method="post">
    <input type="hidden" name="action" value="updateUtilisateur" />
    <input type="hidden" name="controleur" value="controleurUtilisateur" />
    <div class="v426_325">
      <label>Nom</label>
      <input type="text" value="<?php echo ($tableau[0]->getNomUtilisateur()); ?>" name="nom" />
    </div>
    <div class="v426_329">
      <label>Prenom</label>
      <input type="text" value="<?php echo ($tableau[0]->getPrenomUtilisateur()); ?>" name="prenom" />
    </div>
    <div class="v426_321">
      <label>Etablissement</label>
      <input type="text" value="<?php echo ($tableau[0]->getEtablissementUtilisateur()); ?>" name="etab" />
    </div>
    <div class="v426_321">
      <label>Email</label>
      <input type="text" value="<?php echo ($tableau[0]->getEmailUtilisateur()); ?>" name="email" />
    </div>
    <div class="v426_337">
      <label>Numéro téléphone</label>
      <input type="text" value="<?php echo ($tableau[0]->getTelephoneUtilisateur()); ?>" name="tel" />
    </div>
    <button type="submit">Update</button>
  </form>
</section>