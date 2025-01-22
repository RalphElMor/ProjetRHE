<?php $titre = 'Piece Auto Performance'; ?>

<?php foreach ($pieces as $piece): ?>
  <article>
  <header>
  <a href="<?= "index.php?action=piece&id=" . $piece['id'] ?>">
        <h1 class="titrePiece"><?= $piece['nom'] ?></h1>
      </a>
      <a href="index.php?action=confirmer&id=<?= $piece['id'] ?>">
        [Supprimer]
    </a>
</header>
  </article>
  <hr />
<?php endforeach; ?>


<p><?= $this->nettoyer($billet['contenu']) ?></p>
