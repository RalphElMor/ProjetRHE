<?php $this->titre = "Mon Blog - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbPieces) ?> pieces(s) et <?= $this->nettoyer($nbCommandes) ?> commandes(s).
<br>
<a id="lienDeco" href="Utilisateurs/deconnecter">Se déconnecter</a>
