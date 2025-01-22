<?php $this->titre = "Le Blogue du prof - " . $piece['titre']; ?>

<header>
    <h1 id="titreReponses">Modifier une piece de l'utilisateur 1 :</h1>
</header>
<form action="Adminpieces/miseAJour" method="post">
    <h2>Modifier un article</h2>
    <p>
        <label for="nomPiece">Nom de la piece</label> : <input type="text" name="nomPiece" id="nomPiece" /><br />
        <label for="fournis">Fournisseur</label> :  <input type="text" name="fournisseur" id="fournisseur" /><br />
        <label for="prix">Prix</label> :  <input type="number" name="prix" id="prix" /><br />
        <label for="modeleVoiture">Modele voiture</label> :  <input type="text" name="modeleVoiture" id="modeleVoiture" /><br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="hidden" name="id" value="<?= $piece['id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="Adminpieces/lire/<?= $piece['id'] ?>" method="post">
    <input type="submit" value="Annuler" />
</form>

