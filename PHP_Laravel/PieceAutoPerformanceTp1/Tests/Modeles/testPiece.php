<?php

require_once 'Modele/Piece.php';

$tstPiece= new Piece;
$pieces = $tstPiece->getPieces();
echo '<h3>Test getPieces : </h3>';
var_dump($pieces->rowCount());

echo '<h3>Test getPieces : </h3>';
$piece =  $tstPiece->getPieces(1);
var_dump($piece);