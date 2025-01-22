<?php $titre = "Piece Performance - " . $piece['nomPiece']; ?>


<article>
  <header>
</form>
<h1 class="titrePieces"><?= $piece['nomPiece'] ?></h1>
  </header>

</article>
<hr />
<header>
  <h1 id="titreReponses">Commande Associer à la piece <?= $piece['nomPiece'] ?></h1>
</header>
<form action="/Adminpiece/ajouter" method="post">
    <h2>Ajouter une commande</h2>
    <p>
      <input type="hidden" name="id" value="<?= $piece['id'] + rand(1, 100000) ?>" /><br />
      <input type="hidden" name="idUtilisateurCommande" value="<?= 1 ?>" /><br />
      <input type="hidden" name="idPieceCommande" value="<?= $piece['id'] ?>" /><br />
      <input type="submit" value="Envoyer" />
    </p>
    </form>
<?php foreach ($commande as $commande): ?>
  <p>Id de la commande : <?= $commande['id'] ?> </p>
  <p>Id de l'utilisateur : <?= $commande['idUtilisateurCommande'] ?></p>
<?php endforeach; ?>




<p><?= $this->nettoyer($piece['contenu']) ?></p>




