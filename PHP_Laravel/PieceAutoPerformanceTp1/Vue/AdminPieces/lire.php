<?php $titre = "Piece Performance - " . $piece['nomPiece']; ?>


<article>
  <header>
  
    <form action="Adminpieces/ajouter" method="post">
    <h2>Ajouter une piece</h2>
    <p>
        <label for="nomPiece">Nom de la piece</label> : <input type="text" name="nomPiece" id="nomPiece" /><br />
        <label for="fournis">Fournisseur</label> :  <input type="text" name="fournisseur" id="fournisseur" /><br />
        <label for="prix">Prix</label> :  <input type="number" name="prix" id="prix" />><br />
        <label for="modeleVoiture">Modele voiture</label> :  <input type="text" name="modeleVoiture" id="modeleVoiture" /><br />
        <input type="hidden" name="id" value="<?= $piece['id'] + rand(1, 100000) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
    
</form>
<h1 class="titrePieces"><?= $piece['nomPiece'] ?></h1>
  </header>

</article>

<article>
    <header>
        <a href="Adminpieces/modifier<?= $piece['id'] ?>"> [modifier l'article]</a><br>
        <h1 class="titreArticle"><?= $piece['nomPiece'] ?></h1>
        <h3 class=""><?= $article['fournisseur'] ?></h3>
        <h3 class=""><?= $article['prix'] ?></h3>
        <h3 class=""><?= $article['modeleVoiture'] ?></h3>
    </header>

</article>
<hr />
<header>
  <h1 id="titreReponses">Commande Associer à la piece <?= $piece['nomPiece'] ?></h1>
</header>
<form action="Adminpiece/ajouter" method="post">
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




