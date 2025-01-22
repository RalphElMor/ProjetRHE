<?php $this->titre = "Mon Blog - Connexion" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>

<form action="Utilisateurs/connecter" method="post">
    <input name="email" type="text" placeholder="Entrez votre email" required autofocus>
    <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
