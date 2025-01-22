<?php

require_once 'Modele/Commande.php';

$testCommande = new Commande;
$commandes = $testCommande->getCommande(1);
echo '<h3>Test getCommande : </h3>';
var_dump($commandes->rowCount());

$commandes = $testCommande->getCommande(1);
echo '<h3>Test getCommande : </h3>';
var_dump($commandes);