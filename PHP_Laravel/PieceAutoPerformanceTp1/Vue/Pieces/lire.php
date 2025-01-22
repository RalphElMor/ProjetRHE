<?php $titre = "Piece Performance - " . $piece['nomPiece']; ?>


<article>
  <header>
  
    <form action="/Adminpieces/ajouter" method="post">
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
<hr />





<p><?= $this->nettoyer($piece['contenu']) ?></p>




