<?php $titre = 'Piece Auto Performance'; ?>

<?php foreach ($pieces as $piece): ?>
  <article>
  <header>
  <a href="<?= "Adminpieces/lire/" . $piece['id'] ?>">
        <h1 class="titrePiece"><?= $piece['nom'] ?></h1>
      </a>
      <a href="Adminpieces/confirmer<?= $piece['id'] ?>">
        [Supprimer]
    </a>
</header>
  </article>
  <hr />
<?php endforeach; ?>


<p><?= $this->nettoyer($piece['contenu']) ?></p>
