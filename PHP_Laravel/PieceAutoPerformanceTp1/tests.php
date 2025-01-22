<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modelPiece') {
        require 'Tests/Modeles/testPiece.php';
    } else if ($_GET['test'] == 'modeleCommande') {
        require 'Tests/Modeles/testCommande.php';
    }  else if ($_GET['test'] == 'vuePieces') {
        require 'Tests/Vues/testVuePieces.php';
    } else if ($_GET['test'] == 'vuePiece') {
        require 'Tests/Vues/testVuePiece.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modelPiece">Piece</a>
    </li>
    <li>
        <a href="tests.php?test=modeleCommande">Commande</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vuePieces">Pieces</a>
    </li>
    <li>
        <a href="tests.php?test=vuePiece">Piece</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
