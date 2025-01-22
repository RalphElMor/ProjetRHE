<?php $titre = 'Piece Auto Performance'; ?>

<?php foreach ($pieces as $piece): ?>
  <article>
  <header>
  <a href="<?= "Pieces/lire/" . $piece['id'] ?>">
        <h1 class="titrePiece"><?= $piece['nom'] ?></h1>
      </a>

</header>
  </article>
  <hr />
<?php endforeach; ?>


<p><?= $this->nettoyer($billet['contenu']) ?></p>
