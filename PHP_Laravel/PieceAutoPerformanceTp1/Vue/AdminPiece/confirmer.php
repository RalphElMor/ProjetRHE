<?php $titre = "Supprimer - " . $piece['nomPiece']; ?>

<article>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        <?= $piece['fournisseur'] ?>, <?= $piece['prix'] ?> <br/>
        <strong><?= $piece['nomPiece'] ?></strong><br/>
        <?= $piece['modeleVoiture'] ?>
        </p>
    </header>
</article>

<form action="/Adminpiece/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $piece['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="piece" />
    <input type="hidden" name="id" value="<?= $piece['id'] ?>" />
    <input type="submit" value="Annuler" />
</form>



